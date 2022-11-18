 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_crianca.php'; ?>
<!doctype html>
<html>
<head>
    <?php include_once 'sidebar.php'; ?>
    <style>
        h4 a{color:black !important}
        p{font-size: 16px;}
        /* Oculta o scroll do eixo Y até um determinado limite */
        @media screen and (min-width:1200px) and (max-width:1370px) and (min-height:670px) and (max-height:700px){body{overflow-y: hidden;}}
        /* Organiza os quadrados ate um determinado limite */
        @media screen and (min-width:50px) and (max-width:1200px){.quadrado_cor{height: 25px !important;}.letra{color: black !important;}}
        
    </style>
</head>

<body>
    <?php 
        //
        $ver = Crianca::findBySql(con(), "SELECT * FROM crianca");
        $id = 0;
        foreach ($ver as $i):
            //Controlo do estado
            if($i->getEstado() == 0){$id++;}
        endforeach;
        //Encarregados
        $ver1 = Encarregado::findBySql(con(), "SELECT * FROM encarregado");
        $id1 = 0;
        foreach ($ver1 as $i):
            //Controlo de estado
            if($i->getEstado() == 0){$id1++;}
        endforeach;
        //Entrada & saida
        $ver2 = EntradaSaida::findBySql(con(), "SELECT * FROM entrada_saida");
        $id2 = 0;
        foreach ($ver2 as $i):
            $id2++;
        endforeach;
    ?>
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
                                    <ul class="list-inline two-part-sp">
                                       <li>
                                           <div id="sparklinedash2"></div>
                                       </li>
                                       <li class="text-right sp-cn-r"><i class="fa fa-level-up" aria-hidden="true"></i> 
                                        <span class="counter text-success"><?php echo $id;?></span></li>
                                   </ul>
                                </div>
                                <div class="col-lg-4">
                                    <h2><span>Total</span></h2>
                                    <small style="color:#99cc67;font-size: 14px;" class="letra">Crianças</small>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-12 separa">
                            <div class="icon_pessoal_cor" style="background: #fecd68;"></div>
                            <div class="white-box res-mg-t-30 table-mg-t-pro-n icon_pessoal informacao"><br>
                                <div class="col-lg-5 quadrado_cor" style="height:90px">
                                     <ul class="list-inline two-part-sp">
                                        <li>
                                            <div id="sparklinedash4"></div>
                                        </li>
                                        <li class="text-right graph-two-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> 
                                            <span class="counter text-purple"><?php echo $id1;?></span></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <h2><span>Total</span></h2>
                                    <small style="color:#fecd68;font-size: 14px;" class="letra">Encarregados</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-12 separa">
                            <div class="icon_pessoal_cor" style="background: #fe01c8;"></div>
                            <div class="white-box res-mg-t-30 table-mg-t-pro-n icon_pessoal informacao"><br>
                                <div class="col-lg-5 quadrado_cor" style="height:90px">
                                    <ul class="list-inline two-part-sp">
                                        <li>
                                            <div id="sparklinedash3"></div>
                                        </li>
                                        <li class="text-right graph-three-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> 
                                            <span class="counter text-info"><?php echo $id2;?></span></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <h2><span>Total</span></h2>
                                    <small style="color:#fe01c8;font-size: 14px;" class="letra">Relatório</small>
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
                                    <p><span class="glyphicon glyphicon-user  sub-icon-mg" aria-hidden="true"></span> Cadastrar criança & encarregado</p>
                                    <p title="Serve para selecionar as crianças para a sua sala,turma e escolher o seu Educador. "><span class="glyphicon glyphicon-align-center"></span> Organizar as crianças</p>
                                    <p title="Mostra os dados das crianças. "><span class="fa fa-th-large"></span> Consultar crianças</p>
                                    <p title="Serve para fazer o controlo da entrada e saída das crianças."><span class="glyphicon glyphicon-resize-full"></span> Entrada & saída</p>
                                    <p title="Mostra os dados de (entrada e saída das crianças)."><span class="glyphicon glyphicon-retweet"></span> Relatório</p>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    
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
                                                $notificacao = NotificacaoCrianca::findBySql(con(), "SELECT * FROM `notificacao_crianca` ORDER BY id DESC");
                                                foreach ($notificacao as $n):
                                                    $cri = Crianca::findById(con(), $n->getCriancaId());$fundo="";
                                                    //Verifica e a notificação não foi lida
                                                    if($n->getEstado() == 0){$fundo = "background: #D9DDE5";}
                                                    if($n->getCriancaId() == $cri->getId()){
                                            ?>
                                            <p style="<?php echo $fundo ?>" onclick="mVistoIndex(<?php echo $cont++ ?>,<?php echo $n->getId() ?>)" class="fundo">
                                                <img src="<?php echo $cri->getFoto() ?>" class="img-circle" style="width:50px;height: 50px;">
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
                
                </div>
            </div>
        </div>
       
    </div>
    <!-- Area do footer -->
    <?php include_once '../importante/footer.php'; ?>
    <!-- Area do Ajax -->
    <?php include_once '../servidor/ajax/nt_crianca.php'; ?>
</body>

</html>