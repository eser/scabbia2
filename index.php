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

// MD # composer initialization
// MD - determine running path
$tRunningPath = __DIR__;

// MD - determine running path
if (!file_exists($composerAutoloaderPath = "{$tRunningPath}/vendor/autoload.php")) {
    throw new \RuntimeException("Unable to load Composer which is required for Scabbia2. Run `php scabbia upgrade`.");
}

// MD - load the autoloader
$composerAutoloader = require($composerAutoloaderPath);

// MD - set framework path if necessary
// define("SCABBIA2_PATH", "{$tRunningPath}/../scabbia2-fw");
if (defined("SCABBIA2_PATH")) {
    $composerAutoloader->setPsr4("Scabbia\\", SCABBIA2_PATH . "/src/");
    $composerAutoloader->setPsr4("Scabbia\\Tests\\", SCABBIA2_PATH . "/tests/");
}

// MD # framework initialization
use Scabbia\Framework\Core;

// MD - initializes the autoloader and framework variables.
Core::init($composerAutoloader);

// MD - read the application definitions from project.yml file and cache its content into cache/project.yml.php
Core::loadProject("project.yml");

// MD - pick which application is going to run
Core::pickApplication();
