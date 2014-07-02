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

// MD # autoloader initialization
// MD - determine framework path
// define("SCABBIA2_PATH", __DIR__ . "/../scabbia2-fw");

if (defined("SCABBIA2_PATH")) {
    $tFrameworkPath = SCABBIA2_PATH;
} else {
    $tFrameworkPath = __DIR__ . "/vendor/scabbiafw/scabbia2-fw";
}

// MD - instantiate and register the loader
require "{$tFrameworkPath}/src/Loaders/Composer.php";
$tLoader = \Scabbia\Loaders\Composer::init(__DIR__ . "/vendor/composer");

// MD - set framework path if necessary
if (defined("SCABBIA2_PATH")) {
    $tLoader->setPsr4("Scabbia\\", SCABBIA2_PATH . "/src/");
    $tLoader->setPsr4("Scabbia\\Tests\\", SCABBIA2_PATH . "/tests/");
}

// MD # framework initialization
use Scabbia\Framework\Core;

// MD - initializes the autoloader and framework variables.
Core::init($tLoader);

// MD - read the application definitions from project.yml file and cache its content into cache/project.yml.php
Core::loadProject("project.yml");

// MD - pick which application is going to run
Core::pickApplication();
