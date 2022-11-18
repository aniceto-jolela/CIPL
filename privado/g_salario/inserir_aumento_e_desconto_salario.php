<!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_salario.php'; ?>
<!doctype html>
<html>
    <head>
        <?php include_once 'sidebar.php'; ?>
    </head>

    <body>
        <!-- Start Welcome area -->
        <div class="all-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <?php include_once '../importante/logo_mobile.php'; ?>
                    </div>
                </div>
            </div>
            <div class="header-advance-area">
            <?php include_once 'header.php'; ?>
            <!-- Mobile Menu start -->
            <?php include_once 'mobile.php'; ?>
            <!-- Mobile Menu end -->
            
                <div class="container-fluid">
                    <div class="row"><br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="page-header cor_sumario">
                                <i class="fa fa-money"></i> Salário
                            </h3>
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="fa fa-plus-circle"></i><span> Aumento & desconto de salário</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Password meter Start -->
            <form method="post" action="../servidor/c_aumento_desconto_salario.php" id="fomDados">
            <div class="password-meter-area mg-b-15">
                <div class="container-fluid">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline9-list mg-t-30">
                            <div class="sparkline9-graph">
                                <div id="pwd-container4">
                                    
                                    <div class="col-lg-4 col-md-8 col-sm-12 col-xs-12 ">
                                        <label onclick="radioAumento()" class="lk">
                                            <input type="radio" checked id="aumet" value="0" name="radioS" class="informacao"> AUMENTO
                                        </label>
                                        <label onclick="radioDesconto()" class="lk">
                                            <input type="radio" value="1" name="radioS" class="informacao"> DESCONTO
                                        </label>
                                    </div>
                                    
                                        <div class="col-lg-12 col-md-9 col-sm-9 col-xs-12">
                                            <div class="col-lg-6 col-md-9 col-sm-9 col-xs-9" style="margin-left: 20%">
                                                <div class="form-select-list">
                                                    <label for="senha">Cargo</label>
                                                    <div class="vento">
                                                        <select class="form-control custom-select-value" name="cargo" id="cargo" style="border-radius: 10px;" onchange="voidAviso()">
                                                            <option disabled selected> Seleciona o cargo </option>
                                                            <?php 
                                                            $ver1 = Cargo::findBySql(con(), "SELECT * FROM cargo ORDER BY nome");
                                                            foreach ($ver1 as $i):
                                                            ?>
                                                            <option value="<?php echo $i->getId();?>"><?php echo $i->getNome();?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <span id="aviso" style="color: red;"></span>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group col-lg-12 col-md-8 col-sm-12 col-xs-12">
                                            <div class="form-group col-lg-6 col-md-4 col-sm-4 col-xs-4" style="margin-left: 20%"><br>
                                                <label for="todos" class="control-label lk">
                                                    <input type="checkbox"  id="todos" onclick="habilitarCargo()" class="vento"> Todos os funcionários
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-lg-12 col-md-8 col-sm-12 col-xs-12">
                                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4" style="margin-left: 20%">
                                                <label for="aumento" id="dois" class="control-label ">Aumento</label>
                                                <input type="number" class="form-control vento" name="aumt_desc" id="aumt_desc" min="1" value="0"  autocomplete="off" required>
                                                <span id="aviso2" style="color: red;"></span>
                                            </div>
                                        </div>
                                    
                                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 login-horizental" style="margin-left: 40%">
                                            <button class="btn btn-sm btn-primary login-submit-cs vento " id="enviar"  type="submit" onclick="submeterForm()">Guardar <img id="progresso"></button>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Password meter End-->
        </div>
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
        <?php include_once '../servidor/ajax/c_aumento_desconto_salario.php'; ?>
    </body>

</html>