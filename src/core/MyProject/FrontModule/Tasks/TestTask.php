<?php
/**
 * Scabbia2 Standard Package
 * http://www.scabbiafw.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link        http://github.com/scabbiafw/scabbia2 for the canonical source repository
 * @copyright   2010-2015 Scabbia Framework Organization. (http://www.scabbiafw.com/)
 * @license     http://www.apache.org/licenses/LICENSE-2.0 - Apache License, Version 2.0
 */

namespace MyProject\FrontModule\Tasks;

use Scabbia\Tasks\TaskBase;
use Scabbia\Containers\BindableContainer;

/**
 * Task class for "php scabbia test"
 *
 * @package     MyProject\FrontModule\Tasks
 * @author      Eser Ozvataf <eser@sent.com>
 * @since       2.0.0
 */
class TestTask extends TaskBase
{
    use BindableContainer;

    /**
     * Initializes the test task
     *
     * @param mixed      $uConfig    configuration
     * @param IInterface $uInterface interface class
     *
     * @return TestTask
     */
    public function __construct($uConfig, $uInterface)
    {
        parent::__construct($uConfig, $uInterface);
    }

    /**
     * Executes the task
     *
     * @param array $uParameters parameters
     *
     * @return int exit code
     */
    public function executeTask(array $uParameters)
    {
        $this->bind("MyProject\\FrontModule\\Models\\HomeModel");
        $tMessage = $this->homeModel->getWelcomeMessage();

        $this->interface->writeColor("yellow", $tMessage);

        return 0;
    }
}
