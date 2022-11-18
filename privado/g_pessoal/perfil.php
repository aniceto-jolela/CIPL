<!-- Verifica se o utilizador está logado -->
 <?php include_once '../importante/log_g_pessoal.php';?>
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
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="page-header cor_sumario">
                                <i class="glyphicon glyphicon-user"></i> Perfil
                            </h3>
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="fa fa-refresh"></i><span> Cosultar perfil</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
                <!-- Selecionar o usuário -->
            <!-- Area do perfil -->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <?php 
                    //Ver os usuarios
                    $query = "SELECT * FROM usuario ORDER BY id ASC";
                    $ver = Usuario::findBySql(con(), $query);
                    $id = 0;
                    foreach ($ver as $i):
                    if($_SESSION['user'] == $i->getUsuario()){
                      
                ?>
                    <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <img src="<?php echo $i->getFoto() ?>" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn" id="perfil">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a>Gestão de pessoal</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <form action="editar_usuario.php">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="address-hr biography">
                                                                <p><b>Name</b><br/> <?php echo $i->getNome() ?></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="address-hr biography">
                                                                    <p><b>Usuário</b><br /> <?php echo $i->getUsuario() ?></p>
                                                                </div>
                                                        </div><br>

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="address-hr biography">
                                                                    <p><b>Email</b><br /><?php echo $i->getEmail() ?></p>
                                                                </div>
                                                        </div>

                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="address-hr biography">
                                                                <p><b>Telefone</b><br /><?php echo $i->getTelefone() ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }endforeach;?>
            </div>
        </div>
            
        </div>
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
    </body>

</html>