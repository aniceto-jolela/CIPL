 <!-- Verifica se o utilizador está logado -->
<?php include_once '../importante/log_g_pessoal.php'; ?>
<!doctype html>
<html>
    <head>
        <?php include_once 'sidebar.php'; ?>
        <?php include_once '../importante/notificacao_header.php'; ?>
        <style>.limpa{display: inline;font-size: 0px;}.arq{color: red;}</style>
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
                    <div class="row"><br><br>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="breadcrumb">
                                <li><i class="fa fa-home"></i> <a href="index.php">Home</a>
                                </li>
                                <li><i class="fa fa-plus-circle"></i><span> Cadastrar funcionário</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- Password meter Start -->
            <div class="password-meter-area mg-b-10">
                <div class="container-fluid">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline9-list mg-t-10">
                            <div class="sparkline9-graph">
                                <div id="pwd-container4">
                                    <form method="post" action="../servidor/c_funcionario.php" id="formFuncionario" enctype="multipart/form-data">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6" >
                                            <label for="nome" class="control-label">Nome</label>
                                            <input type="text" class="form-control vento" id="nome" name="nome" autocomplete="off" placeholder="Nome do funcionário" required>
                                            <span class="limpa">x</span>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                            <label for="sexo">Sexo</label>
                                            <div class="form-select-list vento">
                                                <select class="form-control custom-select-value" id="sexo" name="sexo">
                                                    <option value="M">Masculino</option>
                                                    <option value="F">Feminino</option>
                                                </select>
                                            </div><span class="limpa">x</span>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                            <label for="perfil">Foto</label>
                                            <input type="file" class="form-control vento" id="perfil_func" name="perfil" accept=".jpg,.jpeg,.png" required>
                                            <span class="limpa">x</span><em><span class="arq" id="arqPerfil"></span></em>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                            <label for="f_declaracao">Declaração escolar</label>
                                            <input type="file" class="form-control vento" id="f_declaracao" name="f_declaracao" accept="application/pdf" required>
                                            <span class="limpa">x</span><em><span class="arq" id="arqDeclaracao"></span></em>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                            <label for="f_iban">IBAN</label>
                                            <input type="file" class="form-control vento" id="f_iban" name="f_iban" accept="application/pdf" required>
                                            <span class="limpa">x</span><em><span class="arq" id="arqIban"></span></em>
                                        </div>
                                    
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                            <label for="f_copia_bi">Cópia do BI</label>
                                            <input type="file" class="form-control vento" id="f_copia_bi" name="f_copia_bi" accept="application/pdf" required>
                                            <span class="limpa">x</span><em><span class="arq" id="arqBI"></span></em>
                                        </div>
                                        <div class="form-group col-lg-3 col-md-3 col-sm-6">
                                            <label for="banco">Banco</label>
                                            <div class="form-select-list vento">
                                                <select class="form-control custom-select-value" id="banco" name="banco">
                                                    <?php 
                                                        $ver = Banco::findBySql(con(), "SELECT * FROM banco");
                                                        foreach ($ver as $i):
                                                    ?>
                                                    <option value="<?php echo $i->getId();?>"><?php echo $i->getNome();?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div><span class="limpa">x</span>
                                        </div>
                                        <div class="form-group col-lg-3 col-md-3 col-sm-6">
                                            <label for="iban_escrito">IBAN escrito</label>
                                            <input type="tel" maxlength="21" class="form-control vento" id="iban_escrito" name="iban_escrito" autocomplete="off" required>
                                            <span class="limpa">x</span>
                                        </div>
                                        
                                        <div class="form-group col-lg-3 col-md-3 col-sm-6">
                                            <label for="n_bi">Nº BI</label>
                                            <input type="text" maxlength="13" class="form-control vento" id="n_bi" name="n_bi" placeholder="**************" autocomplete="off" required>
                                        </div>
                                        <div class="form-group col-lg-3 col-md-3 col-sm-6">
                                            <label for="validade">Data de validade</label>
                                            <input type="date" maxlength="13" class="form-control vento" id="validade" name="validade" required>
                                            <span class="limpa">x</span>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                            <label for="f_atestado_medico">Atestado médico</label>
                                            <input type="file" class="form-control vento" id="f_atestado_medico" name="f_atestado_medico" accept="application/pdf" required>
                                            <span class="limpa">x</span><em><span class="arq" id="arqAtestado"></span></em>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                            <label for="f_boletim_sanidade">Boletim de sanidade</label>
                                            <input type="file" class="form-control vento" id="f_boletim_sanidade" name="f_boletim_sanidade" accept="application/pdf" required>
                                            <span class="limpa">x</span><em><span class="arq" id="arqBoletim"></span></em>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label for="cargo">Cargo</label>
                                            <div class="form-select-list vento">
                                                <select class="form-control custom-select-value" id="cargo" name="cargo">
                                                    <?php 
                                                        $ver1 = Cargo::findBySql(con(), "SELECT * FROM cargo");
                                                        foreach ($ver1 as $i):
                                                    ?>
                                                    <option value="<?php echo $i->getId();?>"><?php echo $i->getNome();?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-6">
                                            <label for="tel" class="control-label">Teleone</label>
                                            <input type="tel" class="form-control vento" data-mask="(+244) 999-999-999" id="tel" name="tel" placeholder="(+244) 9**-***-***" autocomplete="off">
                                        </div>
                                        
                                        <div class="form-group col-lg-3 col-md-3 col-sm-3">
                                            <label for="salario" class="control-label">Salário </label>
                                            <input type="number" name="salario" class="form-control vento" id="salario" min="50000" value="50000"  autocomplete="off" required>
                                            <span class="limpa">x</span>
                                        </div>
                                            
                                        <div class=" login-horizental">
                                            <button class="btn btn-sm btn-primary login-submit-cs center-block vento" id="enviar" onclick="cadastrarFuncionario('formFuncionario')"  type="submit">Guardar</button>
                                            <img class="pull-right" style="height: 26px;margin-top: -25px" id="progresso">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Password meter End-->
        <!-- Area da notificação -->
            <input type="hidden" id="basicWarningPosition_funcionario_inserir">
        <!-- End notificação -->
        </div>
        <!-- Area do footer -->
        <?php include_once '../importante/footer.php'; ?> 
        <!-- notification JS -->
        <?php include_once '../importante/notificacao_footer.php'; ?>
        <!-- Area do AJAX -->
        <script src="../servidor/ajax/c_funcionario.js"></script>
        
        
    </body>

</html>