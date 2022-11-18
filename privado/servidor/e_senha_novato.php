
<?php
    include_once 'conectar.php';
    
    $senha = md5(filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING));
    //Verifica se fez sessão
    if(isset($_SESSION['codigo'])){
        //Pega o id do usuário
        $ID = $_SESSION['codigo'];
    
    $usuario = Usuario::findBySql(con(), "SELECT * FROM `usuario` WHERE id = '".$ID."'");
    
    foreach($usuario as $i):
        if($ID == $i->getId()){
            if($senha != $i->getSenha()){
                $data_cad = $i->getDataCadastro();
                //Aumento de segurança na senha do usuário
                $novaSenha = md5($senha);
                $usuario_edit = con()->prepare("UPDATE usuario SET senha='$novaSenha',data_cadastro='$data_cad',estado='1' WHERE id=:id_usuario");
                $usuario_edit->bindParam(":id_usuario",$ID);
                $usuario_edit->execute();
                //Cria a sessão
                $_SESSION['user'] = $i->getUsuario();
                $_SESSION['senha'] = $i->getSenha();
                $_SESSION['foto'] = $i->getFoto();
                //SESSÕES DE CONTROLE DE TERCEIROS (USUÁRIOS E PASSWORD)
                $_SESSION['modulo'] = $i->getIdModulo();
                //Sucesso
                if($i->getIdModulo() == 1){ returnAjax($r, '1');}
                if($i->getIdModulo() == 2){ returnAjax($r, '2');}
                if($i->getIdModulo() == 3){ returnAjax($r, '3');}
                if($i->getIdModulo() == 4){ returnAjax($r, '4');}
            }else{
                //Por favor altere a sua senha
                 returnAjax($r, '0');
            }
        }
    endforeach;
    
}else{ returnAjax($r, '40');}    
    
    
    
    
    