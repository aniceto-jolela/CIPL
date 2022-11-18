<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $ID=$_GET['cod'];$data_cad= date("Y-m-d H:i:s");
    $ver = Funcionario::findBySql(con(), "SELECT * FROM funcionario");
    foreach ($ver as $i){
        if($ID == $i->getId()){
            //Pega a data de cadastro
            $data_cad = $i->getDataCadastro();break;
        }
    }
    
    //Deletar Funcionário (Edita)
    //Estado -> 1 func eliminado 0 activo
    $estado = 1;
    //Edita os dados
    $funcionario_edit = con()->prepare("UPDATE funcionario SET `data_cadastro`='$data_cad',`estado`='$estado' WHERE id=:id_funcionario");
    $funcionario_edit->bindParam(":id_funcionario",$ID);
    $funcionario_edit->execute();
    
   