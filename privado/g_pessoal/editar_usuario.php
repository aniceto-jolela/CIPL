 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_pessoal.php'; ?>
<!doctype html>
<html>
    <head>
        <?php include_once 'sidebar.php'; ?>
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
                    <div class="row"><br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="page-header" style="color: white;">
                                <i class="fa fa-laptop"></i> Editar
                            </h3>
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="fa fa-laptop"></i><span> Editar usuário</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Password meter Start -->
        <form>
            <div class="password-meter-area mg-b-15">
                <div class="container-fluid">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline9-list mg-t-30">
                            <div class="sparkline9-graph">
                                <div id="pwd-container4"><br><br>
                                        <div class="form-group col-lg-6">
                                            <label for="nome" class="control-label">Nome</label>
                                            <input type="text" class="form-control" id="nome" placeholder="Nome do funcionário" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="usuario">Usuário</label>
                                            <input type="text" class="form-control" id="usuario" placeholder="Nome do usuário" required >
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="familyname">Email</label>
                                            <input type="email" class="form-control" id="familyname" placeholder="Name" required >
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="tel">Telefone</label>
                                            <input type="tel" class="form-control" id="tel" maxlength="13" placeholder="(+244) 935 259 317">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="senha">Palavra - passe</label>
                                            <input type="password" class="form-control example4" id="senha" minlength="4" placeholder="Palavra - passe" required>
                                            <label>No minimo tem que ter 4 caracteres. </label>
                                        </div>
                                         <div class="form-group col-lg-6">
                                            <label for="file">Foto</label>
                                            <input type="file" class="form-control" id="file" >
                                        </div>
                                        <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
                                            <div class="form-select-list">
                                                <label for="senha">Tipo de usuário</label>
                                                <select class="form-control custom-select-value" name="account">
                                                        <option>Administrador</option>
                                                        <option>Gestão de pessoal</option>
                                                        <option>Gestão de Salário</option>
                                                        <option>Gestão de Criança</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" login-horizental">
                                            <button class="btn btn-sm btn-primary login-submit-cs " type="submit">Editar</button>
                                            
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Password meter End-->
        </div>
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
    </body>

</html>