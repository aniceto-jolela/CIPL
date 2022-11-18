<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    /* Redirecionamento do login para o index... */

    if (isset($_SESSION["user"])){
        $u = $_SESSION["user"];
        $p = $_SESSION["senha"];
        
       if($u == "admin" && $p == "1234"){
            header('Location:../privado/admin/index.php');
        }else if($u == "pessoal" && $p == "1234"){
            header("Location:../privado/g_pessoal/index.php");
        }else if($u == "crianca" && $p == "1234"){
            header("Location:../privado/g_crianca/index.php");
        }else if($u == "salario" && $p == "1234"){
            header("Location:../privado/g_salario/index.php");
        } 
       
    }

