 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_crianca.php'; ?>
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
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="page-header cor_sumario">
                                <i class="glyphicon glyphicon-refresh"></i> Consultar relatório
                            </h3>
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="glyphicon glyphicon-refresh"></i><span> Mostra o relatório de entrada e saída das crianças</span>
                                </li>
                                <a href="../servidor/pdf_relatorio.php" target="_blanck"><i class="fa fa-print pull-right fa-2x"></i></a>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class=" pull-right">
                        <div class="corTbEncAzul"></div>
                        <span>Encarregado de entrada e de saída diferentes. </span><br>
                        <div class="corTbEncVerde"></div>
                        <span>Não fazem parte do sistema.</span><br>
                        <div class="corTbEncVermelho"></div>
                        <span>Não saiu.</span>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <!-- Tabela -->
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true"  data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="id">Nº</th>
                                                <th data-field="name" data-editable="false">CRIANÇA</th>
                                                <th data-field="crianca" data-editable="false">ENCARREGADO</th>
                                                <th data-field="data1" data-editable="false">ENTRADA</th>
                                                <th data-field="img1" data-editable="false">BI</th>
                                                <th data-field="hora" data-editable="false">ENCARREGADO</th>
                                                <th data-field="data" data-editable="false">SAÍDA</th>
                                                <th data-field="img" data-editable="false">BI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $ver = EntradaSaida::findBySql(con(), "SELECT * FROM entrada_saida");
                                                $id = 1;$data = date("Y-m-d");
                                                foreach ($ver as $i):
                                                    $par1 = "";$par2 = "";
                                                $datEM = $i->getDataEntrada();$dataDB = substr($datEM,0,10);
                                                $crianca= Crianca::findById(con(), $i->getCriancaId());
                                                if($i->getEncarregadoEntrada() != $i->getEncarregadoSaida() && empty($i->getFBi1()) && !empty($i->getEncarregadoSaida())){$core1 ="info";}else{$core1="";}
                                                if($i->getEncarregadoEntrada() != $i->getEncarregadoSaida() && empty($i->getFBi2()) && !empty($i->getEncarregadoSaida())){$core2 ="info";}else{$core2="";}
                                                if(empty($i->getEncarregadoSaida()) && $data > $dataDB){$core3 ="danger";}else{$core3="";}
                                                if(!empty($i->getFBi1())){$cor ="success";$texto="sim";$par1="";}else{$cor="";$texto="";}
                                                if(!empty($i->getFBi2())){$cor2 ="success";$texto2="sim";}else{$cor2="";$texto2="";}
                                                
                                                $encarregado = Encarregado::findBySql(con(), "SELECT * FROM `encarregado`");
                                                foreach ($encarregado as $enc){
                                                    $parente = Parente::findById(con(), $enc->getParenteId());
                                                    if($enc->getNome() == $i->getEncarregadoEntrada()){$par1 = "(".$parente->getNome().")";}
                                                    if($enc->getNome() == $i->getEncarregadoSaida()){$par2 = "(".$parente->getNome().")";}
                                                }
                                                
                                                
                                            ?>
                                            <tr class="<?php echo $core3 ?>">
                                                <td class="<?php echo $cor;echo $core1 ?>"><?php echo $id++; ?></td>
                                                <td class="<?php echo $cor;echo $core1 ?>"> <?php echo $crianca->getNome() ?></td>
                                                <td class="<?php echo $cor;echo $core1 ?>"><?php echo $i->getEncarregadoEntrada();echo " $par1" ?></td>
                                                <td class="<?php echo $cor;echo $core1 ?>"><?php echo $i->getDataEntrada() ?></td>
                                                <td class="<?php echo $cor;echo $core1 ?>"><a href="<?php echo $i->getFBi1() ?>" target="_blanck"> <?php echo $texto ?> </a></td>
                                                <td class="<?php echo $cor2;echo $core2 ?>"><?php echo $i->getEncarregadoSaida()." $par2" ?></td>
                                                <td class="<?php echo $cor2;echo $core2 ?>"><?php echo $i->getDataSaida() ?></td>
                                                <td class="<?php echo $cor2;echo $core2 ?>"><a href="<?php echo $i->getFBi2() ?>" target="_blanck"> <?php echo $texto2 ?> </a></td>
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
        <!-- Mostrar imagem no modal -->
        <script>
            function Mostrar(m){
                var valor = document.getElementById("imagem").innerHTML=m;
                document.getElementById("foto_modal").src=valor;
            }
        </script>
    </body>

</html>