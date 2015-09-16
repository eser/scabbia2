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

namespace MyProject\FrontModule\Processors;

use Scabbia\Facades\FacadeBase;

/**
 * FacadeTest class
 *
 * @package     MyProject\FrontModule\Processors
 * @author      Eser Ozvataf <eser@ozvataf.com>
 * @since       2.0.0
 */
class FacadeTest extends FacadeBase
{
    /** @type array $callbackMap  map for callbacks */
    public static $callbackMap = [
        "slug" => "Scabbia\\Helpers\\String::slug"
    ];
}
