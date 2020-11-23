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
      
        $entityTab = array();

        foreach ($arr->getArrayCopy() as $key => $value) {
          $prop = str_replace( $className,"",$key);
         $entityTab[$prop]   = $value;
           
        }
        $tableName = explode("\\",$className);
        $tableName = array_pop( $tableName);
        $tableName =strtolower( $tableName);
        $this->sql->insert( $entityTab,  $tableName);
       


      
        
       
      
      
    }
}
