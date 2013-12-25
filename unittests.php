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

if (!file_exists($composerAutoloaderPath = __DIR__ . '/vendor/autoload.php')) {
    throw new RuntimeException('Unable to load Composer which is required for Scabbia2. Run `php scabbia upgrade`.');
}

$composerAutoloader = require($composerAutoloaderPath);

if (defined('SCABBIA2_PATH') && SCABBIA2_PATH !== false) {
    $composerAutoloader->set('Scabbia', SCABBIA2_PATH);
} elseif (file_exists($scabbia2Path = __DIR__ . '/../scabbia2-dev/src')) {
    $composerAutoloader->set('Scabbia', $scabbia2Path);
}

use Scabbia\Tests\Tests;

$tTestClasses = [
    "Scabbia\\Yaml\\Tests\\ParserTest",
    "Scabbia\\Yaml\\Tests\\InlineTest"
];

Tests::coverageStart();
$tExitCode = Tests::runUnitTests($tTestClasses);
$tCoverageReport = Tests::coverageStop();

echo "Code Coverage = ", round($tCoverageReport["total"]["percentage"], 2), "%";

exit($tExitCode);
