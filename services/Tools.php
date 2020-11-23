<?php
namespace App;

class Tools {

    public $db;

    public $query;

    public function __construct($type, $table){ 

        $this->db       =   Connect::database();
        $this->query    =   null;
        $this->table    =   $table;
        $this->space    =   ' ';

        ($type) ? $this->all() : null;
	}

    public function all()
    {
        $this->query = 'SELECT * from ' . $this->table;

        return $this;
    }
    

    public function where($value1, $symbole, $value2)
    {

        $this->query =  $this->query . ' WHERE ' .
                        $value1 . $this->space .
                        $symbole . $this->space .
                        $value2;

        return $this;
    }

    public function pluck($value1)
    {

        return $this;
    }

    public function get()
    {
    
        return $this->db->query($this->query);
    }

}