<?php

include ('../Conection/Conn.php');

    // email do caboca
    class EnviarEmail extends Conn
    {
        private $tableCientista;

        function __construct()
        {
            parent::__construct();
            $this->tableCientista = 'cientista';
        }

        
        
        function verificaEmail($recuperaEmail)
        {
            $sqlSelect = $this->pdo->query("SELECT * FROM  $this->tableCientista WHERE email_cientista = '$recuperaEmail'");
            $sqlSelect ->execute();

            if($sqlSelect->rowCount() > 0)
            {
                return true;
            }
            else
            {
                return false;    
            }
        }

        function token($token, $recuperaEmail)
        {
            $sqlSelect = $this->pdo->query("UPDATE $this->tableCientista SET snh_cientista = '$token' WHERE email_cientista = '$recuperaEmail'");
            $sqlSelect ->execute();

            $sqlSelect = $this->pdo->query("SELECT * FROM $this->tableCientista WHERE snh_cientista = '$token'");
            $sqlSelect ->execute();

            if($sqlSelect->rowCount() > 0)
            {
                return true;
            }
            else
            {
                return false;    
            }
        }

        /* funcao que verifica se o token que o usuario digitou esta correto no banco */
        function verificaToken($tokenUsuario)
        {
            $sqlSelect = $this->pdo->query("SELECT * FROM  $this->tableCientista WHERE snh_cientista = '$tokenUsuario'");
            $sqlSelect ->execute();

            
            if($sqlSelect->rowCount() > 0)
            {
                return true;
            }
            else
            {
                return false;    
            }
        }

        /* funcao que coloca a nova senha que o usuario digitou no banco */
        function novaSenha($novaSenha)
        {
            $sqlSelect = $this->pdo->query("UPDATE $this->tableCientista SET snh_cientista = '$novaSenha' WHERE id_cientista = (SELECT MAX(id_cientista) FROM cientista)");
            $sqlSelect ->execute();

            $sqlSelect = $this->pdo->query("SELECT * FROM $this->tableCientista WHERE snh_cientista = '$novaSenha'");
            $sqlSelect ->execute();

            
            if($sqlSelect->rowCount() > 0)
            {
                return true;
            }
            else
            {
                return false;    
            }
        }
    }

?>