 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_salario.php'; ?>
<!doctype html>
<html>

<head>
    <?php include_once 'sidebar.php'; ?>
    <?php 
        /*Notificação
        *funcionario_id (código):
        * 1 = aumento todos
        * 2 = aumento cargo
        * 3 = desconto todos
        * 4 = desconto cargo
        * 5 = nova folha de salário 
        * 6 = nova folha com bônus
        * 7 = subsídio de féria
        * 8 = subsídio de 13º mês 
        * 9 = pagamento de propína
        **/
    ?>
    <style>
        .sumario{width: 50px ;height: 50px;padding: 15px 0 0 10px;font-weight: 700;margin-right: 130px;}
        .perfil1{background: #00749F;padding: 5px;border-radius: 3px;color: white;white-space: nowrap;}
        .perfil2{background: #D80027;padding: 5px;border-radius: 3px;color: white;white-space: nowrap;}
        .perfil3{background: #f0ad4e;padding: 5px;border-radius: 3px;color: white;white-space: nowrap;}
        .perfil4{background: #99cc67;padding: 5px;border-radius: 3px;color: white;white-space: nowrap;}
        .perfil5{background: #933EC5;padding: 5px;border-radius: 3px;color: white;white-space: nowrap;}
        .perfil6{background: #85060c;padding: 5px;border-radius: 3px;color: white;white-space: nowrap;}
        .perfil7{background:  #00c8aa;padding: 5px;border-radius: 3px;color: white;white-space: nowrap;}
        /*{white-space: normal=> Serve para quebrar a frase ou mudar de linha (quando chegar no final)*/
        td{white-space: normal !important;}
        
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
            
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control" onkeyup="pesquisa(this.value)">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="index.php">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Notificações</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mailbox-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class=" col-lg-12 col-md-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="hpanel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-8">
                                        <div class="btn-group ib-btn-gp active-hook mail-btn-sd mg-b-15">
                                            <button class="btn btn-default btn-sm" onclick="vTodos()" style="color:white;"><i class="fa fa-eye-slash"></i> Todas como lida</button>
                                        </div>
                                    </div>
                                </div>
                                <form id="fNF">
                                    <div id="nf">
                                        <!-- Onde vai aparecer a notificação -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Area do footer -->
    <?php include_once '../importante/footer.php'; ?>
    <!-- tab JS ============================================ -->
    <script src="js/tab.js"></script>
     <!-- Area do Ajax -->
    <?php include_once '../servidor/ajax/nt_salario.php'; ?>
</body>

</html>