<?php

namespace App\Service;


use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;

class ClientService
{

    protected $client;


    public function __construct()
    {

        $this->client = new Client(['base_uri' => 'http://localhost:8080/']);
    }

    public function fetch()
    {
        $response = $this->client->get('person');
        $contents = $response->getBody()->getContents();
        return $contents;
    }

    public function insert($entity)
    { 
        var_dump($entity->getNom());
        $response = $this->client->post('person',[
            'form_params'=>[
                'nom'=> $entity->getNom(),
                'prenom'=> $entity->getPrenom(),
                'email'=> $entity->getEmail(),

            ]
        ]);

    }


    public function remove(int $id)
    {       
        $response = $this->client->delete('person/'.$id);     
       
    }

    public function update(int $id)
    {
    }
}
