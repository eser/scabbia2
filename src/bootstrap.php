<?php
/**
 * Scabbia2 Standard Package
 * http://www.scabbiafw.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link        https://github.com/scabbiafw/scabbia2 for the canonical source repository
 * @copyright   2010-2015 Scabbia Framework Organization. (http://www.scabbiafw.com/)
 * @license     http://www.apache.org/licenses/LICENSE-2.0 - Apache License, Version 2.0
 */

// MD # bootstrap sequence
// MD - determine the environment parameters
$tBasePath = dirname(__DIR__);
$tGmDate = gmdate("Y_m_d");

// MD - error reporting
error_reporting(E_ALL | E_STRICT);
ini_set("display_errors", true);
ini_set("error_log", "{$tBasePath}/var/logs/error_{$tGmDate}.log");

set_error_handler(function ($uCode, $uMessage, $uFile, $uLine) {
    if ((error_reporting() & $uCode) !== 0) {
        throw new \ErrorException($uMessage, $uCode, 0, $uFile, $uLine);
    }

    return true;
});

// MD - instantiate and register the loader
require "{$tBasePath}/vendor/autoload.php";