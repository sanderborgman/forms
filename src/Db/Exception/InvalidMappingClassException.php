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
 
namespace Vegas\Db\Exception;

use Vegas\Db\Exception as DbException;

/**
 * Class InvalidMappingClassException
 * @package Vegas\Db\Exception
 */
class InvalidMappingClassException extends DbException
{
    protected $message = 'Mapping class is invalid';
} 