<?php 
abstract class MP_Model
{
    protected $db;

    protected $db_configs;

    public function __construct()
    {
        $this->connect();
    }

    private function init()
    {
        $connect_path = APPPATH."config/database.php"; 
        if(file_exists($connect_path)){
            require_once $connect_path;
        }else{
            throw new Exception("File database.php does not exists");
        }

        return $this->db_configs = $db['default'];
    }

    private function connect()
    {
        $this->init();

        try{
            $this->db = new PDO(
            "mysql:host=".$this->db_configs['hostname'].
            ";dbname="   .$this->db_configs['database'], 
                          $this->db_configs['username'], 
                          $this->db_configs['password']
            );
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $this->db;
        }catch(PDOException $e){
            echo "Connection failed: ".$e->getMessage();
        }
    } 


    /**
    * @method __get()
    *
    * @link http://php.net/manual/pt_BR/language.oop5.magic.php
    *
    * This method is being used to get the objects loaded from the framework
    *
    */
    public function __get($key){
        return getInstance()->$key;
    }
}