 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_salario.php'; ?>
<!doctype html>
<html>
    <head>
        <?php include_once 'sidebar.php'; ?>
        <?php include_once '../importante/table_header.php'; ?>
        <style>
            .texto{
                width:80px;
                border: 0 !important;
                background: none;
            }
            select{
                width: 100%;
                height: 32px;
                border-radius: 10px;
            }
            th{
                padding-top: 16px !important;
                padding-bottom: 16px !important;
                text-indent: 15px;
                font-weight: 800 !important;
            }
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
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="page-header cor_sumario">
                                <i class="fa fa-clipboard"></i> Subsídio de 13º mês
                            </h3>
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="glyphicon glyphicon-refresh"></i><span> Faz & consulta Subsídio de 13º mês</span>
                                </li>
                                <a id="pdf_f" target="_blanck"><i class="fa fa-print pull-right fa-2x"></i></a>
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
                                <!-- CONSULTA  -->
                                    <div class="col-lg-2 mg-b-20">
                                        <select name="s_falta" id="add_data" class="informacao" tabindex="-1" onchange="mostrarSubsidioTM(this.value)">
                                            <option disabled selected> Consultar data </option>
                                            <?php 
                                                $SFDM = SubsidioDTerceiroMes::findBySql(con(), "SELECT * FROM `subsidio_d_terceiro_mes` ORDER BY data_emissao");
                                                $dAM = 0;
                                                foreach ($SFDM as $d):
                                                    $MT = $d->getDataEmissao();
                                                    $dAM_db = substr($MT, 0,7);
                                                    //Verifica se a data é diferente ao da base de dados
                                                    if($dAM != $dAM_db){   
                                            ?>
                                            <option><?php echo $dAM_db ?></option>
                                            <?php 
                                                }$dAM = $dAM_db;
                                            endforeach; ?>
                                        </select>
                                        
                                    </div>
                                
                                <!-- END CONSULTA  -->
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <form method="post"  id="fomDados">
                                        
                                        <?php
                                            /* ============================ CONTROLO DE ABLITAÇÃO DOS BOTÕES ======================================== */
                                            $BSDM = SubsidioDTerceiroMes::findBySql(con(), "SELECT * FROM `subsidio_d_terceiro_mes` ORDER BY data_emissao");
                                            foreach ($BSDM as $bf) {
                                                $data_hoje = date("Y-m");
                                                $MT2 = $bf->getDataEmissao();
                                                $dAM_db2 = substr($MT2, 0,7);
                                                if($data_hoje == $dAM_db2){
                                                    //Disablita os dois botões
                                                    echo "<script>document.getElementById('enviar').disabled=true;</script>";break;
                                                }
                                            }  
                                        ?>
                                        <!-- Tabela -->
                                        <table id="table" data-toggle="table"  data-key-events="true" data-resizable="true" data-cookie="true"
                                            data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar" class="mR">
                                        </table>
                                        <!-- End Tabela -->
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
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
        <?php include_once '../importante/table_footer.php';?>
        <script src="alert_notificacao.js" ></script>
        <!-- Area do AJAX -->
        <?php include_once '../servidor/ajax/mostrar_os_subsidios_F_M.php'; ?>
        
    </body>

</html>