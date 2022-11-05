<?php

     include ('../Conection/Conn.php');

    class ClientModel extends Conn
    {
        private $table;

        function __construct()
        {
            parent::__construct();
            $this->table = 'projeto';
        }

        function getAll()
        {
             $sql = "SELECT * FROM  $this->table";
             $query = $this->pdo->prepare($sql);
             $query->execute();
             return $query;
        }       
        function getUser($id)
        {
            $sql = "SELECT * FROM  $this->table WHERE fk_id_cientista = $id";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            return $query;
        }
    }
    
?>