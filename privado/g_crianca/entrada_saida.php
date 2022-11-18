 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_crianca.php'; ?>
<!doctype html>
<html>
    <head>
        <?php include_once 'sidebar.php'; ?>
        <?php include_once '../importante/table_header.php'; ?>
        <?php include_once '../importante/select_header.php'; ?>
        <?php include_once '../importante/notificacao_header.php'; ?>
        
        <script>
                function habitual(){
                    var h = document.querySelectorAll(".V");
                    for(var i=0;i<h.length;i++){
                        h[i].style.display="none";
                    }
                    document.getElementById("V").style.display="inline";
                }
                function opcional(){
                    var h = document.querySelectorAll(".V");
                    for(var i=0;i<h.length;i++){
                        h[i].style.display="inline";
                    }
                    document.getElementById("V").style.display="none";$("#erroSC").html("");
                }
        </script>
    </head>

    <body onload="habitual()">
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
                    <div class="row"><br><br><br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="fa fa-plus-circle"></i><span> Controlo de entrada e saida das crianças</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        <!-- Start form -->
        <form method="post" action="../servidor/c_entrada_saida.php" enctype="multipart/form-data" id="minhaForm">
            <!-- Static Table Start -->
            <div class="data-table-area mg-b-15" >
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline13-list">
                                <div class="sparkline13-graph" >
                                    <div class="datatable-dashv1-list custom-datatable-overright">

                                            <div class="container-fluid">
                                                <!-- DADOS DOS ENCARREGADOS -->
                                                    <div class="col-lg-12 col-md-8 col-sm-12 col-xs-12 i-checks pull-left" >
                                                        <label id="p1" style="font-weight: 900"></label>
                                                        <label style="text-decoration: underline;" id="enc1"></label>
                                                        <label id="p2" style="font-weight: 900"></label>
                                                        <label style="text-decoration: underline;" id="enc2"></label>
                                                    </div>
                                                <!-- END DADOS DOS ENCARREGADOS-->
                                                <div class="col-lg-4 col-md-8 col-sm-12 col-xs-12 ">
                                                    <label onclick="habitual()" class="lk">
                                                        <input type="radio" checked value="0" name="encarrregado" > ENCARREGADO HABITUAL 
                                                    </label>

                                                    <div class="chosen-select-single mg-b-20" id="V">
                                                        <div class="vento">
                                                            <select data-placeholder="Selecione o encarregado..."  name="s_encarregado" class="chosen-select" tabindex="-1">
                                                                <option></option>
                                                                <?php 
                                                                $ver = Encarregado::findBySql(con(), "SELECT * FROM encarregado ORDER BY nome");
                                                                foreach ($ver as $i):  
                                                                ?>
                                                                <option value="<?php echo $i->getNome() ?>"><?php echo $i->getNome() ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <label id="erroSC" style="color: red;"></label>
                                                </div>

                                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                                                    <label onclick="opcional()" class="lk">
                                                        <input type="radio" value="1" name="encarrregado" > ENCARREGADO OPCIONAL 
                                                    </label><br>

                                                    <div class="form-group col-lg-5 col-md-8 col-sm-12 col-xs-12 V">
                                                        <input type="text" class="form-control vento" autocomplete="off" id="ec_nome" name="ec_nome" placeholder="Nome">
                                                    </div>
                                                    
                                                    <div class="form-group col-lg-7 col-md-12 col-sm-12 col-xs-12 pull-right  V">
                                                        <input type="file" name="c_bi" id="c_bi" class="form-control vento" accept="application/pdf">
                                                    </div>
                                                    
                                                    <span style="position:absolute;bottom:20px;right:48px;font-size:20px;font-weight:600;color:red;" class="V">BI</span>
                                                </div>

                                            </div>


                                        <!-- End form -->

                                        <!-- Tabela -->
                                            <table id="table" data-toggle="table" data-key-events="true" data-resizable="true" data-cookie="true"
                                                data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                                <thead>
                                                    <tr>
                                                        <th data-field="state" data-radio="false"></th>
                                                            <th data-field="id">Nº</th>
                                                        <th data-field="name" data-editable="false">Nome</th>
                                                        <th data-field="usuario" data-editable="false">Sexo</th>
                                                        <th data-field="email" data-editable="false">Idade</th>
                                                        <th data-field="action">Actividade</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                     //Ver as crianças
                                                        $query = "SELECT * FROM crianca ORDER BY nome";
                                                        $ver1 = Crianca::findBySql(con(), $query);
                                                        //id_botao - conta o index dos botões
                                                        $id_botao = 0;$parente1="";$encarregado1="";$parente2="";$encarregado2="";
                                                        //id - conta o index do criança
                                                        $id = 0;
                                                        foreach ($ver1 as $i1):
                                                        //Controle de estado da criança
                                                        if($i1->getEstado() == 0){
                                                            $id++; 
                                                        
                                                        //Pega o nome do encarregado
                                                        $pega = 0;
                                                        $uniao = Uniao::findBySql(con(), "SELECT * FROM uniao");
                                                        foreach ($uniao as $u){
                                                            if($u->getEstado() == 0){
                                                                $encarregado = Encarregado::findById(con(), $u->getEncarregadoId());
                                                                if($u->getCriancaId() == $i1->getId()){
                                                                    $parente = Parente::findById(con(),$encarregado->getParenteId());
                                                                    if($pega == 0){
                                                                        $pega=1;
                                                                        $parente1 = $parente->getNome();
                                                                        $encarregado1 = $encarregado->getNome();
                                                                        $parente2="";
                                                                        $encarregado2 = "";
                                                                    }else{
                                                                        $parente2 = $parente->getNome();
                                                                        $encarregado2 = $encarregado->getNome();
                                                                    }
                                                                }
                                                            }
                                                        }
                                                        //End encarregado
                                                    ?>       
                                                    <tr>
                                                        <td><input type="radio" value="<?php echo $i1->getId() ?>" class="selecionado lk" name="id" onclick="encarregado('<?php echo $parente1?>','<?php echo $parente2?>','<?php echo $encarregado1?>','<?php echo $encarregado2 ?>')"></td>
                                                            <td><?php echo $id ?></td>
                                                            <td><?php echo $i1->getNome() ?></td>
                                                            <td><?php echo $i1->getSexo() ?></td>
                                                            <td><?php echo $i1->getIdade() ?><td>
                                                                <!-- Mantem em actividade a cor do botão -->
                                                                <?php
                                                                    $nomada = EntradaSaida::findBySql(con(), "SELECT * FROM entrada_saida");
                                                                    $data_hoje = date("Y-m-d");
                                                                    foreach ($nomada as $i3){
                                                                        $dataTM = $i3->getDataEntrada();
                                                                        $dataTM1 = $i3->getDataSaida();
                                                                        //substr -> Pega a data e deixa a hora
                                                                        $data_entrada_db = substr($dataTM,0,10);
                                                                        $data_saida_db = substr($dataTM1,0,10);
                                                                        if($data_entrada_db == $data_hoje && $i1->getId() == $i3->getCriancaId()){
                                                                            echo "<script>document.getElementsByClassName('botao_id')[$id_botao].style.background='#D80027'</script>"; 
                                                                            echo "<script>document.getElementsByClassName('botao_id')[$id_botao].innerHTML='Sair'</script>";
                                                                        }if($data_saida_db == $data_hoje && $i1->getId() == $i3->getCriancaId()){
                                                                            echo "<script>document.getElementsByClassName('botao_id')[$id_botao].style.background='#5cb85c'</script>"; 
                                                                            echo "<script>document.getElementsByClassName('botao_id')[$id_botao].innerHTML='Entrar'</script>";   
                                                                        }
                                                                    }
                                                                ?>
                                                                <!-- End Mantem em actividade a cor do botão -->
                                                                <button class="btn btn-primary waves-effect botao_id" type="submit"  id="enviar" onclick="SubmeterFormulario('minhaForm',<?php echo $id_botao ?>),encarregado('<?php echo $parente1?>','<?php echo $parente2?>','<?php echo $encarregado1?>','<?php echo $encarregado2 ?>')">Entrar</button>
                                                                <!-- Reservado para imagem Gif do retorno do Ajax-->
                                                                <img class="progresso">
                                                            </td>
                                                            
                                                        </tr>
                                                    <?php 
                                                    $id_botao++;
                                                    }endforeach; ?>
                                                </tbody>
                                            </table>
                                        <!-- Ent Table -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Static Table End -->
        </form>  
        <!-- End form -->
        <!-- Area da notificação -->
            <input type="hidden" id="basicWarningAnimation">
            <input type="hidden" id="basicWarningPosition">
            <input type="hidden" id="basicErrorAnimation">
        <!-- End notificação -->
        </div>
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
        <?php include_once '../importante/table_footer_entrada_saida_crianca.php';?>
        <?php include_once '../importante/select_footer.php'; ?>
         <?php include_once '../importante/footer_radio.php'; ?>
        <!-- notification JS
        ============================================ -->
        <script src="../../js/notifications/Lobibox.js"></script>
        <script src="../../js/notifications/notification-active_entrada_saida_crianca_encarregado.js"></script>
        <!-- Area do AJAX -->
        <script src="../servidor/ajax/c_entrada_saida.js"></script>
    </body>

</html>