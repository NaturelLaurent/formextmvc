<?php
namespace App;

use PDO;
use PDOException;
use App\SPDO;

class Tools {

    public $db;

    public $query;

    public $id;

    private $field;

    public function __construct($type, $table, ...$value){ 
        
        $this->db       =   SPDO::getInstance();
        $this->query    =   null;
        $this->table    =   $table;
        $this->space    =   ' ';
        $this->id       =   null;

        ($type && isset($value[0])) ? $this->$type($value[0]) : null;
        ($type && !isset($value[0])) ? $this->$type() : null;

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

        // $this->id       =  $id;
        // $this->field    =  'id';

        return $this;
    }

    public function find($value)
    {
        $this->id       =   $value;
        $this->query    =   "WHERE id =";

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

    public function delete()
    {

        $delete     =   "DELETE FROM $this->table";
        $stmt       =   $this->db->prepare("$delete $this->query:id");
        $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);

        $stmt->execute();
    }

    // public function buildQuery( $get_var ) 
    // {
    //     switch($get_var)
    //     {
    //         case 1:
    //             $tbl = $this->table;
    //             break;
    //     }

    //     $sql = "DELETE * FROM $tbl";
    // }

}