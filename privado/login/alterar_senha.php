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
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Alerar senha | CIPL</title>
        <meta name="viewport" content="width=device-width" />
        <link rel="icon" href="images/logo1.ico" type="image/x-icon">
       <style type="text/css">
            button{
                color:white;background:#1b8bf9;font-size: 25px;padding: 4px 10px;border-radius: 8px; text-align:center;
            }
            button:hover{cursor: pointer;background: #fecd68;color: black;}
            input{width: 180px;height: 50px;font-size: 30px;background: #888; }
        </style>
    </head>
    <body bgcolor="#34495E" style="margin: 0; padding: 0;" yahoo="fix">
        <form method="post" id="formDados">
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; max-width: 600px;" class="content">
                <tr>
                    <td style="padding: 15px 10px 15px 10px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td align="center" style="color: #fff; font-family: Arial, sans-serif; font-size: 12px;">
                                    É obrigatorio alterar a sua senha.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" bgcolor="#0073AA" style="padding: 20px 20px 20px 20px; color: #ffffff; font-family: Arial, sans-serif; font-size: 36px; font-weight: bold;">
                        <img src="images/logo.png" alt="ProUI Logo" width="152" height="152" style="display:block;" />
                    </td>
                </tr>
                <tr>
                    <td align="center" bgcolor="#ffffff" style="padding: 40px 20px 40px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 20px; line-height: 30px; border-bottom: 1px solid #f6f6f6;">
                        <b>Altere a sua senha *</b>
                    </td>
                </tr>
                <tr>
                    <td align="center" bgcolor="#f9f9f9" style="padding: 20px 20px 0 20px; color: #555555; font-family: Arial, sans-serif; font-size: 20px; line-height: 30px;">
                        <input type="password" name="senha" minlength="4" id="pw" placeholder="****" required>
                            <em><label style="font-size:15px;position: absolute;top:60%;left:43%;color:red" id="alerta">
                                <!-- Onde vai aparecer o alerta -->
                            </label></em>
                    </td>
                </tr>
                <tr>
                    <td align="center" bgcolor="#f9f9f9" style="padding: 30px 20px 30px 20px; font-family: Arial, sans-serif; border-bottom: 1px solid #f6f6f6;">
                        <table border="0" cellspacing="0" cellpadding="0" class="buttonwrapper">
                            <tr>
                                <td align="center" height="50" style=" padding: 0 25px 0 25px; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold;" class="button">
                                    <button onclick="editarSenha()"> Alterar  <img id="progresso"> </button>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" bgcolor="#ffffff" style="padding: 10px 20px 10px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 15px; line-height: 24px;">
                        <a href="login.php" style="color: #1b8bf9;">Voltar mas tarde!</a>
                    </td>
                </tr>
                <tr>
                    <td align="center" bgcolor="#dddddd" style="padding: 15px 10px 15px 10px; color: #555555; font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;">
                        <b> Os Pequenos Líderes.</b><br/> Rua da Travessa &bull; da Maianga, casa nº 12
                    </td>
                </tr>
                <tr>
                    <td style="padding: 15px 10px 15px 10px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td align="center" width="100%" style="color: #fff; font-family: Arial, sans-serif; font-size: 12px;">
                                    2019 &copy; Todos os direitos reservados.
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
        <?php include_once 'e_senha_script.php'; ?>
    </body>
</html>