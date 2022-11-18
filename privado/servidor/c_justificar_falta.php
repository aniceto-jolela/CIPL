<?php
    //Conecta com a base de dados
    include_once 'conectar.php';

    if($_POST['s_funcionario'] != null){
        if(isset($_POST['retirar'])){
            $s_funcionario = $_POST['s_funcionario'];
            $retirar = $_POST['retirar'];
            $total=0;
            for($a3 = 0;$a3<count($retirar);$a3++){$total=$a3;}
                //Cilco da data de falta
                //retirar é o array da checkbox
                
            for($a = 0;$a<count($retirar);$a++){
                $Presenca = Presenca::findBySql(con(), "SELECT * FROM presenca");
                foreach ($Presenca as $i):
                    $ID = $i->getId();
                    //Verifica as dadas de fata se forem iguais
                    if($i->getDataFalta() == $retirar[$a] && $i->getFuncionarioId() == $s_funcionario && $i->getObservacao()==null){
                       //Edita a obcervação
                        $obs="Falta justificada";
                        $Presenca = con()->prepare("UPDATE presenca SET observacao='$obs' WHERE id=:id_presenca");
                        $Presenca->bindParam(":id_presenca",$ID);
                        $Presenca->execute();
                    }
                endforeach;

                if($a == 0){
                    //Cadastra o justificativo
                    $f_justificativo = '../../img/funcionarios/justificativo/'.$_FILES['f_justificativo']['name'];
                    $justifica = new Justificativo();
                    $justifica->setFuncionarioId($s_funcionario);
                    $justifica->setFJustificativo($f_justificativo);
                    $justifica->insertIntoDatabase(con());
                    move_uploaded_file($_FILES['f_justificativo']['tmp_name'], $f_justificativo);
                }
                if($total == $a){
                    //Sucesso ao cadastro
                    returnAjax($r, '0');
                }
            }
        }else{
            //Não justificou
            returnAjax($r, '1');
        }
    }else{
        //Porfavor seleciona um funcionário
        returnAjax($r, '2');
    }

