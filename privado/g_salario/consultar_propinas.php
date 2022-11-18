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
                                <li><i class="glyphicon glyphicon-refresh"></i><span> Consultar Propinas</span>
                                </li>
                                <a href="../servidor/pdf_propinas.php" target="_blanck"><i class="fa fa-print pull-right fa-2x"></i></a>
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
                                                <th data-field="id">Nº</th>
                                                <th data-field="parente" >ºParentesco</th>
                                                <th data-field="encarregado" >Encarregado</th>
                                                <th data-field="crianca" >Criança</th>
                                                <th data-field="cod" >Código do Talão</th>
                                                <th data-field="talao" >Talão</th>
                                                <th data-field="data">Data</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $ver = Pagamento::findBySql(con(), "SELECT * FROM pagamento ORDER BY encarregado_id");
                                                $id=0;$enc="";
                                                foreach ($ver as $i):
                                                    $encarregado = Encarregado::findById(con(),$i->getEncarregadoId());
                                                    $crianca = Crianca::findById(con(),$i->getCriancaId());
                                                    $parente = Parente::findById(con(), $encarregado->getParenteId());
                                                    //Verifica o id do Nº do encarregado (pra ser o mesmo se for semelhante).
                                                    if($encarregado->getId() == $enc){$id;}else{++$id;}
                                                    $enc = $i->getEncarregadoId();
                                            ?>
                                                <tr>
                                                    <td><?php echo $id ?></td>
                                                    <td><?php echo $parente->getNome() ?></td>
                                                    <td><?php echo $encarregado->getNome() ?></td>
                                                    <td><?php echo $crianca->getNome() ?></td>
                                                    <td><?php echo $i->getCodigo() ?></td>
                                                    <td><img src="<?php echo $i->getFTalao() ?>" style="height: 30px" onclick="Model('<?php echo $i->getFTalao()?>')"  data-toggle="modal" id="imagem" data-target="#img_arquivo"></td>
                                                    <td><?php echo $i->getDataEmissao() ?></td>
                                                </tr>
                                            <?php endforeach; ?>
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
        
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
        <?php include_once '../importante/table_footer.php';?>
        <script src="alert_notificacao.js" ></script>
        <script>
            //Função pra mostrar foto no modal
            function Model(m){
                //Valor da imagem
                var valor = document.getElementById("imagem").innerHTML=m;
                //Mostrar no modal
                document.getElementById("foto_modal").src=valor;
            }
           
        </script>
    </body>

</html>