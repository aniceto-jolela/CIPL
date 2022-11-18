<?php include_once '../importante/relogio.php'; ?>
<style>
    #notifica{
        background: red;font-size:13px;width: 20px;text-align: center;margin-left: -5px;border-radius: 100%;
        color: white;
    }
</style>
<div class="header-top-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-top-wraper">
                    <div class="row">
                        <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                            <div class="menu-switcher-pro">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                    <i class="educate-icon educate-nav"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
                            <div class="header-right-info">
                                <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                    <!-- Notificação -->
                                    <li><span id="rel"></span></li>
                                    <li class="nav-item">
                                        <a href="notificacao.php" title="Mostra todas alterações de salário que o gestor de pesssoal fazer.">
                                            <i class="educate-icon educate-bell" aria-hidden="true"></i>
                                            <span class="indicator-nt">
                                                <div id="notifica"><!-- Onde vai aparecer o número da notificação --></div>
                                            </span>

                                        </a>
                                    </li>
                                    <!-- End notificação -->
                                    <li class="nav-item">
                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                            <img src="<?php echo $_SESSION['foto'] ?>" alt="" style="width:24px;height:24px" />
                                            <span class="admin-name"><?php echo $_SESSION['user'] ?></span>
                                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                        </a>
                                        <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                            <li><a href="perfil.php"><span class="edu-icon edu-user-rounded author-log-ic"></span>Meu perfil</a>
                                            </li>
                                            <li>
                                                <a href="../importante/sair.php">
                                                    <span class="edu-icon edu-locked author-log-ic"></span>Encerrar
                                                </a>
                                            </li>
                                        </ul>
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