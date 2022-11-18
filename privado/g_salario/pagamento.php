 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_salario.php'; ?>
<!doctype html>
<html>
    <head>
        <?php include_once 'sidebar.php'; ?>
        <?php include_once '../importante/select_header.php';?>
        <?php include_once '../importante/notificacao_header.php'; ?>
        <style>
            th{text-indent: 10px;padding: 10px 10px 10px 0;font-weight: 800;}
            table,th,td{border: #9e9e9e solid 1px;}
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
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="page-header cor_sumario">
                                <i class="fa fa-money"></i> Pagamento
                            </h3>
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="fa fa-plus-circle"></i><span> Pagamento de propinas</span>
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
                                    <form method="post" id="fomDados" enctype="multipart/form-data">
                                        <div id="toolbar">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                
                                                <div class=" form-group col-lg-12  ">
                                                    <label for="s_encarregado">Seleciona o encarregado</label>
                                                    <div class="vento">
                                                        <select data-placeholder="Seleciona o encarregado" name="s_encarregado" onchange="mostrarCriana()" class="chosen-select" id="s_encarregado" tabindex="-1">
                                                            <option></option>
                                                            <?php 
                                                                $ver = Encarregado::findBySql(con(), "SELECT * FROM encarregado ORDER BY id ASC");
                                                                foreach ($ver as $i):
                                                                if($i->getEstado() == 0){
                                                            ?>
                                                                <option value="<?php echo $i->getId() ?>"><?php echo $i->getNome() ?></option>
                                                            <?php }endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-12" >
                                                    <label for="codigo" class="control-label">Código</label>
                                                    <input type="text" class="form-control vento" id="codigo" name="codigo" autocomplete="off" placeholder="Inseri o código do talão" required>
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <label for="f_talao">Foto do talão</label>
                                                    <input type="file" class="form-control vento" id="f_talao" name="f_talao" accept=".jpg,.jpeg,.png">
                                                    <em><span id="arqTalao" style="color:red;"></span></em>
                                                </div>
                                                <div class="form-group col-lg-12" >
                                                    <label for="data" class="control-label">Data de emissão</label>
                                                    <input type="date" class="form-control vento" id="data" name="data" required>
                                                    <em><span id="dataAl" style="color:red"></span></em>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light informacao" id="enviar" onclick="cPagamento()">Guardar <img id="progresso"></button>
                                                </div>
                                            </div>
                                            <!-- Justificar falta -->
                                            <div class="form-group col-lg-6">
                                                <h4> Criança/s | Modo de pagamento ( <input type="number" name="mes" min="1" id="mes" value="1" style="width:50px" onchange="Mes()"> <span id="mesAuto"></span> ) </h4>
                                            </div>

                                            
                                            <!-- Tabela -->
                                            <div class="form-group col-lg-6">
                                                <id id="info">
                                                    <!-- Onde vai aparecer a tabela das crianças -->
                                                </id>
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
            <input type="hidden" id="basicErrorAnimation_pagamento_encarregado">
            <input type="hidden" id="basicErrorAnimation_pagamento_crianca_void">
        <!-- End notificação -->
        </div>
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
        <?php include_once '../importante/select_footer.php';?>
        <!-- notification JS -->
        <?php include_once '../importante/notificacao_footer.php'; ?>
        <!-- Area do AJAX -->
        <?php include_once '../servidor/ajax/c_pagamento.php'; ?>
    </body>

</html>