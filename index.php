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
// MD - determine vendor path
$tVendorPath = __DIR__ . "/vendor";

// MD - instantiate and register the loader
require "{$tVendorPath}/scabbiafw/scabbia2-fw/src/Loaders/Loader.php";
$tLoader = \Scabbia\Loaders\Loader::init("{$tVendorPath}/composer");

// MD # framework initialization
use Scabbia\Framework\Core;

// MD - initializes the autoloader and framework variables.
Core::init($tLoader);

// MD - read the application definitions from project.yml file and cache its content into cache/project.yml.php
Core::loadProject("project.yml");

// MD - pick which application is going to run
Core::pickApplication();
