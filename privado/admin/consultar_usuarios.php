<!-- Verifica se o utilizador está logado -->
 <?php include_once '../importante/log_admin.php';?>
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
                                <i class="glyphicon glyphicon-refresh"></i> Consultar
                            </h3>
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="glyphicon glyphicon-refresh"></i><span> Consultar usuários</span>
                                </li>
                                <a href="../servidor/pdf_usuarios.php" target="_blanck"><i class="fa fa-print pull-right fa-2x"></i></a>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright" >
                                    <form method="post" id="mostrarD" class="deleta_id">
                                        <div id="v_dados"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->
            
        </div>
        
        <!-- Start do Modal -->
        <div class="modal fade" id="img_arquivo" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-bootstrap" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button"  class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="foto_modal" class="arquivo2" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- ENd Modal -->
        
        <!-- Start do Modal Editar-->
        <div class="modal fade" id="editaModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-bootstrap" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editaModalLabel">Edita usuário</h5>
                        <button type="button"  class="close" data-dismiss="modal" id="fecha">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="edita_form" enctype="multipart/form-data">
                            <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group col-lg-6">
                                    <label for="nome" class="control-label">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo do funcionário" autocomplete="off">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="usuario">Usuário</label>
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Nome do usuário ex.(usuario12)" autocomplete="off"  >
                                    <em><span id="alerta1" style="color: red"></span></em>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="utilizador@email.com" autocomplete="off" >
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="tel">Telefone</label>
                                    <input type="tel" class="form-control" id="tel" name="tel" data-mask="(+244) 999-999-999" autocomplete="off">
                                </div>
                                <div class="form-group col-lg-4">
                                    <div class="form-select-list">
                                        <label for="sexo">Sexo</label>
                                        <select class="form-control custom-select-value" id="sexo" name="sexo">
                                            <option value="M">Masculino</option>
                                            <option value="F" >Feminino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="file">Foto</label>
                                    <input type="file" class="form-control" id="file" name="file" accept=".jpg,.jpeg,.png" >
                                    <em><span id="alerta2" style="color: red"></span></em>
                                </div>
                                <div class="col-lg-6 col-md-9 col-sm-9 col-xs-12">
                                    <div class="form-select-list">
                                        <label for="modulo">Modulo</label>
                                        <select class="form-control custom-select-value" id="modulo" name="modulo" >
                                            <!-- Mostra os dados dos modulos -->
                                            <?php 
                                                $ver2= Modulo::findBySql(con(), "SELECT * FROM modulo");
                                                foreach ($ver2 as $i2):
                                            ?>
                                            <option value="<?php echo $i2->getId(); ?>"> <?php echo $i2->getNome(); ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                                    <input type="button" name="edita" id="edita" value="Editar" onclick="editarFuncao()" class="btn btn-success">
                                    <input type="hidden" name="ID" id="ID">
                                    <input type="hidden" id="file2" name="file2">
                                    <input type="hidden" id="data_cad" name="data_cad">
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ENd Modal -->
        
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
        <!-- Area do AJAX -->
        <?php include_once '../servidor/ajax/e_r_usuarios.php';?>
    </body>

</html>
