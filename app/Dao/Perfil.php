<?php

     include ('../Conection/Conn.php');

    class ClientModel extends Conn
    {
        private $table;
        private $table1;


        function __construct()
        {
            
            parent::__construct();
            $this->table = 'cientista';
            $this->table1 = 'telefone';
            $this->table2 = 'area_atuacao_cientista';
            
        }
        
        function getAllCientista($id)
        {
            $sqlSelect = $this->pdo->query("SELECT nom_cientista, email_cientista
            FROM $this->table WHERE id_cientista = $id");
            $resultQuery = $sqlSelect->fetchAll();
            return $resultQuery;
        }

        function getAllTelefone($id)
        {
            $sqlSelect2 = $this->pdo->query("SELECT ddd_telefone, num_telefone
            FROM $this->table1 WHERE fk_id_cientista = $id");
            $resultQuery2 = $sqlSelect2->fetchAll();
            return $resultQuery2;
        }

        function getAllArea($id)
        {
            $sqlSelect2 = $this->pdo->query("SELECT * FROM area_atuacao_cientista
            WHERE fk_id_cientista = $id");
            $resultQuery2 = $sqlSelect2->fetchAll();
            return $resultQuery2;
        }
    }
?>