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

use Scabbia\Framework\Core;

class Test
{
    /**
     * Entry point for processor
     *
     * @param array $uAnnotations annotations
     */
    public static function method(array $uAnnotations)
    {
        print_r($uAnnotations);
    }

    /**
     * Test method
     *
     * @test {id: 5, yaml: true, description: a small description}
    */
    public function testMethod()
    {

    }
}
