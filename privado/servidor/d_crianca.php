<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $ID = $_GET['cod'];$data_cad= date("Y-m-d H:i:s");
    $ver = Crianca::findBySql(con(), "SELECT * FROM crianca");
    foreach ($ver as $i){
        if($ID == $i->getId()){
            //Pega a data de cadastro
            $data_cad = $i->getDataCadastro();break;
        }
    }
    
    //================================ Deletar Criança (Edita) ================================
    //Estado -> 1 ciança eliminada 0 activa
    $estado = 1;
    //Edita o estado e a data de cadastro da criança
    $crianca_edit = con()->prepare("UPDATE `crianca` SET `data_cadastro`='$data_cad',`estado`='$estado' WHERE id=:id_crianca");
    $crianca_edit->bindParam(":id_crianca",$ID);
    $crianca_edit->execute();
    
    //======================= Edita o estado da união =====================================
    /*============ Variaveis ==============
     * encarregado1-> pega o encarregado 1 da união
     * encarregado2-> pega o encarregado 2 da união
     * cont->conta o número de encarregado
     * pega->Confirma que são 2 encarregados
     * inativo->verifica se o estado do encarregado 1 está activo
     * inativo2->verifica se o estado do encarregado 2 está activo
     **/
    $encarregado1 = 0;$encarregado2 = 0;$cont = 0;$pega = 0;$inativo = 1;$inativo2 = 1;
    $uniao = Uniao::findBySql(con(), "SELECT * FROM uniao");
    foreach ($uniao as $value) {
        if($value->getCriancaId() == $ID){
            $ID_uni = $value->getId();
            $uniao_edit = con()->prepare("UPDATE `uniao` SET `estado`='$estado' WHERE `id`=:id_uniao");
            $uniao_edit->bindParam(":id_uniao",$ID_uni);
            $uniao_edit->execute();
            //Pega o encarregado 1 e 2
            if($cont == 0){
                $encarregado1=$value->getEncarregadoId();
            }else{
                $encarregado2=$value->getEncarregadoId();$pega=1;
            }
            ++$cont;
        }
    }
    //============================ End Edita o estado da união =================================
    //Actualiza a união para fazer a verificação do encarregado
    
    $uniao2 = Uniao::findBySql(con(), "SELECT * FROM uniao");
    foreach ($uniao2 as $value2) {
        //Verifica se o encarregado ainda está activo na tabela da união        
        if($value2->getEncarregadoId() == $encarregado1 && $value2->getEstado() == 0){$inativo = 0;}
        if($value2->getEncarregadoId() == $encarregado2 && $value2->getEstado() == 0){$inativo2 = 0;}
    }
    //Edita o estado do encarregado
    if($inativo == 1){
        $uniao_edit = con()->prepare("UPDATE `encarregado` SET `estado`='$estado' WHERE `id`=:id_encarregado");
        $uniao_edit->bindParam(":id_encarregado",$encarregado1);
        $uniao_edit->execute();
    }
    if($pega == 1 && $inativo2 == 1){
        $uniao_edit2 = con()->prepare("UPDATE `encarregado` SET `estado`='$estado' WHERE `id`=:id_encarregado_");
        $uniao_edit2->bindParam(":id_encarregado_",$encarregado2);
        $uniao_edit2->execute();
    }
    
    
    
   