 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_crianca.php'; ?>
<!doctype html>
<html>
    <head>
        <?php include_once 'sidebar.php'; ?>
        <?php include_once '../importante/notificacao_header.php'; ?>
        <style>.limpa{display: inline;font-size: 0px;}.arq{color: red;}</style>
    </head>
    
    <body onload="Novo(),Mes(),Total_1(),mostrarComBox()">
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
                                <li><i class="fa fa-plus-circle"></i><span> Cadastrar criança</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Password meter Start -->
            <form method="post" action="../servidor/c_crianca.php" enctype="multipart/form-data" id="minhaForm">
                <div class="password-meter-area mg-b-15">
                    <div class="container-fluid">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="sparkline9-list mg-t-30">
                                <div class="sparkline9-graph">
                                    <div id="pwd-container4">
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                                <label for="nome" class="control-label">Nome</label>
                                                <input type="text" class="form-control vento" id="nome" name="nome" autocomplete="off" placeholder="Nome da criança" required>
                                                <span class="limpa">x</span>
                                            </div>
                                            <div class="form-group col-lg-2 col-md-2 col-sm-2">
                                                <label for="sexo">Sexo</label>
                                                <div class="form-select-list vento">
                                                    <select class="form-control custom-select-value" id="sexo" name="sexo">
                                                        <option value="M">Masculino</option>
                                                        <option value="F">Feminino</option>
                                                    </select>
                                                    </div><span class="limpa">x</span>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-2 col-md-2 col-sm-2">
                                                <label for="idade" class="control-label">Idade</label>
                                                <input type="number" min="1" class="form-control vento" id="idade" name="idade" autocomplete="off"  required>
                                            </div>

                                            <div class="form-group col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <div class="bt-df-checkbox pull-left">
                                                    <div class="pull-left">
                                                        <label onclick="Mes()" class="lk">
                                                            <input type="radio" checked name="idade_v" value="0" class="lk vento">  Meses 
                                                        </label>
                                                    </div><br>
                                                    <div class="pull-left">
                                                        <label onclick="Ano()" class="lk">
                                                            <input type="radio"  name="idade_v" value="1" class="lk vento">  Anos  
                                                        </label>
                                                    </div>
                                                </div> 
                                            </div>

                                            <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                                <label for="fotop">Foto</label>
                                                <input type="file" class="form-control vento" id="perfil_" accept=".jpg,.jpeg,.png" name="perfil" required>
                                                <span class="limpa">x</span><em><span class="arq" id="arqPerfil"></span></em>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                                <label for="f_at_medico">Atestado médico</label>
                                                <input type="file" class="form-control vento" id="f_at_medico" accept="application/pdf" name="f_at_medico" required>
                                                <span class="limpa">x</span><em><span class="arq" id="arqMedico"></span></em>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                                <label for="f_cop_cedula">Cópia da cedula</label>
                                                <input type="file" class="form-control vento" id="f_cop_cedula" name="f_cop_cedula" accept="application/pdf" required>
                                                <span class="limpa">x</span><em><span class="arq" id="arqCedula"></span></em>
                                            </div>

                                            <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                                <label for="f_cop_c_vacina">Cópia do cartão de vacina</label>
                                                <input type="file" class="form-control vento" id="f_cop_c_vacina" name="f_cop_c_vacina" accept="application/pdf" required>
                                                <span class="limpa">x</span><em><span class="arq" id="arqVacina"></span></em>
                                            </div>

                                            <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                                <label for="f_ficha_matricula">Ficha de matricula preenchida</label>
                                                <input type="file" class="form-control vento" id="f_ficha_matricula" name="f_ficha_matricula" accept="application/pdf" required>
                                                <span class="limpa">x</span><em><span class="arq" id="arqMatricula"></span></em>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                                <label for="f_comp_pagamento">Comprovativo de pagamento</label>
                                                <input type="file" class="form-control vento" id="f_comp_pagamento" name="f_comp_pagamento" accept="application/pdf" required>
                                                <span class="limpa">x</span><em><span class="arq" id="arqPagamento"></span></em>
                                            </div>

                                            <!-- ========================= Dados do encarregado =============================== -->
                                            <!-- =========================* Area do encarregado *========================= -->
                                                <div class="form-group col-lg-7 col-md-7 col-sm-7">
                                                    <label for="" style="color: #0e90d2;text-decoration: underline;">DADOS DO ENCARREGADO</label>
                                                </div>
                                                <div class="form-group col-lg-3 col-md-5 col-sm-4" style="background: #C7C7C7;">
                                                    <label>Total de encarregado : </label>
                                                    <div class="pull-right">
                                                        <label style="margin-left: 15px;" onclick="Total_2()" class="lk">
                                                            <input type="radio" value="1" id="ck2" name="total_encarregado" class="lk vento">  2 
                                                        </label>
                                                    </div>
                                                    <div class="pull-right">
                                                        <label onclick="Total_1()" class="lk">
                                                            <input type="radio" value="0" id="ck1" checked="true" name="total_encarregado" class="lk vento">  1 
                                                        </label>
                                                    </div>
                                                   
                                                </div>
                                            <!-- ========================= End area do encarregado ========================= -->
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 V">
                                                <label for="f_c_bi_1">Cópia do BI do encarregado 1</label>
                                                <input type="file" class="form-control vento" id="f_c_bi_1" name="f_c_bi_1" accept="application/pdf">
                                                <span class="limpa">x</span><em><span class="arq" id="arqBI1"></span></em>
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 V">
                                                <label for="f_c_bi_2">Cópia do BI do encarregado 2</label>
                                                <input type="file" class="form-control vento" id="f_c_bi_2" name="f_c_bi_2" accept="application/pdf">
                                                <span class="limpa">x</span><em><span class="arq" id="arqBI2"></span></em>
                                            </div>

                                            <div class="form-group col-lg-4 col-md-4 col-sm-4 V">
                                                <label for="encarregado_1" class="control-label">Nome do encarregado 1</label>
                                                <input type="text" class="form-control vento" name="encarregado_1" id="encarregado_1" autocomplete="off" placeholder="Nome do encarregado" >
                                            </div>
                                            <!-- Mostra os dados do parente 1 -->
                                            <div class="col-lg-2 col-md-2 col-sm-2  V">
                                                <div class="form-select-list">
                                                    <label for="parente_1">Parente</label>
                                                    <select class="form-control custom-select-value vento" id="parente_1" name="parente_1">
                                                        <?php 
                                                            $ver= Parente::findBySql(con(), "SELECT * FROM parente");
                                                            foreach ($ver as $i):  
                                                        ?>
                                                            <option value="<?php echo $i->getId() ?>"><?php echo $i->getNome() ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4 col-md-4 col-sm-4 V">
                                                <label for="encarregado_2" class="control-label">Nome do encarregado 2</label>
                                                <input type="text" class="form-control vento" id="encarregado_2" name="encarregado_2" autocomplete="off" placeholder="Nome do encarregado" >
                                            </div>
                                            <!-- Mostra os dados do parente 2 -->
                                            <div class="col-lg-2 col-md-2 col-sm-2  V">
                                                <div class="form-select-list">
                                                    <label for="parente_2">Parente</label>
                                                    <select class="form-control custom-select-value vento" id="parente_2" name="parente_2">
                                                        <?php 
                                                            $ver= Parente::findBySql(con(), "SELECT * FROM parente");
                                                            foreach ($ver as $i):  
                                                        ?>
                                                            <option value="<?php echo $i->getId() ?>"><?php echo $i->getNome() ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group col-lg-3 col-md-3 col-sm-3 V">
                                                <label for="t1" class="control-label">Contactos</label>
                                                <input type="tel" class="form-control vento" name="t1" id="t1" autocomplete="off" data-mask="(+244) 999-999-999" placeholder="(+244) 9**-***-***" >
                                            </div>
                                            <div class="form-group col-lg-3 col-md-3 col-sm-3 V">
                                                <label for="t2" class="control-label">_</label>
                                                <input type="tel" class="form-control vento" name="t2" id="t2" autocomplete="off" data-mask="(+244) 999-999-999" placeholder="(+244) 9**-***-***" >
                                            </div>

                                            <!--====================== Selecionar encarregado de educação já cadastrado =====================-->
                                            <div class="form-group col-lg-6 col-md-6 col-sm-6" id="V">
                                                <!-- Vai aparecer a comboBox do encarregado -->
                                                <div id="vEncarregado"></div>
                                            </div>

                                            <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12" id="encarregado">
                                                <label class="control-label" id="encarregado_titulo">CONTROLE DE ENCARREGADO</label>

                                                <div class="bt-df-checkbox pull-left">
                                                    <div class="pull-left">
                                                        <label onclick="Novo()" class="lk">
                                                            <input type="radio" value="0" checked name="controle_e" class="lk vento">  Novo 
                                                        </label>
                                                    </div><br>
                                                    <div class="pull-left">
                                                        <label onclick="Existente()" class="lk">
                                                            <input type="radio" value="1" name="controle_e" class="lk vento">  Existente 
                                                        </label>
                                                    </div>
                                                </div>                                
                                            </div>

                                            <div class=" login-horizental">
                                                <button class="btn btn-primary waves-effect waves-light mg-b-15 guardar_c vento" type="submit" id="enviar" onclick="SubmeterFormulario('minhaForm')">Guardar</button>
                                                <!--<img src="../../img/progresso/loading1.gif" id="progresso" class="pull-right" style="width: 40px;">-->
                                                <img id="progresso" class="pull-right" style="width: 40px;">
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Password meter End-->
            <!-- Alert do cadastro-->
                <input type="hidden" id="basicSuccessAnimation_crianca" >
                <input type="hidden" id="basicErrorAnimation_crianca" >
            <!-- End Alert do cadastro-->
        </div>
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
        <?php include_once '../importante/footer_radio.php'; ?>
        <!-- notification JS -->
        <?php include_once '../importante/notificacao_footer.php'; ?>
        <!-- Area do AJAX -->
        <?php include_once '../servidor/ajax/c_crianca.php'; ?>
    </body>

</html>

