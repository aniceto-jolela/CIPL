 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_salario.php'; ?>
<!doctype html>
<html>
<head>
    <?php include_once 'sidebar.php'; ?>
    <style>
        h4 a{color:black !important}
        p{font-size: 16px;}
        /*Oculta o scroll do eixo Y até um determinado limite */
        @media screen and (min-width:1200px) and (max-width:1370px) and (min-height:670px) and (max-height:700px){body{overflow-y: hidden;}}
    </style>
    <?php 
        $enca = 0;$folha=0;$aumen = 0;$descont = 0;$dataAM=0;
        $encarregado = Encarregado::findBySql(con(), "SELECT * FROM encarregado");
        $folha_salario = FolhaSalario::findBySql(con(), "SELECT * FROM folha_salario");
        $aumento = Aumento::findBySql(con(), "SELECT * FROM aumento");
        $desconto = Desconto::findBySql(con(), "SELECT * FROM desconto");
        foreach ($encarregado as $e){
            //Controlo de estado
            if($e->getEstado() == 0){++$enca;}
        }
            foreach ($aumento as $a){++$aumen;}foreach ($desconto as $d){++$descont;}
        foreach ($folha_salario as $f){
            $MT2 = $f->getDataAdmissao();
            $dAM_db2 = substr($MT2, 0,7);
            if($dataAM != $dAM_db2){
                //Conta o total de folha de salário
                $folha++;
            }$dataAM = $dAM_db2;
        }
    
    ?>
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
                            <div class="icon_pessoal_cor"></div>
                            <div class="white-box res-mg-t-30 table-mg-t-pro-n icon_pessoal informacao" style="background: #fecd68;"><br>
                                <div class="col-lg-12" style="height:90px">
                                    <div class="analytics-edu-wrap ant-res-b-30 reso-mg-b-30" style="background:none;">
                                        <div class="skill-content-3 analytics-edu" style="background:none;">
                                            <div class="skill">
                                                <div class="progress">
                                                    <div class="lead-content">
                                                        <h3><span class="counter"><?php echo $aumen ?></span></h3>
                                                        <p>Total de aumento de salário</p>
                                                    </div>
                                                    <div class="progress-bar wow fadeInLeft" data-progress="<?php echo $aumen ?>" style="width: <?php echo $aumen ?>%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span><?php echo $aumen ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-12 separa">
                            <div class="icon_pessoal_cor"></div>
                            <div class="white-box res-mg-t-30 table-mg-t-pro-n icon_pessoal informacao" style="background: #99cc67;"><br>
                                <div class="col-lg-12" style="height:90px">
                                     <div class="analytics-sparkle-line reso-mg-b-30" style="margin-top:-45px;background: none;">
                                        <div class="analytics-content">
                                            <h5>Folha de salário</h5>
                                            <h2 class="counter"><?php echo $folha ?></h2>
                                            <div id="sparkline24"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-12 separa">
                            <div class="icon_pessoal_cor"></div>
                            <div class="white-box res-mg-t-30 table-mg-t-pro-n icon_pessoal informacao" style="background: #fecd68;"><br>
                                <div class="col-lg-12" style="height:90px">
                                     <div class="analytics-sparkle-line reso-mg-b-30" style="margin-top:-45px;background: none;">
                                        <div class="analytics-content">
                                            <h5>Desconto de salário</h5>
                                            <h2 class="counter"><?php echo $descont ?></h2>
                                            <div id="sparkline25"></div>
                                        </div>
                                    </div>
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
                                    </div>
                                    <p title="Serve para aumentar o salário de todos funcionários ou de cada cargo."><span class="fa fa-money  sub-icon-mg" aria-hidden="true"></span> Salário</p>
                                    <p><span class="fa fa-th-large"></span> Consultar <span class="fa fa-folder-open"></span></p>
                                    <p>
                                        <span class="fa  fa-file" title="Serve para fazer a folha de salário."> Folha de salários, </span><br> 
                                        <span class="fa  fa-file" title="Mostra todas folhas de salário."> Aumento </span><br>
                                        <span class="fa  fa-file" title="Mostra todos funcionários que foram descontados no mês corrente."> Descontos</span> <br>
                                        <span class="fa  fa-file" > Subsídio de férias </span> <br>
                                        <span class="fa  fa-file" > Subsídio de 13º mês </span>
                                    </p>
                                    <p><span class="glyphicon glyphicon-th-list"></span> Propinas <span class="fa fa-folder-open"></span></p>
                                    <p>
                                        <span class="fa  fa-file" title="Serve para guardar o talão de confirmação do pagamento da/s criança/s."> Pagamento, </span> 
                                        <span class="fa  fa-file" title="Mostra os dados dos encarregados que fizeram o pagamento da propina..."> Consultar </span> 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-12 separa">
                            <div class="white-box res-mg-t-30 table-mg-t-pro-n icon_pessoal informacao">
                                <div style="height: 340px;">
                                    <div style="background:#99cc67;margin:-20px -230px 0px -60px; ">
                                        <h3 style="color:white;padding-top:20px;padding-bottom:20px;margin-left: 100px">
                                            <i class="fa fa-bullhorn fa-1x cor_icon informacao_alterada"></i>
                                            PROPINAS (Pagamento)</h3>
                                    </div> 
                                    <div >
                                        <div class="analytics-rounded res-tablet-mg-t-30 dk-res-t-pro-30">
                                            <div class="analytics-rounded-content">
                                                <h5>Total de Encarregado</h5>
                                                <h2 class="counter"><?php echo $enca ?></h2>
                                                <div class="text-center">
                                                    <div id="sparkline54"></div>
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
       
    </div>
    <!-- Area do footer -->
    <?php include_once '../importante/footer.php'; ?>
    <!-- Area do Ajax -->
    <?php include_once '../servidor/ajax/nt_salario.php'; ?>
</body>

</html>