
<?php
    include_once 'conectar.php';
    
    
    //Verifica o usuário foi selecionado
    if(isset($_POST['usuario'])){
        //Pega o id do usuário
        $ID = $_POST['usuario'];
    
        $usuario = Usuario::findBySql(con(), "SELECT * FROM `usuario` WHERE id = '".$ID."'");
        foreach($usuario as $i):
            if($ID == $i->getId()){
                $data_cad = $i->getDataCadastro();
                //Aumento de segurança na senha do usuário
                $DefaultSenha = md5("1234");
                $usuario_edit = con()->prepare("UPDATE usuario SET senha='$DefaultSenha',data_cadastro='$data_cad',estado='0' WHERE id=:id_usuario");
                $usuario_edit->bindParam(":id_usuario",$ID);
                $usuario_edit->execute();

                //Sucesso
                 returnAjax($r, '0');
                 break;
            }
        endforeach;
    
    }else{ returnAjax($r, '1');}    
    
    
    
    
    