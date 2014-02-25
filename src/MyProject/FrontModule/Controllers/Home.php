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

namespace MyProject\FrontModule\Controllers;

use Scabbia\Mvc\Controller;

/**
 * Home controller
 *
 * @package     MyProject\FrontModule\Controllers
 * @author      Eser Ozvataf <eser@sent.com>
 * @since       2.0.0
 */
class Home extends Controller
{
    /**
     * GET / action
     *
     * @route {method: get, path: /}
     *
     * @return void
    */
    public function getIndex()
    {
        echo "helo";
    }

    /**
     * GET /user/? action
     *
     * @route {method: get, path: "/user/{id:[0-9]+}"}
     *
     * @param int $uUserId user id
     *
     * @return void
     */
    public function getUser($uUserId)
    {
        echo "helo: {$uUserId}";
    }
}
