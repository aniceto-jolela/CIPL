 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_crianca.php'; ?>
<!doctype html>
<html>
    <head>
        <?php include_once 'sidebar.php'; ?>
        <?php include_once '../importante/select_header.php'; ?>
    </head>

    <body onload="mostraOrgCrianca()">
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
                    <div class="row"><br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="page-header cor_sumario">
                                <i class="fa fa-laptop"></i>  Organizar as crianças
                            </h3>
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="fa fa-plus-circle"></i><span> Seleciona cada criança, com o seu respectivo educador, turma e sala</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- Static Form -->
            <form method="post" action="../servidor/c_organizar_crianca.php" id="idForm">
                    <!-- Static Table Start -->
                        <div class="data-table-area mg-b-15">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="sparkline13-">
                                        <div class="sparkline13-graph">
                                            <div class="datatable-dashv1-list custom-datatable-overright">

                                                <div id="toolbar ">
                                                    <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12">
                                                        <div class="chosen-select-single mg-b-20">
                                                            <br>
                                                            <div class="vento">
                                                                <select data-placeholder="Seleciona o Educador" name="s_educador" class="chosen-select vento" tabindex="-1">
                                                                    <option></option>
                                                                    <?php 
                                                                        
                                                                        $cg = Cargo::findBySql(con(), "SELECT * FROM cargo");$ID="";
                                                                        foreach ($cg as $i3){
                                                                            if(strtolower($i3->getNome()) == "educador" || strtolower($i3->getNome()) == "educadora"){
                                                                                //Pega o ID do cargo correto
                                                                                $ID=$i3->getId();
                                                                            }
                                                                        }
                                                                        $ver1 = Funcionario::findBySql(con(), "SELECT * FROM funcionario WHERE cargo_id='".$ID."' AND estado=0");
                                                                        foreach ($ver1 as $i1):
                                                                    ?>
                                                                    <option value="<?php echo $i1->getId() ?>"><?php echo $i1->getNome() ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class=" col-lg-4 col-md-5 col-sm-4 col-xs-7 chosen-select-single mg-b-20">
                                                            <label>Turma</label>
                                                            <div class="vento">
                                                                <select data-placeholder="Choose a Country..." name="s_turma" class="chosen-select vento" tabindex="-1">
                                                                    <?php 
                                                                        $ver2 = Turma::findBySql(con(), "SELECT * FROM turma");
                                                                        foreach ($ver2 as $i2):
                                                                    ?>
                                                                    <option value="<?php echo $i2->getId(); ?>"><?php echo $i2->getNome() ?></option>
                                                                     <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class=" col-lg-4 col-md-5 col-sm-3 col-xs-5 chosen-select-single mg-b-20">
                                                            <label>Sala</label>
                                                            <div class="vento">
                                                                <select data-placeholder="Choose a Country..." name="s_sala" class="chosen-select" tabindex="-1">
                                                                    <?php 
                                                                        $ver3 = Sala::findBySql(con(), "SELECT * FROM sala");
                                                                        foreach ($ver3 as $i3):
                                                                    ?>
                                                                    <option value="<?php echo $i3->getId()?>"><?php echo $i3->getId() ?></option>
                                                                     <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8 col-sm-12 col-xs-12">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light mg-b-15 vento" id="enviar" name="guardar" style="margin-top: 10px;" onclick="submeterOrganizar('idForm')"> Guardar <img id="progresso"> </button>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 vento">
                                                        <!-- Onde será mostrado a tabela -->
                                                        <div id="mTB"></div>
                                                    </div>
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
             <!-- End Form -->
        </div>
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?>
        <?php include_once '../importante/select_footer.php'; ?>
        <!-- Area do AJAX -->
        <?php include_once '../servidor/ajax/c_organizar_crianca.php'; ?>
    </body>

</html>