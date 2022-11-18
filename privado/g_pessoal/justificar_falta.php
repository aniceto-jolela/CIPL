 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_pessoal.php'; ?>
<!doctype html>
<html>
    <head>
        <?php include_once 'sidebar.php'; ?>
        <?php include_once '../importante/table_header.php'; ?>
        <?php include_once '../importante/select_header.php';?>
        <?php include_once '../importante/notificacao_header.php'; ?>
        <style>
            #info{border: #999999 solid 4px;width: 100%;}
        </style>
    </head>

    <body>
        <!-- Start Welcome area -->
        <div class="all-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php include_once '../importante/logo_mobile.php'; ?>
                    </div>
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
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="fa fa-plus-circle"></i><span> Controlar presença</span>
                                </li>
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
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <form method="post" action="../servidor/c_justificar_falta.php" id="formFuncionario" enctype="multipart/form-data">
                                        <div id="toolbar">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label> Funcionário </label>
                                                <div class=" form-group  chosen-select-single informacao">
                                                    <select data-placeholder="Seleciona o funcionário" name="s_funcionario" id="fs" onchange="mostrarFalta(this.value)" class="chosen-select" tabindex="-1">
                                                        <option></option>
                                                        <?php 
                                                            $ver = Funcionario::findBySql(con(), "SELECT * FROM funcionario ORDER BY nome");
                                                            foreach ($ver as $i):
                                                                if($i->getEstado() == 0){
                                                            $cargo = Cargo::findById(con(),$i->getCargoId());
                                                        ?>
                                                        <option value="<?php echo $i->getId() ?>"><?php echo $i->getNome() ?></option>
                                                        <?php }endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- Justificar falta -->
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                                <label> Justificativo </label>
                                                <input type="file" class="form-control informacao" name="f_justificativo" id="f_justificativo" id="file" accept="application/pdf" required>
                                                
                                            </div>
                                            
                                            <div class="form-group col-lg-4 pull-left">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light informacao" id="enviar" onclick="submeterJustificar('formFuncionario')">Guardar <img id="progresso"></button>
                                            </div>

                                            <!-- Tabela -->
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
                                                <table border="1px " id="info" class="informacao">
                                                    
                                                </table>
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
        <!-- Static Table End -->
        <!-- Area da notificação -->
            <input type="hidden" id="basicErrorAnimation_justificativo_funcionario_n_justificou">
            <input type="hidden" id="basicErrorAnimation_justificativo_funcionario_void">
        <!-- End notificação -->
        </div>
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
        <?php include_once '../importante/table_footer.php';?>
        <?php include_once '../importante/select_footer.php';?>
        <!-- notification JS -->
        <?php include_once '../importante/notificacao_footer.php'; ?>
        <!-- Area do AJAX -->
        <script src="../servidor/ajax/c_justificar_falta.js"></script>
    </body>

</html>