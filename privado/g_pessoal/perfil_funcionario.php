 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_pessoal.php'; ?>
<!doctype html>
<html>
    <head>
        <?php
            $cargo="<em style='color:red'>Não definido</em>";
            //Quando não tiver variavel na URL
            $cont2 = 0;$cargoNId=0;$pega=0;$pega2=0;
            if(isset($_GET['id'])){
                $ID = $_GET['id'];
                $ver = Funcionario::findBySql(con(), "SELECT * FROM funcionario WHERE id = '".$ID."'");
                $C = Cargo::findBySql(con(), "SELECT * FROM `cargo` ORDER BY id");
                foreach ($ver as $i){
                    $cargo_id = Cargo::findById(con(), $i->getCargoId());
                    $banco_id = Banco::findById(con(), $i->getBancoId());
                    if($ID == $i->getId()){
                        //Faz o controlo do cargo da comboBox do perfil do funcionário
                        foreach ($C as $c1){$cont2++;
                            if($c1->getId() == $i->getCargoId()){
                            if($c1->getId() == $cargo_id->getId() && $pega==0){
                                $cargoNId=$cont2;$pega=1;}$pega2=1;
                            }
                        }
                        $nome = $i->getNome();
                        $sexo = $i->getSexo();
                        if($pega2 == 1){$cargo = $cargo_id->getNome();}
                        $banco = $banco_id->getNome();
                        $telefone = $i->getTelefone();
                        $validade = $i->getDataValidade();
                        $n_bi = $i->getNBi();
                        $iban_escrito = $i->getIbanEscrito();
                        $data = $i->getDataCadastro();
                        //Fotos
                        $perfil = $i->getFoto();
                        $c_bi = $i->getFCopiaBi();
                        $declaracao = $i->getFDeclaracao();
                        $sanidade = $i->getFBoletimSanidade();
                        $atestado = $i->getFAtestadoMedico();
                        $iban = $i->getFIban();
                        break;
                    }else{header("location:consultar_funcionarios.php");}
                }
                //Verifica se não tem funcionário selecionado
                if(empty($ver)){header("location:consultar_funcionarios.php");}
            }else{
                header("location:consultar_funcionarios.php");
            }
        ?>
        <?php include_once 'sidebar.php'; ?>
        <!-- forms CSS ============================================ -->
        <link rel="stylesheet" href="../../css/form/all-type-forms.css">
        <style>.arq{color: red;}</style>
    </head>

    <body onload="comboBox('<?php echo $i->getSexo() ?>','<?php echo $banco_id->getId() ?>','<?php echo $cargoNId ?>')">
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
                                <li><i class="fa fa-laptop"></i><span> Cosultar perfil</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Single pro tab review Start-->
            <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <img src="<?php echo $perfil ?>" alt="" id="f_perfil" />
                            </div>
                            <div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Name</b><br> <span id="alt_nome"> <?php echo $nome ?> </span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Cargo</b><br><span id="alt_cargo">   <?php echo $cargo ?> </span></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Sexo</b><br><span id="alt_sexo"> <?php echo $sexo ?></span> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Banco</b><br><span id="alt_banco">  <?php echo $banco ?></span> </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Telefone</b><br><span id="alt_tel"> <?php echo $telefone ?></span> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Nº BI </b><br><span id="alt_bi">  <?php echo $n_bi ?></span> </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Data de validade </b><br> <span id="alt_validade"> <?php echo $validade ?></span> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>IBAN</b><br><span id="alt_ib">  <?php echo $iban_escrito ?></span> </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <span class="message-date"><b> Data de cadastro </b> <?php echo $data ?> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Cara -->
                    
                    <!--=================================== Start arquivo ===================================-->
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn" id="perfil">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Arquivos</a></li>
                                <li><a href="#INFORMATION">Editar dados</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <!--============================= Arquivos =============================-->
                                
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">
                                                    
                                                    <div class="chat-message">
                                                        <div class="message col-lg-5">
                                                            <a class="message-author titulo"> Cópia do BI </a><br>
                                                            <a href="<?php echo $c_bi ?>" target="_blanck" id="f_cb">
                                                                <div class="corpo informacao"><div class="frase"><b>VER O ARQUIVO</b></div></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="chat-message">
                                                        <div class="message col-lg-5">
                                                            <a class="message-author titulo"> Declaração </a><br>
                                                            <a href="<?php echo $declaracao ?>" target="_blanck" id="f_dc">
                                                                <div class="corpo informacao"><div class="frase"><b>VER O ARQUIVO</b></div></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="chat-message">
                                                        <div class="message col-lg-5">
                                                            <a class="message-author titulo"> Boletim de sanidade </a><br>
                                                            <a href="<?php echo $sanidade ?>" target="_blanck" id="f_sanidade">
                                                                <div class="corpo informacao"><div class="frase"><b>VER O ARQUIVO</b></div></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="chat-message">
                                                        <div class="message col-lg-5">
                                                            <a class="message-author titulo"> IBAN </a><br>
                                                            <a href="<?php echo $iban ?>" target="_blanck" id="f_iban">
                                                                <div class="corpo informacao"><div class="frase"><b>VER O ARQUIVO</b></div></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="chat-message">
                                                        <div class="message col-lg-5">
                                                            <a class="message-author titulo"> Atestado médico </a><br>
                                                            <a href="<?php echo $atestado ?>" target="_blanck" id="f_at">
                                                                <div class="corpo informacao"><div class="frase"><b>VER O ARQUIVO</b></div></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!--============================= End Arquivos -->
                                
                                <!--============================= Editar Dados =============================-->
                                
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <!-- Start Form -->
                                                <form method="post" action="../servidor/e_funcionario.php" enctype="multipart/form-data" id="formID">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="nome">Nome</label>
                                                                    <input type="text" name="nome" value="<?php echo $nome ?>" id="nome" class="form-control vento" autocomplete="off" placeholder="Name Completo" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="perfil">Foto</label>
                                                                    <div class="file-upload-inner ts-forms vento">
                                                                       <div class="input prepend-small-btn">
                                                                           <div class="file-button">
                                                                               Procurar
                                                                               <input type="file" name="perfil" id="perfil_f" onchange="document.getElementById('prepend-small-btn').value = this.value;" accept="image/jpeg">
                                                                           </div>
                                                                           <input type="text" value="<?php echo $perfil ?>" id="prepend-small-btn" disabled>
                                                                           <input type="hidden" name="perfil2" value="<?php echo $perfil ?>" id="perfil2">
                                                                       </div>
                                                                    </div>
                                                                    <em><span class="arq" id="arqPerfil"></span></em>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="iban">IBAN</label>
                                                                    <div class="file-upload-inner ts-forms vento">
                                                                       <div class="input prepend-small-btn">
                                                                           <div class="file-button">
                                                                               Procurar
                                                                               <input type="file" name="iban" id="iban" onchange="document.getElementById('prepend-small-btn1').value = this.value;" accept="application/pdf">
                                                                           </div>
                                                                           <input type="text" value="<?php echo $iban ?>" id="prepend-small-btn1" disabled>
                                                                           <input type="hidden" name="iban2" value="<?php echo $iban ?>" id="iban2">
                                                                       </div>
                                                                    </div>
                                                                    <em><span class="arq" id="arqIban"></span></em>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="bc">Banco</label>
                                                                    <select class="form-control bc vento" id="bc" name="banco">
                                                                        <?php 
                                                                            $view1 = Banco::findBySql(con(), "SELECT * FROM banco");
                                                                            foreach ($view1 as $b):
                                                                        ?>
                                                                        <option value="<?php echo $b->getId() ?>" class="bcv"><?php echo $b->getNome() ?></option>
                                                                        <!-- Pega o valor do banco para mostrar no javascript -->
                                                                        <option hidden value="<?php echo $b->getNome() ?>" class="bac"></option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="iban_e">IBAN escrito</label>
                                                                    <input type="text" name="iban_escrito" value="<?php echo $iban_escrito ?>" id="iban_e" maxlength="21" class="form-control vento" autocomplete="off" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="at">Atestado médico</label>
                                                                    <div class="file-upload-inner ts-forms vento">
                                                                        <div class="input prepend-small-btn">
                                                                            <div class="file-button">
                                                                                Procurar
                                                                                <input type="file" name="at" id="at" onchange="document.getElementById('prepend-small-btn2').value = this.value;" accept="application/pdf">
                                                                            </div>
                                                                            <input type="text" value="<?php echo $atestado ?>" id="prepend-small-btn2" disabled>
                                                                            <input type="hidden" name="at2" value="<?php echo $atestado ?>" id="at2">
                                                                        </div>
                                                                    </div>
                                                                    <em><span class="arq" id="arqAtestado"></span></em>
                                                                </div>
                                                                 <div class="form-group">
                                                                    <label for="tel">Telefone</label>
                                                                    <input name="tel" type="tel" value="<?php echo $telefone ?>" id="tel" data-mask="(+244) 999-999-999" class="form-control vento" placeholder="(+244) 9**-***-***" autocomplete="off">
                                                                </div>
                                                                <div class="payment-adress mg-t-30">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15 vento" id="enviar" style="margin-top: 10px;" onclick="submeterForm('formID')" >Editar <img id="progresso"></button>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-lg-6">
                                                                <div class="form-group">
                                                                    <label for="sx">Sexo</label>
                                                                    <select class="form-control vento" id="sx" name="sexo">
                                                                        <option value="M">Masculino</option>
                                                                        <option value="F">Feminino</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="dc">Declaração</label>
                                                                    <div class="file-upload-inner ts-forms vento">
                                                                        <div class="input prepend-small-btn">
                                                                            <div class="file-button">
                                                                                Procurar
                                                                                <input type="file" name="dc" id="dc" onchange="document.getElementById('prepend-small-btn3').value = this.value;" accept="application/pdf" >
                                                                            </div>
                                                                            <input type="text" value="<?php echo $declaracao ?>" id="prepend-small-btn3" disabled>
                                                                            <input type="hidden" name="dc2" value="<?php echo $declaracao ?>" id="dc2">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="c_bi">Cópia do BI</label>
                                                                    <div class="file-upload-inner ts-forms vento">
                                                                        <div class="input prepend-small-btn">
                                                                            <div class="file-button">
                                                                                Procurar
                                                                                <input type="file" name="c_bi" id="c_bi" onchange="document.getElementById('prepend-small-btn4').value = this.value;" accept="application/pdf">
                                                                            </div>
                                                                            <input type="text" value="<?php echo $c_bi ?>" id="prepend-small-btn4" disabled >
                                                                            <input type="hidden" name="c_bi2" value="<?php echo $c_bi ?>" id="c_bi2">
                                                                        </div>
                                                                    </div>
                                                                    <em><span class="arq" id="arqBI"></span></em>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="n_bi">Nº do BI</label>
                                                                    <input type="text" name="n_bi" value="<?php echo $n_bi ?>" id="n_bi" maxlength="13" class="form-control vento" autocomplete="off" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="validade">Data de validade</label>
                                                                    <input name="validade" type="date" value="<?php echo $validade ?>" id="validade" class="form-control vento" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="sanidade">Boletim de sanidade</label>
                                                                    <div class="file-upload-inner ts-forms vento">
                                                                        <div class="input prepend-small-btn">
                                                                            <div class="file-button">
                                                                                Procurar
                                                                                <input type="file" name="sanidade" id="sanidade" onchange="document.getElementById('prepend-small-btn5').value = this.value;" accept="application/pdf" >
                                                                            </div>
                                                                            <input type="text" value="<?php echo $sanidade ?>" id="prepend-small-btn5" disabled>
                                                                            <input type="hidden" name="sanidade2" value="<?php echo $sanidade ?>" id="sanidade2">
                                                                        </div>
                                                                    </div>
                                                                    <em><span class="arq" id="arqBoletim"></span></em>
                                                                </div>
                                                                <label for="cg">Cargo</label>
                                                                <select class="form-control vento" id="cg" name="cargo">
                                                                    <?php 
                                                                        $view = Cargo::findBySql(con(), "SELECT * FROM cargo");
                                                                        foreach ($view as $c):
                                                                    ?>
                                                                    <option value="<?php echo $c->getId() ?>" class="cg"> <?php echo $c->getNome() ?> </option>
                                                                    <!-- Pega o valor do banco para mostrar no javascript -->
                                                                    <option hidden value="<?php echo $c->getId() ?>" class="cat"><?php echo $c->getNome() ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                                <!-- PEGA A DATA DE CADASTRO & O ID DO FUNCIONARIO PRA ENVIAR NO PHP -->
                                                                <input type="hidden" name="data_cadastro" value="<?php echo $data ?>" >
                                                                <input type="hidden" name="cod" value="<?php echo $ID ?>" >
                                                            </div>
                                                        </div>
                                                    </form>
                                                <!-- End Form -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        </div>
        
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
       <!-- Area do AJAX -->
       <?php include_once '../servidor/ajax/e_perfil_funcionario.php'; ?>
    </body>

</html>