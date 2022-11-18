<!-- Inicio da sessão -->
<?php 
    //Conexão com o servidor 
    require_once '../servidor/conectar.php';
    /* Redirecionamento do login para o index... */
    if (isset($_SESSION["user"])){

        if($_SESSION['modulo'] == 1){
            header("Location:../admin/index.php");exit();
        }else if($_SESSION['modulo'] == 2){
            header("Location:../g_pessoal/index.php");exit();
        }else if($_SESSION['modulo'] == 3){
            header("Location:../g_crianca/index.php");exit();
        }else if($_SESSION['modulo'] == 4){
            header("Location:../g_salario/index.php");exit();
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login - CIPL</title>
        <link rel="stylesheet" href="css/style.default.css" type="text/css" />
        <link rel="stylesheet" href="css/style.shinyblue.css" type="text/css" />
        <link rel="icon" href="images/logo1.ico" type="image/x-icon">

        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
        <script type="text/javascript" src="js/modernizr.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>
      
        <style>
            img{
                width: 350px;
                margin-bottom: -90px;
            }
            button{
                width: 50% !important;
                background: #0E993C !important;
                border-radius: 5px;
            }
            body{background: url("images/home1.jpg") no-repeat !important;
                 background-size: 100% !important;
            }
            label,p{color: #161616 !important;}
        </style>
    </head>

    <body class="loginpage" id="all">

        <div class="loginpanel">
            <div class="loginpanelinner">
                <div class="logo animate0 bounceIn "><img src="images/logo.png" alt="" /></div>
                
                <form id="login" action="" method="POST">
                    <div class="inputwrapper login-alert">
                        <div class="alert alert-error">Usuário ou palavra passe errada</div>
                    </div>
                    <div class="inputwrapper animate1 bounceIn">
                        <input type="text" autocomplete="off" name="username" id="username" placeholder="Usuário" required/>
                    </div>
                    <div class="inputwrapper animate2 bounceIn">
                        <input type="password" autocomplete="off" name="password" id="password" placeholder="Palavra - Passe" required />
                    </div>
                    <div class="inputwrapper animate3 bounceIn">
                        <button name="submit">Entrar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="loginfooter">
            <p>&copy; 2019. Todos os direitos reservado.</p>
        </div>

    </body>
</html>

<!-- Validação de login -->
 <?php 
   
    if (isset($_POST["submit"])){

        $query = "SELECT * FROM `usuario`";
        $verificar = Usuario::findBySql(con(), $query);
        
        /* @var $_POST type */
        $u = $_POST["username"];
        $p = md5($_POST["password"]);
        //Passwor para veterano
        $p2 = md5($p);
        //Pega o total de usuarios cadastrados
        $cont2=0;
        foreach($verificar as $a){$cont2++; $total=$cont2;}
        //Verifica os usuários cadastrados
        $cont=0;
        foreach ($verificar as $i){$cont++;
            if($u == $i->getUsuario() && $i->getIdModulo()==1){
                if($p == $i->getSenha() || $p2 == $i->getSenha() ){
                    //Verifica e o usuário é novo zero é , 1 não
                    echo $i->getSenha();
                    if($i->getEstado() == 0){
                        $_SESSION['codigo'] = $i->getId();
                        header("Location:alterar_senha.php");exit();
                    }else{
                        $_SESSION['user'] = $i->getUsuario();
                        $_SESSION['senha'] = $i->getSenha();
                        $_SESSION['foto'] = $i->getFoto();
                        $_SESSION['codigo'] = $i->getId();
                        //SESSÕES DE CONTROLE DE TERCEIROS (USUÁRIOS E PASSWORD)
                        $_SESSION['modulo'] = $i->getIdModulo();
                        header("Location:../admin/index.php");exit();
                    }
                }
            }else if($u == $i->getUsuario() && $i->getIdModulo()==2){
                if($p == $i->getSenha() || $p2 == $i->getSenha()){
                    //Verifica e o usuário é novo zero é , 1 não
                    if($i->getEstado() == 0){
                        $_SESSION['codigo'] = $i->getId();
                        header("Location:alterar_senha.php");exit();
                    }else{
                        $_SESSION['user'] = $i->getUsuario();
                        $_SESSION['senha'] = $i->getSenha();
                        $_SESSION['foto'] = $i->getFoto();
                        //SESSÕES DE CONTROLE DE TERCEIROS (USUÁRIOS E PASSWORD)
                        $_SESSION['modulo'] = $i->getIdModulo();
                        header("Location:../g_pessoal/index.php");exit();
                    }
                }
            }else if($u == $i->getUsuario() && $i->getIdModulo()==3){
                if($p == $i->getSenha() || $p2 == $i->getSenha()){
                    //Verifica e o usuário é novo zero é , 1 não
                    if($i->getEstado() == 0){
                        $_SESSION['codigo'] = $i->getId();
                        header("Location:alterar_senha.php");exit();
                    }else{
                        $_SESSION['user'] = $i->getUsuario();
                        $_SESSION['senha'] = $i->getSenha();
                        $_SESSION['foto'] = $i->getFoto();
                        //SESSÕES DE CONTROLE DE TERCEIROS (USUÁRIOS E PASSWORD)
                        $_SESSION['modulo'] = $i->getIdModulo();
                        header("Location:../g_crianca/index.php");exit();
                    }
                }
            }else if($u == $i->getUsuario() && $i->getIdModulo()==4){
                if($p == $i->getSenha() || $p2 == $i->getSenha()){
                    //Verifica e o usuário é novo zero é , 1 não
                    if($i->getEstado() == 0){
                        $_SESSION['codigo'] = $i->getId();
                        header("Location:alterar_senha.php");exit();
                    }else{
                        $_SESSION['user'] = $i->getUsuario();
                        $_SESSION['senha'] = $i->getSenha();
                        $_SESSION['foto'] = $i->getFoto();
                        //SESSÕES DE CONTROLE DE TERCEIROS (USUÁRIOS E PASSWORD)
                        $_SESSION['modulo'] = $i->getIdModulo();
                        header("Location:../g_salario/index.php");exit();
                    }
                }
            }else{
                if($cont == $total){
                 echo "<script>
                            jQuery(document).ready(function(){
                                jQuery('.login-alert').fadeIn();
                                return false;
                            })
                        </script>";
                }
            }
        }
    
    }
    exit();