<?php
/**
 * This file is part of Vegas package
 *
 * @author Arkadiusz Ostrycharz <arkadiusz.ostrycharz@gmail.com>
 * @copyright Amsterdam Standard Sp. Z o.o.
 * @homepage https://bitbucket.org/amsdard/vegas-phalcon
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Vegas\Tests\Mvc\Controller;

use Vegas\Tests\App\TestCase;

class ControllerAbstractTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        error_reporting(2);
    }

    public function test403Error()
    {
        $this->bootstrap->run('/test/front/error/403');
    }

    public function test403ErrorResponse()
    {
        $this->assertEquals('403 Message', $this->di->get('response')->getHeaders()->get('Status'));
    }

    public function test404Error()
    {
        $this->bootstrap->run('/test/front/error/404');
    }

    public function test404ErrorResponse()
    {
        $this->assertEquals('404 Message', $this->di->get('response')->getHeaders()->get('Status'));
    }

    public function test500Error()
    {
        $this->bootstrap->run('/test/front/error/500');
    }

    public function test500ErrorResponse()
    {
        $this->assertEquals('500 Message', $this->di->get('response')->getHeaders()->get('Status'));
    }

    public function testJson()
    {
        $this->assertEquals('{"foo":"bar"}', $this->bootstrap->run('/test/front/json'));
    }
}