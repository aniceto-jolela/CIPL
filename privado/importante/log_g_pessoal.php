<?php 
    /* Conexão com o servidor */
    require_once '../servidor/conectar.php';
    /* Verifica se o utilizador está logado*/
    if(!isset($_SESSION['user'])){
        header("Location:../login/login.php");
        exit();
    }

    /* Verifica o controle da URL dos departamentods*/
    if($_SESSION['modulo'] != 2){
        $_SESSION = array();
        session_destroy();
        header("Location:../login/login.php");
        exit();
    }
   