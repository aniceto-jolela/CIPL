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
                    <div class="row"><br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="page-header" style="color: white;">
                                <i class="fa fa-laptop"></i> Consultar
                            </h3>
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="glyphicon glyphicon-refresh"></i><span> Consultar faltas</span>
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
                                     <div id="toolbar">
                                         <label>Motivo da falta</label>
                                        <select class="form-control dt-tb">
                                            <option value="">Doença</option>
                                            <option value="all">Desaparecido</option>
                                            <option value="selected">Nenhum</option>
                                            <option value="selected">Outros</option>
                                        </select>
                                    </div>
                                    <!-- Tabela -->
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="id">ID</th>
                                                <th data-field="nome" data-editable="false">Nome</th>
                                                <th data-field="motivo" data-editable="false">Motivo</th>
                                                <th data-field="data" data-editable="false">Data</th>
                                                <th data-field="hora" data-editable="false">Hora</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Raimundo Rafael</td>
                                                <td>Doença</td>
                                                <td>Jul 08, 2018</td>
                                                <td>07:17</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Laura Rafael</td>
                                                <td>Nenhum</td>
                                                <td>Jul 09, 2019</td>
                                                <td>07:57</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Paricia Alex Miranda</td>
                                                <td>Doença</td>
                                                <td>Jul 12, 2018</td>
                                                <td>08:00</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Arieth Da Costa</td>
                                                <td>Nenhum</td>
                                                <td>Jul 02, 2017</td>
                                                <td>07:03</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Rafaela Domingos</td>
                                                <td>Outros</td>
                                                <td>Jul 18, 2018</td>
                                                <td>07:20</td>
                                            </tr>
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