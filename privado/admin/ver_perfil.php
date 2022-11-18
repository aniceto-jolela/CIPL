<?php
    include_once '../servidor/conectar.php';
    $query = "SELECT * FROM usuario";
    $ver = Usuario::findBySql(con(), $query);
    foreach ($ver as $i){
        if($_SESSION['user'] == $i->getNome() && $_SESSION['senha'] == $i->getSenha()){
           $_POST['n']=$i->getNome();
           $_POST['u']=$i->getUsuario();
           $_POST['e']=$i->getEmail();
           $_POST['t']=$i->getTelefone();
           $_POST['f']=$i->getFoto();
           exit();
        }
    }

?>