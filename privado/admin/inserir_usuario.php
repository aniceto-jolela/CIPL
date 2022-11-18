<!-- Verifica se o utilizador está logado -->
 <?php include_once '../importante/log_admin.php';?>
<!doctype html>
<html>
    <head>
        <?php  include_once 'sidebar.php'; ?>
        <!-- notifications CSS
        ============================================ -->
        <link rel="stylesheet" href="../../css/notifications/Lobibox.min.css">
        <link rel="stylesheet" href="../../css/notifications/notifications.css">
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
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="page-header mg-t-15 cor_sumario">
                                <i class="glyphicon glyphicon-user"></i> Cadastrar
                            </h3>
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="fa fa-laptop"></i><span> Cadastrar usuário</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Formulário de cadastro -->

            <form method="post" action="../servidor/c_usuario.php" enctype="multipart/form-data" id="minhaForm" >
                    <div class="password-meter-area mg-b-15">
                    <div class="container-fluid">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline9-list mg-t-29">
                                <div class="sparkline9-graph">
                                    <div id="pwd-container4">
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="nome" class="control-label">Nome</label>
                                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo do funcionário" autocomplete="off" required>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="usuario">Usuário</label>
                                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nome do usuário ex.(usuario12)" autocomplete="off"  required>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="utilizador@email.com" autocomplete="off" required >
                                            </div>
                                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label for="tel">Telefone</label>
                                                <input type="tel" class="form-control" id="tel" name="tel" data-mask="(+244) 999-999-999" autocomplete="off" required>
                                            </div>
                                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-select-list">
                                                    <label for="sexo">Sexo</label>
                                                    <select class="form-control custom-select-value" id="sexo" name="sexo">
                                                        <option value="M">Masculino</option>
                                                        <option value="F" >Feminino</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="senha">Palavra - passe</label>
                                                <input type="password" class="form-control example4" id="senha" name="senha" minlength="4" placeholder="Palavra - passe" required>
                                                <label>No minimo tem que ter 4 caracteres. </label>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <label for="file">Foto</label>
                                                <input type="file" class="form-control" id="file" name="file" accept=".jpg,.jpeg,.png">
                                                <em><span id="arqFoto" style="color: red"></span></em>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-select-list">
                                                    <label for="modulo">Modulo</label>
                                                    <select class="form-control custom-select-value" id="modulo" name="modulo" >
                                                        <!-- Mostra os dados dos modulos -->
                                                        <?php 
                                                            $ver= Modulo::findBySql(con(), "SELECT * FROM modulo");
                                                            foreach ($ver as $i):
                                                        ?>
                                                        <option value="<?php echo $i->getId(); ?>"><?php echo $i->getNome(); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div><br>
                                            </div>
                                            <div class=" login-horizental">
                                                <button class="btn btn-sm btn-primary login-submit-cs " id="enviar" onclick="SubmeterFormulario('minhaForm')">Cadastrar</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <input type="hidden" id="basicSuccessAnimation">
                <input type="hidden" id="basicErrorAnimation_usuario">
                <input type="hidden" id="basicErrorAnimation_usuario_espaco">
            <!-- Formulário de cadastro Fim-->
        </div>
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
        <!-- notification JS
        ============================================ -->
        <script src="../../js/notifications/Lobibox.js"></script>
        <script src="../../js/notifications/notification-active_entrada_saida_crianca_encarregado.js"></script>
        <!-- Area do AJAX -->
        <script src="../servidor/ajax/processo.js"></script>
    </body>

</html>


