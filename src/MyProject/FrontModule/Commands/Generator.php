<?php
/**
 * Scabbia2 PHP Framework Skeleton Project
 * http://www.scabbiafw.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link        http://github.com/scabbiafw/scabbia2-skel for the canonical source repository
 * @copyright   2010-2013 Scabbia Framework Organization. (http://www.scabbiafw.com/)
 * @license     http://www.apache.org/licenses/LICENSE-2.0 - Apache License, Version 2.0
 */

namespace MyProject\FrontModule\Commands;

use Scabbia\Framework\Core;
use Scabbia\Framework\Io;
use Scabbia\Yaml\Parser;

class Generator
{
    /**
     * @type Parser|null $parser yaml parser
     */
    public static $parser = null;

    /**
     * @type array $registry set of registered annotations
     */
    public static $registry = [
        "test" => ["format" => "yaml"]
    ];


    /**
     * Entry point for "generate" command.
     *
     * @param array $uParameters command parameters
     *
     * @test {eser: ozvataf, seyma: kacar}
     * @throws \RuntimeException if configuration is invalid
     */
    public static function generate(array $uParameters)
    {
        if (count($uParameters) === 0) {
            $tProjectFile = "project.yml";
            $tApplicationName = "default";
        } else {
            $tExploded = explode("/", $uParameters[0], 2);
            if (count($tExploded) == 1) {
                $tProjectFile = "project.yml";
                $tApplicationName = $tExploded[0];
            } else {
                $tProjectFile = $tExploded[0];
                $tApplicationName = $tExploded[1];
            }
        }

        $uApplicationConfig = Core::readProjectFile($tProjectFile);

        if ($uApplicationConfig === null || !isset($uApplicationConfig[$tApplicationName])) {
            throw new \RuntimeException("invalid configuration - {$tProjectFile}/{$tApplicationName}");
        }

        foreach ($uApplicationConfig[$tApplicationName]["sources"] as $tPath) {
            Io::getFilesWalk(
                Core::translateVariables($tPath),
                "*.php",
                true,
                [__CLASS__, "processFile"]
            );
        }

        echo "done.\n";
    }

    /**
     * Processes given file to search for classes
     *
     * @param string $uFile file
     */
    public static function processFile($uFile)
    {
        $tFileContents = Io::read($uFile);
        $tTokens = token_get_all($tFileContents);

        $tLastNamespace = "";
        $tClasses = [];

        $tExpectation = 0; // 1=namespace, 2=class

        foreach ($tTokens as $tToken) {
            if (is_array($tToken)) {
                $tTokenId = $tToken[0];
                $tTokenContent = $tToken[1];
            } else {
                $tTokenId = null;
                $tTokenContent = $tToken;
            }

            if ($tTokenId === T_WHITESPACE) {
                continue;
            }

            if ($tTokenId === T_NAMESPACE) {
                $tLastNamespace = "";
                $tExpectation = 1;
                continue;
            }

            if ($tTokenId === T_CLASS) {
                $tExpectation = 2;
                continue;
            }

            if ($tExpectation === 1) {
                if ($tTokenId === T_STRING || $tTokenId === T_NS_SEPARATOR) {
                    $tLastNamespace .= $tTokenContent;
                } else {
                    $tExpectation = 0;
                }
            } elseif ($tExpectation === 2) {
                $tClasses[] = "{$tLastNamespace}\\{$tTokenContent}";
                $tExpectation = 0;
            }
        }

        foreach ($tClasses as $tClass) {
            self::processClass($tClass);
        }
    }

    /**
     * Processes classes using reflection to scan annotations.
     *
     * @param string $uClass class name
     */
    public static function processClass($uClass)
    {
        $tAnnotations = [];

        $tReflection = new \ReflectionClass($uClass);
        foreach ($tReflection->getMethods() as $tMethodReflection) {
            // TODO: check the correctness of logic
            if ($tMethodReflection->class !== $uClass) {
                continue;
            }

            $tDocComment = $tMethodReflection->getDocComment();
            if (strlen($tDocComment) > 0) {
                $tParsedAnnotations = self::parseAnnotations($tDocComment);

                if (count($tParsedAnnotations) > 0) {
                    $tAnnotations[$tMethodReflection->name] = $tParsedAnnotations;
                }
            }
        }

        print_r($tAnnotations);
    }

    /**
     * Parses the docblock and returns annotations in an array
     *
     * @param string $uDocComment Docblock which contains annotations
     *
     * @returns array Set of annotations
     */
    public static function parseAnnotations($uDocComment)
    {
        preg_match_all(
            "/\\*[\\t| ]\\@([^\\n|\\t| ]+)(?:[\\t| ]([^\\n]+))*/",
            $uDocComment,
            $tDocCommentLines,
            PREG_SET_ORDER
        );

        $tAnnotations = [];

        if (self::$parser === null) {
            self::$parser = new Parser();
        }

        foreach ($tDocCommentLines as $tDocCommentLine) {
            if (!isset(self::$registry[$tDocCommentLine[1]])) {
                continue;
            }

            $tRegistryItem = self::$registry[$tDocCommentLine[1]];

            if (!isset($tAnnotations[$tDocCommentLine[1]])) {
                $tAnnotations[$tDocCommentLine[1]] = [];
            }

            if (isset($tDocCommentLine[2])) {
                if ($tRegistryItem["format"] === "yaml") {
                    $tLine = self::$parser->parse($tDocCommentLine[2]);
                } else {
                    $tLine = $tDocCommentLine[2];
                }
            } else {
                $tLine = "";
            }

            $tAnnotations[$tDocCommentLine[1]][] = $tLine;
        }

        return $tAnnotations;
    }
}
