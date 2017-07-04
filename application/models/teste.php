<?php 

class teste extends MP_Model
{
    public function __construct()
    {
        parent::__construct();

    }
    public function ola()
    {
        $result = array();
        
        $query = $this->db->query("SELECT * FROM users");
        if($query->rowCount() > 0){
            $result = $query->fetchAll();
        }
        return $result;
    }
}