<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start(); 
// Validação de login 

    if (isset($_POST["submit"])){
        
        /* @var $_POST type */
        $u = $_POST["username"];
        $p = $_POST["password"];
    
        $_SESSION['user'] = $u;
        $_SESSION['senha'] = $p;
        
        if($u == "admin" && $p == "1234"){
            header("Location:../privado/admin/index.php");
        }else if($u == "pessoal" && $p == "1234"){
            header("Location:../privado/g_pessoal/index.php");
        }else if($u == "crianca" && $p == "1234"){
            header("Location:../privado/g_crianca/index.php");
        }else if($u == "salario" && $p == "1234"){
            header("Location:../privado/g_salario/index.php");
        }else{
            echo "<script>
                jQuery(document).ready(function(){
                jQuery('.login-alert').fadeIn();
                return false;
              })
            </script>";
        }
    }
    
    header("Location:../../login/login.php");
    exit();