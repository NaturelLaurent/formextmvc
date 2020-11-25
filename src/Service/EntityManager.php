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
      
       $tableName = EntityManager::entityName($entity);
        $entityTab = EntityManager::entityToTab($entity);     
      
        
        $this->sql->insert( $entityTab,  $tableName);

    }

    public function delete($entity , int $id)
    {
        $tableName = EntityManager::entityName($entity);
      
        $this->sql->remove( $tableName, $id);
    }

    
    public function update($entity , int $id)
    {
        $tableName = EntityManager::entityName($entity);      
        $entityTab = EntityManager::entityToTab($entity);  
        $this->sql->update($entityTab, $tableName, $id);   
    }
    
    public static function entityName($entity)
    {
        $className = get_class($entity);  
        $tableName = explode("\\",$className);
        $tableName = array_pop( $tableName);
        $tableName =strtolower( $tableName);

        return  $tableName;
    }
    public static function entityToTab($entity)
    {
        $arr = new ArrayObject($entity);
        $className = get_class($entity);  
        $entityTab = array();

        foreach ($arr->getArrayCopy() as $key => $value) {        
          $prop =trim(substr($key, strlen($className)+1));
         $entityTab[$prop]   = $value;
           
        }

        return $entityTab ;
    }
}
