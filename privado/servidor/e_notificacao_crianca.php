<?php
    //Conecta com a base de dados
    include_once 'conectar.php';

    $estado=1;$data_db="";
    if(isset($_GET['cod'])){
        //Notificação do index
        $ID = $_GET['cod'];
        $notificacao3 = NotificacaoCrianca::findBySql(con(),"SELECT * FROM `notificacao_crianca` WHERE id='$ID'");
        foreach ($notificacao3 as $i3){$data_db = $i3->getDataN();}
        //Edita os dados
        $notificacao_edit = con()->prepare("UPDATE `notificacao_crianca` SET estado='$estado' WHERE id=:id_nf");
        $notificacao_edit->bindParam(":id_nf",$ID);
        $notificacao_edit->execute();
        //Sucesso ao editar
        //Retorno
        echo "sucesso";
    }else{
        //=======================================* Notificação da notificação
        if(isset($_GET['codigo'])){
            $codigo = $_GET['codigo'];
            if($codigo == 0){
                $ID_ = $_GET['id'];
                $notificacao2 = NotificacaoCrianca::findBySql(con(),"SELECT * FROM `notificacao_crianca` WHERE id='$ID_'");
                foreach ($notificacao2 as $i2){$data_db = $i2->getDataN();}
                //Edita os dados
                $notificacao_edit = con()->prepare("UPDATE `notificacao_crianca` SET `data_n`='$data_db',estado='$estado' WHERE id=:id_nf");
                $notificacao_edit->bindParam(":id_nf",$ID_);
                $notificacao_edit->execute();
                //Sucesso ao editar
                returnAjax($r, '0');
            }
        }else{
            //Edita todas notificações
            $notificacao = NotificacaoCrianca::findBySql(con(),"SELECT * FROM `notificacao_crianca`");
            foreach ($notificacao as $i){
                $data_db = $i->getDataN();
                if($i->getEstado() == 0){
                    //Edita os dados
                    $ID2=$i->getId();
                    $notificacao_edit2 = con()->prepare("UPDATE `notificacao_crianca` SET `data_n`='$data_db',estado='$estado' WHERE id=:id_");
                    $notificacao_edit2->bindParam(":id_",$ID2);
                    $notificacao_edit2->execute();
                }
            }
            //Sucesso ao editar
            returnAjax($r, '1');
        }
    }
