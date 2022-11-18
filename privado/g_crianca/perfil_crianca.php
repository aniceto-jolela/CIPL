 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_crianca.php'; ?>
<!doctype html>
<html>
    <head>
        <!-- Mostrar dados da criança -->
            <?php
                //Pega o total da união
                    $tot = Uniao::findBySql(con(),"SELECT * FROM uniao");
                    $total=0;$idade="";$parent_id2="";$parent_id1="";$encarregado1_id="";$organiza_id="";
                    $educador = "";$sala="";$turma="";$educador_id="";$turma_id="";$encarregado2_id="";
                    foreach ($tot as $i1){$total++;}
                //End total
                    $cont=0;$pega = 0;
                //Verifica se Não tem nenhum parametro ou variavel na URL
                if(isset($_GET['id'])){
                    //Verifica se não tem valor no metodo GET
                    $ID = $_GET['id'];
                    if(!empty($ID)){
                        //Organizar as crianças
                            $v2 = OrganizarCrianca::findBySql(con(), "SELECT * FROM organizar_crianca");
                            foreach ($v2 as $o){
                                $func = Funcionario::findById(con(), $o->getFuncionarioId());
                                $sl = Sala::findById(con(), $o->getSalaId());
                                $tm = Turma::findById(con(), $o->getTurmaId());
                                if($ID == $o->getCriancaId()){
                                    $educador = $func->getNome();$educador_id=$func->getId();
                                    $sala = $sl->getId();$organiza_id=$o->getId();
                                    $turma = $tm->getNome();$turma_id=$tm->getId();
                                }
                            }
                        //End Organizar as crianças
                        $ver = Uniao::findBySql(con(), "SELECT * FROM uniao");
                        //Verifica se a união está void
                        if(empty(Uniao::findBySql(con(), "SELECT * FROM uniao"))){header("Location:consultar_crianca.php");}
                        foreach ($ver as $i):
                            //Verifica se a união do encarregado e da criança está activa
                            if($i->getEstado() == 0){
                                $cont++;
                                $crianca = Crianca::findById(con(), $i->getCriancaId());
                                $encarregado = Encarregado::findById(con(), $i->getEncarregadoId());
                                if($ID == $i->getCriancaId()){
                                    $parente = Parente::findById(con(),$encarregado->getParenteId());
                                    //Dados da criança
                                    $nome = $crianca->getNome();
                                    $foto = $crianca->getFoto();
                                    $sexo = $crianca->getSexo();
                                    $idade = $crianca->getIdade();
                                    $data = $crianca->getDataCadastro();
                                    //Fotos
                                    $atestado = $crianca->getFAtestadoMedico();
                                    $c_cedula = $crianca->getFCCedula();
                                    $cartao_vacina = $crianca->getFCCartaoVacina();
                                    $comprovativo_pagamento = $crianca->getFComprovaPagamento();
                                    $ficha_matricula = $crianca->getFFichaMatricula();

                                    //Dados do encarregado
                                    if($pega == 0){
                                        $pega=1;
                                        $parente1 = $parente->getNome();$parent_id1=$parente->getId();
                                        $encarregado1 = $encarregado->getNome();$encarregado1_id=$encarregado->getId();
                                        $telefone1 = $encarregado->getTelefone();
                                        $telefone2="";$telefone2_="";
                                        $c_bi2="";
                                        $parente2="";
                                        $encarregado2 = "";
                                        //Foto
                                        $c_bi1 = $encarregado->getFBi();
                                    }else{
                                        $parente2 = $parente->getNome();$parent_id2=$parente->getId();
                                        $encarregado2 = $encarregado->getNome();$encarregado2_id=$encarregado->getId();
                                        $telefone2 = $encarregado->getTelefone();
                                        $telefone2_ = " / ".$encarregado->getTelefone();
                                        //Foto
                                        $c_bi2 = $encarregado->getFBi();
                                    }
                                }
                            }
                        endforeach;
                        if(empty($nome)){header('location:consultar_crianca.php');}
                    }else {
                        header('location:consultar_crianca.php');
                    }
                }else{header("location:consultar_crianca.php");} 
                
                
            ?>
        <!-- End mostrar -->
        <?php include_once 'sidebar.php'; ?>
        <!-- forms CSS ============================================ -->
        <link rel="stylesheet" href="../../css/form/all-type-forms.css">
        <style>.arq{color: red;}</style>
    </head>

    <body onload="comboBox('<?php echo $sexo ?>','<?php echo $parent_id1 ?>','<?php echo $parent_id2 ?>','<?php echo $idade ?>','<?php echo $educador_id ?>','<?php echo $turma_id ?>','<?php echo $sala ?>')">
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
                                <img src="<?php echo $foto ?>" alt="" id="f_perfil" />
                            </div>
                            <div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Name</b><br> <span id="alt_nome"> <?php echo $nome ?> </span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Idade</b><br> <span id="alt_idade"> <?php echo $idade ?> </span></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Sexo</b><br><span id="alt_sexo"> <?php echo $sexo ?> </span></p>
                                        </div>
                                    </div>
                                     
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b><span id="alt_prt1"><?php echo $parente1 ?></span></b><br> <span id="alt_enc1"> <?php echo $encarregado1 ?> </span></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Turma</b><br> <span id="alt_turma"> <?php echo $turma ?> </span></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b><span id="alt_prt2"><?php echo $parente2 ?></span></b><br> <span id="alt_enc2"> <?php echo $encarregado2 ?> </span></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Sala</b><br> <span id="alt_sala"> <?php echo $sala ?> </span></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Contactos</b><br> <span id="alt_t1"> <?php echo $telefone1 ?></span>  <span id="alt_t2"><?php echo $telefone2_ ?> </span></p>
                                        </div>
                                    </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p><b>Educador</b><br> <span id="alt_educador"> <?php echo $educador ?> </span></p>
                                    </div>
                                </div>
                                    
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p class="message-date"><span><b>  Data de cadastro </b></span> <?php echo $data ?> </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Cara -->
                    
                    <!-- Start arquivo -->
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn" id="perfil">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Arquivos</a></li>
                                <li><a href="#EDITAR_CRIANCA">Editar Criança</a></li>
                                <li><a href="#EDITAR_ENCARREGADO">Editar Encarregado</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit" >
                                <!--============================= Arquivos =============================-->
                                
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="chat-discussion" style="height: auto">
                                                    <div class="chat-message">
                                                        <div class="message col-lg-5">
                                                            <a class="message-author titulo"> Atestado médico </a><br>
                                                            <a href="<?php echo $atestado ?>" target="_blanck" id="f_at">
                                                                <div class="corpo informacao"><div class="frase"><b>VER O ARQUIVO</b></div></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="chat-message">
                                                        <div class="message col-lg-5">
                                                            <a class="message-author titulo"> Cópia da cedula </a><br>
                                                            <a href="<?php echo $c_cedula ?>" target="_blanck" id="f_c_ced">
                                                                <div class="corpo informacao"><div class="frase"><b>VER O ARQUIVO</b></div></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="chat-message">
                                                        <div class="message col-lg-5">
                                                            <a class="message-author titulo"> Cópia de cartão de vacina </a><br>
                                                            <a href="<?php echo $cartao_vacina ?>" target="_blanck" id="f_cv">
                                                                <div class="corpo informacao"><div class="frase"><b>VER O ARQUIVO</b></div></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="chat-message">
                                                        <div class="message col-lg-5">
                                                            <a class="message-author titulo"> Cópia do BI do encarregado 1 </a><br>
                                                            <a href="<?php echo $c_bi1 ?>" target="_blanck" id="f_cb">
                                                                <div class="corpo informacao"><div class="frase"><b>VER O ARQUIVO</b></div></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php if(!empty($c_bi2)): ?>
                                                        <div class="chat-message">
                                                            <div class="message col-lg-5">
                                                                <a class="message-author titulo"> Cópia do BI do encarregado 2 </a><br>
                                                                <a href="<?php echo $c_bi2 ?>" target="_blanck" id="f_cb2">
                                                                    <div class="corpo informacao"><div class="frase"><b>VER O ARQUIVO</b></div></div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="chat-message">
                                                        <div class="message col-lg-5">
                                                            <a class="message-author titulo"> Ficha da matricula preenchida </a><br>
                                                            <a href="<?php echo $ficha_matricula ?>" target="_blanck" id="f_ficha">
                                                                <div class="corpo informacao"><div class="frase"><b>VER O ARQUIVO</b></div></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="chat-message">
                                                        <div class="message col-lg-5">
                                                            <a class="message-author titulo"> Comprovativo de pagamento </a><br>
                                                            <a href="<?php echo $comprovativo_pagamento ?>" target="_blanck" id="f_cp">
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
                                
                                <!--=================================== Editar criança ===================================-->
                                
                                <div class="product-tab-list tab-pane fade" id="EDITAR_CRIANCA" >
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form method="post" action="../servidor/e_crianca.php" enctype="multipart/form-data" id="formID">
                                                <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="nome">Nome</label>
                                                            <input type="text" name="nome" value="<?php echo $nome ?>" id="nome" class="form-control vento" autocomplete="off" placeholder="Name Completo" required>
                                                            <input type="hidden" name="ID_organiza" value="<?php echo $organiza_id?>" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="perfil_f">Foto</label>
                                                            <div class="file-upload-inner ts-forms vento">
                                                               <div class="input prepend-small-btn">
                                                                   <div class="file-button">
                                                                       Procurar
                                                                       <input type="file" name="perfil" id="perfil_f" onchange="document.getElementById('prepend-small-btn').value = this.value;" accept=".jpg,.jpeg,.png">
                                                                   </div>
                                                                   <input type="text" value="<?php echo $foto ?>" id="prepend-small-btn" disabled>
                                                                   <input type="hidden" name="perfil2" value="<?php echo $foto ?>" id="perfil2">
                                                               </div>
                                                            </div>
                                                            <em><span class="arq" id="arqPerfil"></span></em>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="c_cedula">Cópia da cedula</label>
                                                            <div class="file-upload-inner ts-forms vento">
                                                               <div class="file-upload-inner ts-forms vento">
                                                                    <div class="input prepend-small-btn">
                                                                        <div class="file-button">
                                                                            Procurar
                                                                            <input type="file" name="c_cedula" id="c_cedula" onchange="document.getElementById('prepend-small-btn1').value = this.value;" accept="application/pdf" >
                                                                        </div>
                                                                        <input type="text" value="<?php echo $c_cedula ?>" id="prepend-small-btn1" disabled>
                                                                        <input type="hidden" name="c_cedula2" value="<?php echo $c_cedula ?>" id="c_cedula2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <em><span class="arq" id="arqCedula"></span></em>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ficha">Ficha de matricula preenchida</label>
                                                           <div class="file-upload-inner ts-forms vento">
                                                               <div class="file-upload-inner ts-forms vento">
                                                                    <div class="input prepend-small-btn">
                                                                        <div class="file-button">
                                                                            Procurar
                                                                            <input type="file" name="ficha" id="ficha" onchange="document.getElementById('prepend-small-btn2').value = this.value;" accept="application/pdf" >
                                                                        </div>
                                                                        <input type="text" value="<?php echo $ficha_matricula ?>" id="prepend-small-btn2" disabled>
                                                                        <input type="hidden" name="ficha2" value="<?php echo $ficha_matricula ?>"  id="ficha2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <em><span class="arq" id="arqMatricula"></span></em>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="educador1">Educador | </label>
                                                            <label class="lk vento" > Habilitar o educador 
                                                                <input type="checkbox" name="habilita_edu" id="habilita_edu" class="lk vento" onclick="habilitar_edu()">
                                                            </label>
                                                            <div class="vento">
                                                                <select class="form-control vento" id="educador1" name="educador" >
                                                                    <?php 
                                                                        $view3 = Funcionario::findBySql(con(), "SELECT * FROM funcionario WHERE cargo_id = 3");
                                                                        foreach ($view3 as $f):
                                                                    ?>
                                                                    <option value="<?php echo $f->getId() ?>" class="educador1"> <?php echo $f->getNome() ?> </option>
                                                                    <!-- Pega o valor do banco para mostrar no javascript -->
                                                                    <option hidden value="<?php echo $f->getNome() ?>" class="educador2"></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <!--======================== Segunda parte  -->
                                                    <div class="col-lg-6">
                                                       
                                                        <div class="form-group col-lg-5">
                                                            <div class="form-select-list">
                                                                <label for="sx">Sexo</label>
                                                                <div class="vento">
                                                                    <select class="form-control chosen-select vento" id="sx" name="sexo">
                                                                        <option value="M">Masculino</option>
                                                                        <option value="F">Feminino</option> 
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-lg-3">
                                                            <label for="idade" class="control-label">Idade</label>
                                                            <input type="number" min="1" class="form-control vento" id="idade" name="idade" autocomplete="off"  required>
                                                        </div>

                                                        <div class="form-group col-lg-4">
                                                            <div class="bt-df-checkbox pull-left">
                                                                <div class="pull-left">
                                                                    <label onclick="Mes()" class="lk">
                                                                        <input type="radio" name="idade_v" value="0" id="idade_v" class="lk idade vento">  Meses 
                                                                    </label>
                                                                </div><br>
                                                                <div class="pull-left">
                                                                    <label onclick="Ano()" class="lk">
                                                                        <input type="radio"  name="idade_v" value="1" class="lk idade vento">  Anos  
                                                                    </label>
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="at">Atestado médico</label>
                                                            <div class="file-upload-inner ts-forms vento">
                                                               <div class="file-upload-inner ts-forms vento">
                                                                    <div class="input prepend-small-btn">
                                                                        <div class="file-button">
                                                                            Procurar
                                                                            <input type="file" name="at" id="at" onchange="document.getElementById('prepend-small-btn3').value = this.value;" accept="application/pdf" >
                                                                        </div>
                                                                        <input type="text" value="<?php echo $atestado ?>" id="prepend-small-btn3" disabled>
                                                                        <input type="hidden" name="at2" value="<?php echo $atestado ?>"  id="at2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <em><span class="arq" id="arqMedico"></span></em>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="c_vacina">Cópia do cartão de vacina</label>
                                                            <div class="file-upload-inner ts-forms vento">
                                                               <div class="file-upload-inner ts-forms vento">
                                                                    <div class="input prepend-small-btn">
                                                                        <div class="file-button">
                                                                            Procurar
                                                                            <input type="file" name="c_vacina" id="c_vacina" onchange="document.getElementById('prepend-small-btn4').value = this.value;" accept="application/pdf" >
                                                                        </div>
                                                                        <input type="text" value="<?php echo $cartao_vacina ?>" id="prepend-small-btn4" disabled>
                                                                        <input type="hidden" name="c_vacina2" value="<?php echo $cartao_vacina ?>"  id="c_vacina2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <em><span class="arq" id="arqVacina"></span></em>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="c_pagamento">Comprovativo de pagamento</label>
                                                            <div class="file-upload-inner ts-forms vento">
                                                               <div class="file-upload-inner ts-forms vento">
                                                                    <div class="input prepend-small-btn">
                                                                        <div class="file-button">
                                                                            Procurar
                                                                            <input type="file" name="c_pagamento" id="c_pagamento" onchange="document.getElementById('prepend-small-btn5').value = this.value;" accept="application/pdf" >
                                                                        </div>
                                                                        <input type="text" value="<?php echo $comprovativo_pagamento ?>" id="prepend-small-btn5" disabled>
                                                                        <input type="hidden" name="c_pagamento2" value="<?php echo $comprovativo_pagamento ?>"  id="c_pagamento2">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <em><span class="arq" id="arqPagamento"></span></em>
                                                        </div>
                                                        
                                                        <div class="form-group col-lg-6">
                                                            <label for="turma1">Turma</label>
                                                            <div class="vento">
                                                                <select class="form-control vento" id="turma1" name="s_turma">
                                                                    <?php 
                                                                        $ver2 = Turma::findBySql(con(), "SELECT * FROM turma");
                                                                        foreach ($ver2 as $i2):
                                                                    ?>
                                                                    <option value="<?php echo $i2->getId(); ?>" class="turma1"><?php echo $i2->getNome() ?></option>
                                                                    <!-- Pega o valor do banco para mostrar no javascript -->
                                                                    <option hidden value="<?php echo $i2->getNome() ?>" class="turma2"></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-lg-6">
                                                            <label for="sala1">Sala</label>
                                                            <div class="vento">
                                                                <select  class="form-control vento" id="sala1" name="s_sala" >
                                                                    <?php 
                                                                        $ver3 = Sala::findBySql(con(), "SELECT * FROM sala");
                                                                        foreach ($ver3 as $i3):
                                                                    ?>
                                                                    <option value="<?php echo $i3->getId()?>" class="sala1"><?php echo $i3->getId() ?></option>
                                                                    <!-- Pega o valor do banco para mostrar no javascript -->
                                                                    <option hidden value="<?php echo $i3->getId() ?>" class="sala2"></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress mg-t-15">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15 vento" id="enviar" style="margin-top: 10px;" onclick="submeterForm('formID')"> Editar <img id="progresso"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <!-- PEGA A DATA DE CADASTRO & O ID DO FUNCIONARIO PRA ENVIAR NO PHP -->
                                                <input type="hidden" name="data_cadastro" value="<?php echo $data ?>" >
                                                <input type="hidden" name="cod" value="<?php echo $ID ?>" >
                                            </form>
                                        </div>
                                    </div>
                                </div>
                               
                                <!-- End criança ===================================-->
                                
                                <!--=================================== Editar encarregado ===================================-->
                                
                                <div class="product-tab-list tab-pane fade" id="EDITAR_ENCARREGADO">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form method="post" action="../servidor/e_crianca.php" enctype="multipart/form-data" id="formID2">
                                                <div class="review-content-section">
                                                <div class="row">
                                                    <div class="form-group col-lg-12 ">
                                                        <label class="lk vento" > Habilitar o encarregado 2 
                                                            <input type="checkbox" name="habilita" id="habilita" class="lk vento" onclick="habilitar()">
                                                        </label>
                                                    </div>
                                                    
                                                    <div class="col-lg-6">
                                                        <div class="form-group col-lg-8">
                                                            <label for="encarregado1">Encarregado 1</label>
                                                            <input type="text" name="encarregado1" value="<?php echo $encarregado1 ?>" id="encarregado1" class="form-control vento" autocomplete="off" placeholder="Name Completo" required>
                                                            <input type="hidden" name="cod_enc1" value="<?php echo $encarregado1_id ?>">
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label for="parent">Famíla</label>
                                                            <div class="vento">
                                                                <select class="form-control chosen-select vento" id="parent" name="parente1">
                                                                    <?php 
                                                                        $view = Parente::findBySql(con(), "SELECT * FROM parente");
                                                                        foreach ($view as $p):
                                                                    ?>
                                                                    <option value="<?php echo $p->getId() ?>" class="parent"> <?php echo $p->getNome() ?> </option>
                                                                    <!-- Pega o valor do banco para mostrar no javascript -->
                                                                    <option hidden value="<?php echo $p->getNome() ?>" class="familia"></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="c_bi">Cópia do BI do encarregado 1</label>
                                                            <div class="file-upload-inner ts-forms vento">
                                                                <div class="input prepend-small-btn">
                                                                    <div class="file-button">
                                                                        Procurar
                                                                        <input type="file" name="c_bi" id="c_bi" value="<?php echo $c_bi1 ?>" onchange="document.getElementById('prepend-small-btn6').value = this.value;" accept="application/pdf" >
                                                                    </div>
                                                                    <input type="text" id="prepend-small-btn6" value="<?php echo $c_bi1 ?>" disabled>
                                                                    <input type="hidden" name="c_bi2" value="<?php echo $c_bi1 ?>"  id="c_bi2">
                                                                </div>
                                                            </div>
                                                            <em><span class="arq" id="arqBI1"></span></em>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tel">Contactos</label>
                                                            <input type="tel" name="tel" value="<?php echo $telefone1 ?>" id="tel" data-mask="(+244) 999-999-999" class="form-control vento" placeholder="(+244) 9**-***-***" autocomplete="off">
                                                        </div>
                                                        
                                                    </div>
                                                    <!--=============================== Parte 2 -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group col-lg-8">
                                                            <label for="encarregado2">Encarregado 2</label>
                                                            <input type="text" name="encarregado2" value="<?php echo $encarregado2 ?>" id="encarregado2" class="form-control vento" autocomplete="off" placeholder="Name Completo" required>
                                                            <input type="hidden" name="cod_enc2" value="<?php echo $encarregado2_id ?>">
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label for="parent2">Famíla</label>
                                                            <div class="vento">
                                                                <select class="form-control chosen-select vento" id="parent2" name="parente2">
                                                                    <?php 
                                                                        $view2 = Parente::findBySql(con(), "SELECT * FROM parente");
                                                                        foreach ($view2 as $p2):
                                                                    ?>
                                                                    <option value="<?php echo $p2->getId() ?>" class="parent2"> <?php echo $p2->getNome() ?> </option>
                                                                    <!-- Pega o valor do banco para mostrar no javascript -->
                                                                    <option hidden value="<?php echo $p2->getNome() ?>" class="familia2"></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="c_bi_">Cópia do BI do encarregado 2</label>
                                                            <div class="file-upload-inner ts-forms vento">
                                                                <div class="input prepend-small-btn">
                                                                    <div class="file-button">
                                                                        Procurar
                                                                        <input type="file" name="c_bi_" id="c_bi_" onchange="document.getElementById('prepend-small-btn7').value = this.value;" accept="application/pdf" >
                                                                    </div>
                                                                    <input type="text" value="<?php echo $c_bi2 ?>" id="prepend-small-btn7" disabled>
                                                                    <input type="hidden" name="c_bi_2" value="<?php echo $c_bi2 ?>"  id="c_bi_2">
                                                                </div>
                                                            </div>
                                                            <em><span class="arq" id="arqBI2"></span></em>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tel2">_</label>
                                                            <input type="tel" name="tel2" value="<?php echo $telefone2 ?>" id="tel2" data-mask="(+244) 999-999-999" class="form-control vento" placeholder="(+244) 9**-***-***" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress mg-t-15">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15 vento" id="enviar2" style="margin-top: 10px;" onclick="submeterForm2('formID2')"> Editar <img id="progresso2"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <!-- PEGA A DATA DE CADASTRO & O ID DO FUNCIONARIO PRA ENVIAR NO PHP -->
                                                <input type="hidden" name="data_cadastro" value="<?php echo $data ?>" >
                                                <input type="hidden" name="cod" value="<?php echo $ID ?>" >
                                            </form>
                                        </div>
                                    </div>
                                </div>
                               <!-- End encarregado ===================================-->
                              
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
       <?php include_once '../servidor/ajax/e_perfil_crianca.php'; ?>
    </body>

</html>