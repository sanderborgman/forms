<?php
/**
 * This file is part of Vegas package
 *
 * @author Arkadiusz Ostrycharz <aostrycharz@amsterdam-standard.pl>
 * @copyright Amsterdam Standard Sp. Z o.o.
 * @homepage http://vegas-cmf.github.io
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Vegas\Paginator\Adapter\Exception;

use Vegas\Paginator\Adapter\Exception;

/**
 * Class DbNotSetException
 * @package Vegas\Paginator\Adapter\Exception
 */
class DbNotSetException extends Exception
{
    /**
     * Exception default message
     *
     * @var string
     */
    protected $message = 'You need to set mongo db for pagination.';
}
 