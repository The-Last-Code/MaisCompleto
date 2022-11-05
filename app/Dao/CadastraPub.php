<?php

require_once '../Conection/Conn.php';
    class CadastraPub{

        public function setCadastroPub($tit_projeto, $dti_projeto, $dtt_projeto,$res_projeto, $pub_projeto, $id)
        {
    
            $pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASENAME,USER,PASSWORD);

                $sql = $pdo->prepare("INSERT INTO projeto (tit_projeto,dti_projeto,dtt_projeto,res_projeto,pub_projeto, fk_id_cientista
                VALUES (:a, :b,:c,:d,:e, :f)");

                $sql->bindValue(":a", $tit_projeto);
                $sql->bindValue(":b", $dti_projeto);
                $sql->bindValue(":c", $dtt_projeto);
                $sql->bindValue(":d", $res_projeto);
                $sql->bindValue(":e", $pub_projeto);
                $sql->bindValue(":f", $id);
                $sql->execute(); 
                return true;
            }

        
}
    
?>