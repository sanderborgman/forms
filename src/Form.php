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
namespace Vegas\Forms;

class Form extends \Phalcon\Forms\Form
{
    /**
     * Bind also an array values.
     * 
     * @param array $data
     * @param object $entity
     * @param array $whitelist
     */
    public function bind($data, $entity, $whitelist=null)
    {
        parent::bind($data, $entity, $whitelist);
        
        $this->bindArrays($data, $entity);
    }
    
    private function bindArrays($data, $entity)
    {
        foreach ($data As $name => $values) {
            if (is_array($values)) {
                $nameArray = array($name);

                $values = $this->prepareValues($nameArray, $values);

                $entity->$name = $this->reindex($values);
            }
        }
    }
    
    /**
     * Remove empty strings from array.
     * 
     * @param array $values
     * @return array
     */
    private function prepareValues(array $name, array $values)
    {
        $tempArray = array();
        
        foreach ($values As $key => $value) { 
            $baseName = $name;
            $baseName[] = $key;
            
            $value = $this->prepareValue($baseName, $value);
            
            if ($value !== null) {
                $tempArray[$key] = $value;
            }
        }
        
        return $tempArray;
    }
    
    private function prepareValue(array $name, $value)
    {
        if (is_array($value)) {
            $value = $this->prepareValues($name, $value);
        }
        
        if ($this->passArray($value) || $this->passString($value)) {
            return $value;
        }
        
        return null;
    }
    
    private function passArray($value)
    {
        return is_array($value) && count($value);
    }
    
    private function passString($value)
    {
        return !is_array($value) && $value !== '';
    }

    private function reindex($values)
    {
        foreach ($values As $key => $value) {
            if (!is_numeric($key)) {
                return $values;
            }
        }

        return array_values($values);
    }
}