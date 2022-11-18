 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_pessoal.php'; ?>
<!doctype html>
<html>
    <head>
        <?php include_once 'sidebar.php'; ?>
        <?php include_once '../importante/table_header.php'; ?>
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
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="fa fa-refresh"></i><span> Consultar presença</span>
                                </li>
                                <a href="../servidor/pdf_presenca.php" target="_blanck"><i class="fa fa-print pull-right fa-2x"></i></a>
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
                                   
                                    <!-- Tabela -->
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="id" >Nº</th>
                                                <th data-field="nome" >NOME</th>
                                                <th data-field="entrada" >ENTRADA</th>
                                                <th data-field="saida" >SAÍDA</th>
                                                <th data-field="obs" >OBSERVAÇÃO</th>
                                                <th data-field="hora" >TOTAL DE HORA</th>
                                                <th>FALTA</th>
                                                <th>MOTIVO</th>
                                                <th>DATA</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $ver = Presenca::findBySql(con(), "SELECT * FROM presenca");
                                                foreach ($ver as $i):
                                                $motivo = MotivoFalta::findById(con(), $i->getMotivoId());
                                                $funcionario = Funcionario::findById(con(), $i->getFuncionarioId());
                                            ?>
                                                <tr>
                                                    <td><?php echo $i->getId() ?></td>
                                                    <td><?php echo $funcionario->getNome(); ?></td>
                                                    <td><?php echo $i->getDataEntrada() ?></td>
                                                    <td><?php echo $i->getDataSaida() ?></td>
                                                    <td><?php echo $i->getObservacao() ?></td>
                                                    <td><?php echo $i->getTotalHora() ?></td>
                                                    <td><?php echo $i->getFalta() ?></td>
                                                    <!-- Para evitar erro na tabela (no campo void) -->
                                                    <?php if($motivo !=null){ ?>
                                                        <td><?php echo $motivo->getNome() ?></td>
                                                        <?php }else{ ?>
                                                        <td></td>
                                                    <?php }?>
                                                        
                                                    <td><?php echo $i->getDataFalta() ?></td>
                                                </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
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
    </body>

</html>