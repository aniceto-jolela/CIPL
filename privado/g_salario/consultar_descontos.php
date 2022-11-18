<!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_salario.php'; ?>
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
                                <li><i class="glyphicon glyphicon-refresh"></i><span> Consultar descontos</span>
                                </li>
                                <a href="../servidor/pdf_desconto_s.php" target="_blanck"><i class="fa fa-print pull-right fa-2x"></i></a>
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
                                        data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th>Nº</th>
                                                <th>Nome</th>
                                                <th>Salário Base</th>
                                                <th>Desconto</th>
                                                <th>Novo Salário</th>
                                                <th>Data</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $ver = Desconto::findBySql(con(), "SELECT * FROM desconto ORDER BY data_d ASC");
                                                foreach ($ver as $i):
                                                    $func = Funcionario::findById(con(), $i->getFuncionarioId());
                                                    $slAntigo = $func->getSalarioBase()+$i->getDesconto();
                                                    if($func->getEstado()==0){
                                            ?>
                                                <tr>
                                                    <td><?php echo $func->getId() ?></td>
                                                    <td><?php echo $func->getNome() ?></td>
                                                    <td><?php echo $slAntigo ?></td>
                                                    <td><?php echo $i->getDesconto() ?></td>
                                                    <td><?php echo $func->getSalarioBase() ?></td>
                                                    <td><?php echo $i->getDataD() ?></td>
                                                </tr>
                                            <?php } endforeach; ?>
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
        <script src="alert_notificacao.js" ></script>
    </body>

</html>