<?php
require_once '../Conection/Conn.php';


    class Login {
        
        public $msgErro = "";   
        private $tableCientista;

        public function __construct(){
            $this->tableCientista = 'cientista';
        }
                                              
        public function Login($cpf_cientista, $snh_cientista)
        {

            $pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASENAME,USER,PASSWORD);
            /* verifica se o email e senha ja estao encontrados */
           
            $sql = $pdo->prepare("SELECT *FROM cientista WHERE
            cpf_cientista = :b AND snh_cientista = :g");
            $sql->bindValue(":b", $cpf_cientista);
            $sql->bindValue(":g", $snh_cientista);
            $sql->execute();

            $sql = $pdo->prepare(("SELECT id_cientista FROM cientista WHERE cpf_cientista = :b; "));
            $sql->bindValue(":b", $cpf_cientista);
            $sql->execute();

            $id = $sql->fetch(PDO::FETCH_ASSOC);
            
            ksort($id);
            foreach ($id as $chave => $value)
            {
               $id_cientista = $value;
            }

            if($sql->rowCount() > 0)
            { 
                session_start();
                $_SESSION['login'] = $value;
                return true; 
            }
            else
            {
                return false; 
            }
        }
    }

?>