<!-- Verifica se o utilizador está logado -->
 <?php include_once '../importante/log_admin.php';?>
<!doctype html>
<html>
<head>
    <?php include_once 'sidebar.php'; ?>
    <style>
        h4 a{color:black !important}
        p{font-size: 16px;}
        /*Oculta o scroll do eixo Y até um determinado limite */
        @media screen and (min-width:1200px) and (max-width:1370px) and (min-height:670px) and (max-height:700px){body{overflow-y: hidden;}}
        /* Organiza os quadrados ate um determinado limite */
        @media screen and (min-width:50px) and (max-width:1200px){.quadrado_cor{height: 73px !important;}.letra{color: black !important;}}
        @media screen and (min-width:50px) and (max-width:1200px){.quadrado_cor2{height: 20px !important;}.letra1{text-align:right;margin-top: -20px}}
    </style>
</head>

<body>
        <?php 
        //Usuarios
        $ver = Usuario::findBySql(con(), "SELECT * FROM usuario");
        $id = 0;
        foreach ($ver as $i):
            $id++;
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
                                    <div class="analytics-rounded" style="margin-top:-45px;margin-left:-45px;background: none;">
                                        <div class="analytics-rounded-content">
                                            <div class="text-center">
                                                <div id="sparkline51" style="text-align:right;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <h2><span class="counter"><?php echo $id ?></span></h2>
                                    <small style="color:#99cc67;font-size: 14px;" class="letra">Usuários</small>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-12 separa">
                            <div class="icon_pessoal_cor" style="background: #fecd68;"></div>
                            <div class="white-box res-mg-t-30 table-mg-t-pro-n icon_pessoal informacao"><br>
                                <div class="col-lg-5 quadrado_cor2" style="height:90px">
                                    <i class="fa fa-user fa-5x cor_icon informacao_alterada"></i>
                                </div>
                                <div class="col-lg-7 letra1">
                                    <h3><span>ADMINISTRADOR</span></h3>
                                    <small style="color:#fecd68;font-size: 14px;" class="letra">
                                        É o responsavel pelas <br>configuraçoes dos modulos do<br> sistema, mostrado abaixo.
                                    </small>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-12 separa">
                            <div class="white-box res-mg-t-30 table-mg-t-pro-n icon_pessoal informacao">
                                <div class="col-lg-12" style="text-align:center;">
                                    <div style="background:#fecd68;margin: -20px -60px 0px -60px">
                                        <h3 style="color:white;padding-top: 20px;padding-bottom:20px">GESTÃO DE PESSOAL</h3>
                                    </div>
                                    <p><span class="glyphicon glyphicon-user  sub-icon-mg" aria-hidden="true"></span> Cadastrar o funcionário</p>
                                    <p><span class="fa fa-th-large"></span> Consultar <span class="fa fa-folder-open"></span></p>
                                    <p>
                                        <span class="fa  fa-file" title="Mostra os dados dos funcionários."></span> Funcionários,
                                        <span class="fa  fa-file" title="Mostra os cargos dos funcionários."></span> Cargos,
                                        <span class="fa  fa-file" title="Mostra a presença dos funcionários."></span> Presença,
                                    </p>
                                    <p><span class="glyphicon glyphicon-th-list "></span> Controlo</p>
                                    <p><span class="fa  fa-file" title="Serve para fazer o controlo de presença do funcionário."></span> Presença,</p>
                                    <p><span class="fa  fa-file" title="Serve para justificar as faltas dos funcionários."></span> Justificar faltas</p>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-12 separa">
                            <div class="white-box res-mg-t-30 table-mg-t-pro-n icon_pessoal informacao">
                                <div class="col-lg-12" style="text-align:center;">
                                    <div style="background:#fe01c8;margin: -20px -60px 0px -60px">
                                        <h3 style="color:white;padding-top: 20px;padding-bottom:20px">GESTÃO DE CRIANÇA</h3>
                                    </div>
                                    <p><span class="fa fa-male  sub-icon-mg" aria-hidden="true"></span> Cadastrar criança</p>
                                    <p><span class="glyphicon glyphicon-user  sub-icon-mg" aria-hidden="true"></span> Cadastrar encarregado</p>
                                    <p title="Serve para selecionar as crianças para a sua sala,turma e escolher o seu Educador. "><span class="glyphicon glyphicon-align-center"></span> Organizar as crianças</p>
                                    <p title="Mostra os dados das crianças. "><span class="fa fa-th-large"></span> Consultar crianças</p>
                                    <p title="Serve para fazer o controlo da entrada e saída das crianças."><span class="glyphicon glyphicon-resize-full"></span> Entrada & saída</p>
                                    <p title="Mostra os dados de (entrada e saída das crianças)."><span class="glyphicon glyphicon-retweet"></span> Relatório</p>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="col-lg-12 separa">
                            <div class="white-box res-mg-t-30 table-mg-t-pro-n icon_pessoal informacao">
                                <div class="col-lg-12" style="text-align:center;">
                                    <div style="background:#f60507;margin: -20px -60px 0px -60px">
                                        <h3 style="color:white;padding-top: 20px;padding-bottom:20px">GESTÃO DE SALÁRIO</h3>
                                    </div>
                                    <p title="Serve para aumentar o salário de todos funcionários ou de cada cargo."><span class="fa fa-money  sub-icon-mg" aria-hidden="true"></span> Salário</p>
                                    <p><span class="fa fa-th-large"></span> Consultar <span class="fa fa-folder-open"></span></p>
                                    <p>
                                        <span class="fa  fa-file" title="Serve para fazer a folha de salário."></span> Folha de salários, <br> 
                                        <span class="fa  fa-file" title="Mostra todas folhas de salário."></span> Aumento, 
                                        <span class="fa  fa-file" title="Mostra todos funcionários que foram descontados no mês corrente."></span> Descontos<br>
                                        <span class="fa  fa-file" ></span> Subsídio de férias <br>
                                        <span class="fa  fa-file" ></span> Subsídio de 13º mês
                                    </p>
                                    <p><span class="glyphicon glyphicon-th-list"></span> Propinas <span class="fa fa-folder-open"></span></p>
                                    <p>
                                        <span class="fa  fa-file" title="Serve para guardar o talão de confirmação do pagamento da/s criança/s."></span> Pagamento,
                                        <span class="fa  fa-file" title="Mostra os dados dos encarregados que fizeram o pagamento da propina..."></span> Consultar
                                    </p>
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
</body>

</html>