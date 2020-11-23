<?php

namespace App\Service;

use ArrayObject;

class EntityManager 

{
    protected SqlService $sql;

         function __construct() {
            $this->sql = SqlService::getInstance();
        }

    public function flush ($entity)
    {
       $arr = new ArrayObject($entity);
       $className = get_class($entity);  
       $tableName = EntityManager::entityName($entity);

        $entityTab = array();

        foreach ($arr->getArrayCopy() as $key => $value) {        
          $prop =trim(substr($key, strlen($className)+1));
         $entityTab[$prop]   = $value;
           
        }
      
        
        $this->sql->insert( $entityTab,  $tableName);

    }

    public function delete($entity , int $id)
    {
        $tableName = EntityManager::entityName($entity);
        $this->sql->remove( $tableName, $id);
    }

    public static function entityName($entity)
    {
        $className = get_class($entity);  
        $tableName = explode("\\",$className);
        $tableName = array_pop( $tableName);
        $tableName =strtolower( $tableName);

        return  $tableName;
    }
}
