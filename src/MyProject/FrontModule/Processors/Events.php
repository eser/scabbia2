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

namespace MyProject\FrontModule\Processors;
use Scabbia\Helpers\String;

/**
 * Events class
 *
 * @package     MyProject\FrontModule\Processors
 * @author      Eser Ozvataf <eser@sent.com>
 * @since       2.0.0
 */
class Events
{
    /**
     * A sample for event-member method for applicationInit event
     *
     * @event {on: applicationInit, priority: 10}
     *
     * @return void
    */
    public static function onLoad()
    {
        // echo "onApplicationInit<br />";
    }

    /**
     * A sample for event-member method for requestBegin event
     *
     * @event {on: requestBegin, priority: 10}
     *
     * @param null|array $uEventArgs arguments for the event
     *
     * @return void
     */
    public static function onRequestBegin($uEventArgs)
    {
        // echo "onRequestBegin<br />";

        String::vardump($uEventArgs);
    }

    /**
     * A sample for event-member method for requestEnd event
     *
     * @event {on: requestEnd, priority: 10}
     *
     * @param null|array $uEventArgs arguments for the event
     *
     * @return void
     */
    public static function onRequestEnd($uEventArgs)
    {
        // echo "onRequestEnd<br />";

        $tDiff = (microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"]);
        echo "Generated in {$tDiff} msec";
    }
}
