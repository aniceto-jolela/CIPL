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
                    <div class="row"><br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="page-header cor_sumario">
                                <i class="fa fa-suitcase"></i> Consultar cargos
                            </h3>
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="fa fa-refresh"></i><span> Cargos</span>
                                </li>
                                <a href="../servidor/pdf_cargos.php" target="_blanck"><i class="fa fa fa-print pull-right fa-2x"></i></a>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row tb_cargo">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline13-list">
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright informacao">
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
        <!-- Start do Modal Editar-->
        <div class="modal fade" id="editaModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-bootstrap" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editaModalLabel">Edita cargo</h5>
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
                                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do cargo" autocomplete="off">
                                        <em><span style="color:red" id="aC"></span></em>
                                    </div>
                                    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
                                        <input type="button" name="edita" id="edita" value="Editar" onclick="editarFuncao()" class="btn btn-success" >
                                        <input type="hidden" name="ID" id="ID">
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
        <?php include_once '../servidor/ajax/e_r_cargos.php';?>
    </body>

</html>