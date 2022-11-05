<?php

require_once '../Conection/Conn.php';

    class CadastraPerfil{

        public function setCadastroPerfil($nom_titulacao, $nom_area_atuacao, $end_rede_social, $dti_formacao,
        $dtt_formacao, $ddd_telefone, $num_telefone,$id)
        {
            $pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASENAME,USER,PASSWORD);

                $sql = $pdo->prepare("INSERT INTO area_atuacao (nom_area_atuacao) 
                VALUES (:a)");

                $sql1 = $pdo->prepare("INSERT INTO formacao (dti_formacao, dtt_formacao, fk_id_cientista) 
                VALUES (:b, :c, :z)");
    
                $sql2 = $pdo->prepare("INSERT INTO rede_sociais (end_rede_social, fk_id_cientista) 
                VALUES (:d, :z)");
    
                $sql3 = $pdo->prepare("INSERT INTO telefone (ddd_telefone, num_telefone, fk_id_cientista) 
                VALUES (:e, :f, :z)");
    
                $sql4 = $pdo->prepare("INSERT INTO titulacao (nom_titulacao) 
                VALUES (:g)");
    
                $sql->bindValue(":a", $nom_area_atuacao);
                $sql->execute();
                
                // $sqlSelect1 =  $pdo->prepare("SELECT * FROM area_atuacao
                // WHERE id_area_atuacao  = (SELECT MAX(id_area_atuacao) FROM area_atuacao)");
                // $sqlSelect1->execute();

                // $id = $sqlSelect1->fetch(PDO::FETCH_ASSOC);

                // $comma_separated = implode("int ", $id);
                
                // $idAreaAtuacao = substr($comma_separated, -2);

                // $_SESSION['idAreaAtuacao'] = $idAreaAtuacao;

                $sql1->execute(array(
                    ':b' =>  $dti_formacao,
                    ':c' => $dtt_formacao,
                    ':z' => $id
                ));
                
    
                $sql2->execute(array(
                    ':d' =>  $end_rede_social,
                    ':z' => $id
                ));
    
                $sql3->execute(array(
                    ':e' =>  $ddd_telefone,
                    ':f' => $num_telefone,
                    ':z' => $id
                ));
    
                $sql4->bindValue(":g", $nom_titulacao);
                $sql4->execute();
                
                return true;
            }
            
            public function CadastraIdAreaAtuacao()
                {
                $pdo = new PDO('mysql:host='.HOST.';dbname='.DATABASENAME,USER,PASSWORD);
                
                session_start();
                $_SESSION['idAreaAtuacao'];

                $sql = $pdo->prepare("INSERT INTO area_atuacao_cientista (fk_id_area_atuacao_cientista) 
                VALUES (:a)");
                $sql->bindValue(":a", $_SESSION['idAreaAtuacao']);
                $sql->execute();                
        }

    }

    
?>