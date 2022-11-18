<?php
    //Conecta com a base de dados
    include_once 'conectar.php';

    $estado=1;$data_db="";
    if(isset($_GET['cod'])){
        $cod = $_GET['cod'];
        if($cod == 0){
            $ID = $_GET['id'];
            $notificacao2 = NotificacaoSalario::findBySql(con(),"SELECT * FROM `notificacao_salario` WHERE id='$ID'");
            foreach ($notificacao2 as $i2){$data_db = $i2->getDataN();}
            //Edita os dados
            $notificacao_edit = con()->prepare("UPDATE `notificacao_salario` SET `data_n`='$data_db',estado='$estado' WHERE id=:id_nf");
            $notificacao_edit->bindParam(":id_nf",$ID);
            $notificacao_edit->execute();
            //Sucesso ao editar
            returnAjax($r, '0');
        }
    }else{
        //Edita todas notificações
            $notificacao = NotificacaoSalario::findBySql(con(),"SELECT * FROM `notificacao_salario`");
            foreach ($notificacao as $i){
                $data_db = $i->getDataN();
                if($i->getEstado() == 0){
                    //Edita os dados
                    $ID2=$i->getId();
                    $notificacao_edit2 = con()->prepare("UPDATE `notificacao_salario` SET `data_n`='$data_db',estado='$estado' WHERE id=:id_");
                    $notificacao_edit2->bindParam(":id_",$ID2);
                    $notificacao_edit2->execute();
                }
            }
        //Sucesso ao editar
        returnAjax($r, '1');
    }
