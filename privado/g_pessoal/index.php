 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_pessoal.php'; ?>
<!doctype html>
<html>
<head>
    <?php include_once 'sidebar.php'; ?>
    <!-- Mostra o total de funcionários,cargo,faltas justificadas -->
        <?php 
            $t = 0;$t1 = 0;$t2 = 0;$ano=date("Y");$mes=date("m")+0;$dia=date("d");
            $funcionario = Funcionario::findBySql(con(), "SELECT * FROM funcionario");
            $cargo = Cargo::findBySql(con(), "SELECT * FROM cargo");
            $justificativo = Justificativo::findBySql(con(), "SELECT * FROM justificativo");
            $notifica = NotificacaoFuncionario::findBySql(con(), "SELECT * FROM `notificacao_funcionario`");
            foreach ($funcionario as $i):
                //Verifica se o estado é 0 (func activo).
                if($i->getEstado() == 0){$t++; 
                    /*==================== Verifica se a data do BI já expirou ===========================*/
                    $dat = $i->getDataValidade();$pega=0;
                    $ano_db = substr($dat, 0,4);$mes_db = substr($dat, 5,2)+0;$anoMes_dbF = substr($dat, 0,7);
                    //Verifica se o ano da BD for igual ao ano corrente
                    if($ano == $ano_db){
                        foreach ($notifica as $nt) {
                            $datN = $nt->getDataN();
                            $anoMes_dbN = substr($datN, 0,7);
                            if($i->getId() == $nt->getFuncionarioId() && $anoMes_dbF == $anoMes_dbN && $nt->getDescricao()=="A data de validade do seu BI vai terminar no dia $dia deste mês, por favor atualiza o seu BI."){
                                $pega=1;}
                        }
                        //+0 para não mostrar zero no inicio dos número menor que 10
                        if($mes_db==$mes && $pega==0){
                            /********************* CADASTRO DE NOTIFICAÇÃO **********************/
                            
                            $descricao="A data de validade do seu BI vai terminar no dia $dia deste mês, por favor atualiza o seu BI.";
                            $ID=$i->getId();
                            $notificacao = new NotificacaoFuncionario();
                            $notificacao->setFuncionarioId($ID);
                            $notificacao->setDescricao($descricao);
                            $notificacao->insertIntoDatabase(con());
                            /**************************** END  ***************************/
                        }
                    }
                    /*==================== End  se a data do BI já expirou ===========================*/
                }
            endforeach;
            foreach ($cargo as $i1):$t1++; endforeach;
            foreach ($justificativo as $i2):$t2++; endforeach;
        ?>
    <!-- End total-->
    <style>
        h4 a{color:black !important}
        p{font-size: 16px;}
        /*Oculta o scroll do eixo Y até um determinado limite */
        @media screen and (min-width:1200px) and (max-width:1370px) and (min-height:670px) and (max-height:700px){body{overflow-y: hidden;}}
        /* Organiza os quadrados ate um determinado limite */
        @media screen and (min-width:50px) and (max-width:1200px){.quadrado_cor{height: 25px !important;}.letra{color: black !important;}.tl{text-align:right;}}
    </style>
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
            
        </div>
       
       
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-12 separa">
                            <div class="icon_pessoal_cor" style="background: #99cc67;"></div>
                            <div class="white-box res-mg-t-30 table-mg-t-pro-n icon_pessoal informacao"><br>
                                <div class="col-lg-5 quadrado_cor" style="height:90px">
                                    <i class="fa fa-group fa-5x cor_icon informacao_alterada"></i>
                                </div>
                                <div class="col-lg-4">
                                    <h2 class="tl"><span class="counter"><?php echo $t ?></span></h2>
                                    <small style="color:#99cc67;font-size: 14px;" class="letra">Funcionários</small>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-12 separa">
                            <div class="icon_pessoal_cor" style="background: #fecd68;"></div>
                            <div class="white-box res-mg-t-30 table-mg-t-pro-n icon_pessoal informacao"><br>
                                <div class="col-lg-5 quadrado_cor" style="height:90px">
                                    <i class="fa fa-suitcase fa-5x cor_icon informacao_alterada"></i>
                                </div>
                                <div class="col-lg-4">
                                    <h2 class="tl"><span class="counter"><?php echo $t1 ?></span></h2>
                                    <small style="color:#fecd68;font-size: 14px;" class="letra">Cargos</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-12 separa">
                            <div class="icon_pessoal_cor" style="background: #fe01c8;"></div>
                            <div class="white-box res-mg-t-30 table-mg-t-pro-n icon_pessoal informacao"><br>
                                <div class="col-lg-5 quadrado_cor" style="height:90px">
                                    <i class="fa fa-user fa-5x cor_icon informacao_alterada"></i>
                                </div>
                                <div class="col-lg-4">
                                    <h2 class="tl"><span class="counter"><?php echo $t2 ?></span></h2>
                                    <small style="color:#fe01c8;font-size: 14px;" class="letra">Faltas justificadas</small>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-12 separa">
                            <div class="white-box res-mg-t-30 table-mg-t-pro-n icon_pessoal informacao">
                                <div class="col-lg-12" style="text-align:center;">
                                    <div style="background:#fecd68;margin: -20px -60px 0px -60px">
                                        <h3 style="color:white;padding-top: 20px;padding-bottom:20px">FUNCIONALIDADE DO SISTEMA</h3>
                                    </div><br><br>
                                    <p><span class="glyphicon glyphicon-user  sub-icon-mg" aria-hidden="true"></span> Cadastrar o funcionário</p>
                                    <p><span class="fa fa-th-large"></span> Consultar</p>
                                    <p>
                                        <span class="fa  fa-file" title="Mostra os dados dos funcionários."></span> Funcionários,
                                        <span class="fa  fa-file" title="Mostra os cargos dos funcionários."></span> Cargos,
                                        <span class="fa  fa-file" title="Mostra a presença dos funcionários."></span> Presença,
                                    </p>
                                    <p><span class="glyphicon glyphicon-th-list "></span> Controlo</p>
                                    <p>
                                        <span class="fa  fa-file" title="Serve para fazer o controlo de presença do funcionário."></span> Presença,
                                        <span class="fa  fa-file" title="Serve para justificar as faltas dos funcionários."></span> Justificar faltas 
                                    </p><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form id="fNF">
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="col-lg-12 separa">
                                <div class="white-box res-mg-t-30 table-mg-t-pro-n icon_pessoal informacao">
                                    <div style="height: 340px;">
                                        <div style="background:#99cc67;margin:-20px -230px 0px -60px; ">
                                            <h3 style="color:white;padding-top:18px;padding-bottom:10px;margin-left: 100px">
                                                <i class="fa fa-bullhorn fa-1x cor_icon informacao_alterada"></i>
                                                NOTIFICAÇÕES 
                                                <label style="color: white;border-radius: 100%;background:#8D2418;">
                                                    <div style="padding:4px;width:25px;height:25px;text-align: center;" id="notifica">
                                                        <!-- Onde vai aparecer o número das notificações -->
                                                    </div>
                                                </label>
                                            </h3>
                                        </div> 
                                        <div style="overflow-y:auto;height: 240px">
                                            <div>
                                                <?php
                                                    $cont=0;
                                                    $notificacao = NotificacaoFuncionario::findBySql(con(), "SELECT * FROM `notificacao_funcionario` ORDER BY id DESC");
                                                    foreach ($notificacao as $n):
                                                        $func = Funcionario::findById(con(), $n->getFuncionarioId());$fundo="";
                                                        //Verifica e a notificação não foi lida
                                                        if($n->getEstado() == 0){$fundo = "background: #D9DDE5";}
                                                        if($n->getFuncionarioId() == $func->getId()){
                                                ?>
                                                <p style="<?php echo $fundo ?>" onclick="mVistoIndex(<?php echo $cont++ ?>,<?php echo $n->getId() ?>)" class="fundo">
                                                    <img src="<?php echo $func->getFoto() ?>" class="img-circle" style="width:50px;height: 50px;">
                                                    <?php echo $n->getDescricao() ?>
                                                    <span class="pull-right"><?php echo $n->getDataN() ?></span>
                                                </p><hr>
                                                    <?php }endforeach; ?>
                                            </div>
                                        </div>
                                        <a href="notificacao.php">Ver mais</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>
    <!-- Area do footer -->
    <?php include_once '../importante/footer.php'; ?>
    <!-- Area do Ajax -->
    <?php include_once '../servidor/ajax/nt_pessoal.php'; ?>
</body>

</html>