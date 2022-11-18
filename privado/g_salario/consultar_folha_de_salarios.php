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
                                <i class="fa fa-clipboard"></i> Folha de salário
                            </h3>
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="glyphicon glyphicon-refresh"></i><span> Faz & consulta a folha de salário</span>
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
                                        <select name="s_falta" id="add_data" class="informacao" tabindex="-1" onchange="mostrarFolha(this.value)">
                                            <option disabled selected> Consultar data </option>
                                            <?php 
                                                $FS = FolhaSalario::findBySql(con(), "SELECT * FROM `folha_salario` ORDER BY data_admissao");
                                                $dAM = 0;
                                                foreach ($FS as $d):
                                                    $MT = $d->getDataAdmissao();
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
                                    <form method="post" id="fomDados">
                                        
                                        
                                        <button class="btn btn-primary waves-effect vento" type="submit" id="enviar" onclick="novaFolha()">Nova <img id="progresso"></button>
                                        <button class="btn btn-primary waves-effect vento" type="submit" id="enviar2" onclick="mostraRemuneracao()">Remuneração</button>
                                        <button class="btn btn-primary waves-effect vento" type="submit" onclick="mostraSubFeria()">
                                            <!-- Para o evento da imagem gif funcionar -->
                                            <span id="enviar3">Subsídio de féria </span> 
                                            <img id="progresso2">
                                        </button>
                                        <button class="btn btn-primary waves-effect vento" type="submit" onclick="mostraSubDMes()"><span id="enviar4">Subsídio de 13º mês </span> <img id="progresso3"></button>
                                        
                                        <?php
                                            /* ============================ CONTROLO DE ABLITAÇÃO DOS BOTÕES ======================================== */
                                            $BFS = FolhaSalario::findBySql(con(), "SELECT * FROM `folha_salario`");
                                            foreach ($BFS as $bf) {
                                                $data_hoje = date("Y-m");
                                                $MT2 = $bf->getDataAdmissao();
                                                $dAM_db2 = substr($MT2, 0,7);
                                                if($data_hoje == $dAM_db2){
                                                    //Disablita os dois botões
                                                    echo "<script>document.getElementById('enviar').disabled=true;
                                                    document.getElementById('enviar2').disabled=true;</script>";break;
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
        <!-- Area do AJAX -->
        <?php include_once '../servidor/ajax/c_folha_salario.php'; ?>
        
    </body>

</html>