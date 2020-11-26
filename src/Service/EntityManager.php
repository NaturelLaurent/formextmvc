<?php

namespace App\Service;

use ArrayObject;

class EntityManager 

{
    protected ClientService $clientService;

         function __construct() {
            $this->clientService = new ClientService();
        }
    
        // ok
    public function flush ($entity)
    {        
      
        $this->clientService->insert($entity);

    }

    //ok
    public function delete( int $id)
    {
       
        $this->clientService->remove( $id);
    }

    
    public function update($entity, int $id)
    {
     
         
        $this->clientService->update($entity,$id);   
    }    
    
   
}
