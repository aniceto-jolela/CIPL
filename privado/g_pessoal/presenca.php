 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_pessoal.php'; ?>
<!doctype html>
<html>
    <head>
        <?php include_once 'sidebar.php'; ?>
        <?php include_once '../importante/table_header.php'; ?>
        <?php include_once '../importante/select_header.php'; ?>
        <?php include_once '../importante/notificacao_header.php'; ?>
    </head>

    <body onload="Atividade_1()">
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
                                <li><i class="fa fa-plus-circle"></i><span> Controlo dos funcionário</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
            
        <form method="post" action="../servidor/c_presenca.php" id="minhaForm">    
            <!-- Static Table Start -->
            <div class="data-table-area mg-b-15">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline13-list">
                                <div class="sparkline13-graph">
                                    <div class="datatable-dashv1-list custom-datatable-overright">

                                        <div class="container-fluid">
                                                    <div class="col-lg-4 col-md-8 col-sm-12 col-xs-12">

                                                        <div class="chosen-select-single mg-b-20 informacao" >
                                                        <select data-placeholder="Selecione o motivo da falta" name="s_falta" class="chosen-select" tabindex="-1">
                                                            <option ></option>
                                                            <?php
                                                                $ver1 = MotivoFalta::findBySql(con(), "SELECT * FROM motivo_falta");
                                                                foreach ($ver1 as $i1):
                                                            ?>
                                                            <option value="<?php echo $i1->getId() ?>"><?php echo $i1->getNome() ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                                                         <!-- DADOS DOS CARGOS DOS CUNCIONÁRIOS -->
                                                         <label style="margin-left: 280px;background: rgb(53, 154, 177); padding: 4px;border-radius:5px;color: white;box-shadow: 10px 1px 50px 10px rgba(0, 0, 0, 0.1);">
                                                             <i class="fa fa-suitcase fa-1x cor_icon informacao_alterada" ></i>
                                                             <label id="posto" style="font-weight: 800;"></label> 
                                                         </label>
                                                        <!-- END DADOS DOS CARGOS-->
                                                    </div>

                                                </div>
                                        <div style="margin-top: -40px !important">
                                            <!-- Tabela -->
                                            <table id="table" data-toggle="table" data-key-events="true"  data-resizable="true" data-cookie="true"
                                                data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                                                <thead>
                                                    <tr>
                                                        <th data-field="static"></th>
                                                        <th data-field="id">Nº</th>
                                                        <th data-field="name">NOME</th>
                                                         <th data-field="obs">OBSERVAÇÕES</th>
                                                         <th data-field="action">ATIVIDADES | 
                                                            1º <input type="radio" checked="true" name="ES" id="ES1" onclick="Atividade_1()">
                                                            2º <input type="radio" value="" name="ES" id="ES2" onclick="Atividade_2()">
                                                         </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $ver = Funcionario::findBySql(con(), "SELECT * FROM funcionario ORDER BY nome");
                                                        //id_botao - conta o index dos botões
                                                        $id_botao = 0; $id=0;
                                                        foreach ($ver as $i):
                                                            //Controlo do estado dos funcionários
                                                            if($i->getEstado() == 0){
                                                                //<!-- VERIFICA O CARGO DO FUNCIONÁRIO (Se foi eliminado) -->
                                                                    $cargo = Cargo::findBySql(con(),"SELECT * FROM cargo");$pega=0;
                                                                    foreach ($cargo as $c){
                                                                        if($c->getId() == $i->getCargoId()){$posto=$c->getNome();$pega=1;}
                                                                    }
                                                            //<!-- END CARGO -->
                                                        if($pega == 1){
                                                    ?>
                                                    <tr>
                                                        <td><input type="radio" value="<?php echo $i->getId() ?>" class="selecionado" name="id"></td>
                                                        <td><?php echo ++$id; ?></td>
                                                        <td><?php echo $i->getNome() ?></td>
                                                        <td>
                                                            <input type="text" class="form-control obs_" autocomplete="off" disabled>
                                                        </td>
                                                        <td> 
                                                            <!-- Mantem em actividade a cor do botão e ablitação da obcervação -->
                                                                <?php
                                                                    $nomada = Presenca::findBySql(con(), "SELECT * FROM presenca");
                                                                    $data_hoje = date("Y-m-d");
                                                                    foreach ($nomada as $i3){
                                                                        $func = Funcionario::findById(con(), $i3->getFuncionarioId());
                                                                        if($func->getEstado() == 0){
                                                                            $dataTM = $i3->getDataEntrada();
                                                                            $dataTM1 = $i3->getDataSaida();
                                                                            $dataFalta = $i3->getDataFalta();
                                                                            $obs = $i3->getObservacao();
                                                                            //substr -> Pega a data e deixa a hora
                                                                            $data_entrada_db = substr($dataTM,0,10);
                                                                            $data_saida_db = substr($dataTM1,0,10);
                                                                            if($data_entrada_db == $data_hoje && $i->getId() == $i3->getFuncionarioId()){
                                                                                echo "<script>document.getElementsByClassName('botao_id')[$id_botao].style.background='#D80027'</script>"; 
                                                                                echo "<script>document.getElementsByClassName('botao_id')[$id_botao].innerHTML='Sair'</script>";
                                                                            }if($data_saida_db == $data_hoje && $i->getId() == $i3->getFuncionarioId()){
                                                                                echo "<script>document.getElementsByClassName('botao_id')[$id_botao].style.background='#5cb85c'</script>"; 
                                                                                echo "<script>document.getElementsByClassName('botao_id')[$id_botao].innerHTML='Entrar'</script>";   
                                                                            }if($dataFalta == $data_hoje && $i->getId() == $i3->getFuncionarioId()){
                                                                                echo "<script>document.getElementsByClassName('botao_id2')[$id_botao].style.background='#f60507'</script>"; 
                                                                                echo "<script>document.getElementsByClassName('botao_id2')[$id_botao].innerHTML='Faltou'</script>";   
                                                                            }
                                                                            if($data_entrada_db == $data_hoje && $i->getId() == $i3->getFuncionarioId() && empty($dataTM1)){
                                                                                /* DADOS DA OBSERVAÇÃO */
                                                                                echo "<script>document.getElementsByClassName('obs_')[$id_botao].disabled=false</script>";
                                                                            }
                                                                            if($data_entrada_db == $data_hoje && $i->getId() == $i3->getFuncionarioId() && !empty($dataTM1)){
                                                                                /* DADOS DA OBSERVAÇÃO */
                                                                                echo "<script>document.getElementsByClassName('obs_')[$id_botao].value='$obs'</script>";
                                                                            }
                                                                        }
                                                                    }
                                                                ?>
                                                            <!-- End Mantem em actividade a cor do botão -->
                                                            <button class="btn btn-primary waves-effect botao_id" type="submit" id="enviar" onclick="SubmeterFormulario('minhaForm',<?php echo $id_botao ?>),posto('<?php echo $posto ?>')">Entrar </button> 
                                                            <button class="btn btn-primary waves-effect botao_id2" type="submit" id="enviar2" onclick="SubmeterFormulario('minhaForm',<?php echo $id_botao ?>),posto('<?php echo $posto ?>')">Falta </button> <img class="progresso">
                                                        </td>
                                                    </tr>
                                                    <?php 
                                                    $id_botao++;
                                                        }}endforeach; ?>
                                                </tbody>
                                            </table>
                                            <!-- Volor que será cadastrado na obcervação -->
                                            <input type="hidden" name="obs" id="obs" >
                                            <!-- End Tabela -->
                                        </div>
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
            <input type="hidden" id="basicErrorAnimation_presenca_funcionario_saida">
            <input type="hidden" id="basicErrorAnimation_presenca_funcionario_presente">
            <input type="hidden" id="basicErrorAnimation_presenca_motivo_falta">
            <input type="hidden" id="basicErrorAnimation_presenca_ausente">
            <input type="hidden" id="basicErrorAnimation_presenca_falta">
            <input type="hidden" id="basicErrorAnimation_presenca_excesso_falta">
        <!-- End notificação -->
        </div>
         <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
        <?php include_once '../importante/table_footer.php';?>
        <?php include_once '../importante/footer_radio.php'; ?>
        <?php include_once '../importante/select_footer.php'; ?>
        <!-- notification JS -->
        <?php include_once '../importante/notificacao_footer.php'; ?>
        <!-- Area do AJAX -->
        <script src="../servidor/ajax/c_presenca.js"></script>
        <script>
            /* Controle dos botões */
           function Atividade_1(){
               //Ablita os botões de falta
                var Ver = document.querySelectorAll(".botao_id2");
                for(var i = 0;i < Ver.length;i++){
                    Ver[i].disabled=true;
                }
                //Deseblita os botões de ES
                var Ver = document.querySelectorAll(".botao_id");
                for(var i = 0;i < Ver.length;i++){
                    Ver[i].disabled=false;
                }
           }
            function Atividade_2(){
                //Ablita os botões de ES
                var Ver = document.querySelectorAll(".botao_id");
                for(var i = 0;i < Ver.length;i++){
                    Ver[i].disabled=true;
                }
                //Deseblita os botões de falta
                var Ver = document.querySelectorAll(".botao_id2");
                for(var i = 0;i < Ver.length;i++){
                    Ver[i].disabled=false;
                }
           }
        </script>
    </body>

</html>