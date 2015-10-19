<?php
/**
 * JBZoo __PACKAGE__
 *
 * This file is part of the JBZoo CCK package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package   __PACKAGE__
 * @license   MIT
 * @copyright Copyright (C) JBZoo.com,  All rights reserved.
 * @link      https://github.com/JBZoo/__PACKAGE__
 */

namespace JBZoo\PHPUnit;

use JBZoo\__PACKAGE__\__PACKAGE__;

/**
 * Class PerformanceTest
 * @package JBZoo\__PACKAGE__
 */
class PerformanceTest extends PHPUnit
{
    protected $_max = 1000;

    public function testLeakMemoryCreate()
    {
        if ($this->isXDebug()) {
            return;
        }

        $this->startProfiler();
        for ($i = 0; $i < $this->_max; $i++) {
            $obj = new __PACKAGE__();
            is('street magic', $obj->doSomeStreetMagic());
            unset($obj);
        }

        alert($this->loopProfiler($this->_max), 'Create - min');
    }
}
