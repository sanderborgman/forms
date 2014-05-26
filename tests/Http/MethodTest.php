<?php
/**
 * This file is part of Vegas package
 *
 * @author Slawomir Zytko <slawomir.zytko@gmail.com>
 * @copyright Amsterdam Standard Sp. Z o.o.
 * @homepage https://bitbucket.org/amsdard/vegas-phalcon
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
namespace Vegas\Tests\Http;


use Vegas\Http\Method;

class MethodTest extends \PHPUnit_Framework_TestCase
{
    public function testArrayListOfMethods()
    {
        $methods = Method::toArray();
        $this->assertInternalType('array', $methods);
        $this->assertSameSize(array('GET','POST','DELETE','OPTIONS','HEAD','PUT','PATCH'), $methods);
    }

} 