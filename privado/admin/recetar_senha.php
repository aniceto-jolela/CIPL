<!-- Verifica se o utilizador está logado -->
 <?php include_once '../importante/log_admin.php';?>
<!doctype html>
<html>
    <head>
        <?php  include_once 'sidebar.php'; ?>
        <?php include_once '../importante/select_header.php'; ?>
        <?php include_once '../importante/notificacao_header.php'; ?>
        <style>
            .flexivel{display: flex;justify-content: center;}
            #imagem{background: #7c7c7c;width: 90px;height: 90px;border-radius: 100%;}
            #fotoUsu{border-radius: 100%;width: 90px;height: 90px;}
        </style>
    </head>

    <body>
        <!-- Start Welcome area -->
        <div class="all-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                     <?php include_once '../importante/logo_mobile.php'; ?>
                </div>
            </div>
            <div class="header-advance-area">
                <?php include_once 'header.php'; ?>
                <!-- Mobile Menu start -->
                    <?php include_once 'mobile.php'; ?>
                <!-- Mobile Menu end -->
            
                <div class="container-fluid">
                    <div class="row"><br><br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="page-header mg-t-15 cor_sumario">
                                <i class="fa fa fa-spinner"></i> Senha
                            </h3>
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="fa fa fa-spinner"></i><span> Recuperar a senha</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Formulário de cadastro -->

            <form method="post"  id="minhaForm" >
                    <div class="password-meter-area mg-b-15">
                    <div class="container-fluid">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline9-list">
                                <div class="sparkline9-graph ">
                                    <div class="vento"><br>
                                        <div class="form-group  flexivel">
                                            <div id="imagem" class="vento">
                                                <img id="fotoUsu" src="../../img/usuarios/padrao/padrao.png">
                                        </div>
                                        </div>
                                        <div class="form-group flexivel">
                                            <div>
                                                <input type="text" class="form-control example4 vento" value="Por padrão é (1234)" disabled >
                                            </div>
                                        </div>
                                            
                                            <div class="flexivel">
                                                <div class="chosen-select-single">
                                                    <label for="usuario">Usuário</label>
                                                    <div class="vento">
                                                        <select data-placeholder="Seleciona o usuário" name="usuario" class="chosen-select" id="usuario" onchange="mostrarImagem(this.value)" tabindex="-1" required>
                                                            <!-- Mostra os dados dos modulos -->
                                                            <option></option>
                                                            <?php 
                                                                $ver= Usuario::findBySql(con(), "SELECT * FROM `usuario` ORDER BY nome");
                                                                foreach ($ver as $i):
                                                            ?>
                                                            <option value="<?php echo $i->getId(); ?>"><?php echo $i->getUsuario(); ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <em><label id="alerta" style="color: red;"></label></em>
                                                </div>
                                            </div>
                                            <div class=" login-horizental flexivel">
                                                <button class="btn btn-sm btn-primary login-submit-cs vento"  onclick="submeterForm()">Recuperar <img id="progresso"> </button>
                                            </div><br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <input type="hidden" id="basicSuccessAnimation_recetar_senha" >
            <!-- Formulário de cadastro Fim-->
            
        </div>
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
        <?php include_once '../importante/select_footer.php'; ?>
        <!-- notification JS -->
        <?php include_once '../importante/notificacao_footer.php'; ?>
        <!-- Area do AJAX -->
        <?php include_once '../servidor/ajax/recetar_senha.php'; ?>
    </body>

</html>


