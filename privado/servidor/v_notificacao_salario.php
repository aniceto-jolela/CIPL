<?php include_once 'conectar.php';  ?>

    <div class="table-responsive ib-tb">
        <table class="table table-hover table-mailbox">
            <tbody>
                <?php
                    $notificacao = NotificacaoSalario::findBySql(con(), "SELECT * FROM notificacao_salario ORDER BY id DESC");
                    $id=5;
                    foreach ($notificacao as $i):
                        $activa="";$cor = "";$icon = "";$nome="";
                        //Verifica se a notificação foi lida ou não (1 sim, 0 não).
                        if($i->getEstado() == 0){$activa = "active";}
                        if($i->getEstado() == 1){$activa = "";
                            echo "<script>v = document.getElementsByTagName('i')[$id].className='fa fa-eye-slash';</script>";
                        }
                        //Verifica o estado do funcionario_id  para mostrar a cor e o icon correspondente.
                        if($i->getFuncionarioId() == 1){$cor = "perfil1";$icon = "fa fa-group";$nome="Funcionários";}
                        if($i->getFuncionarioId() == 2){$cor = "perfil1";$icon = "fa fa-suitcase";$nome="Cargos";}
                        if($i->getFuncionarioId() == 3){$cor = "perfil2";$icon = "fa fa-group";$nome="Funcionários";}
                        if($i->getFuncionarioId() == 4){$cor = "perfil2";$icon = "fa fa-suitcase";$nome="Cargos";}
                        if($i->getFuncionarioId() == 5){$cor = "perfil3";$icon = "fa fa-bar-chart";$nome="Folha de Salário";}
                        if($i->getFuncionarioId() == 6){$cor = "perfil4";$icon = "fa fa-money";$nome="Remuneração";}
                        if($i->getFuncionarioId() == 7){$cor = "perfil5";$icon = "fa fa-money";$nome="Subsídio de Féria";}
                        if($i->getFuncionarioId() == 8){$cor = "perfil6";$icon = "fa fa-money";$nome="Subsídio 13º mês";}
                        if($i->getFuncionarioId() == 9){$cor = "perfil7";$icon = "fa fa-money";$nome="Propína";}

                ?>
                <tr class="<?php echo $activa ?>" onclick="visto(<?php echo $id++ ?>,<?php echo $i->getId() ?>)">
                    <td colspan="2">
                        <div class="sumario">
                            <!-- Perfil da notificação -->
                            <span class="<?php echo $cor ?>">
                                <span class="<?php echo $icon ?>" ></span> <?php echo $nome ?>
                            </span>
                            <!-- End Perfil da notificação -->
                        </div>
                    </td>
                    <td>
                        <span><?php echo $i->getDescricao() ?></span>
                    </td>
                    <td><i class="fa fa-eye v lk" ></i></td>
                    <td class="text-right mail-date"><?php echo $i->getDataN() ?></td>
                </tr>
                <?php 
                    endforeach;
                ?>
            </tbody>
        </table>
    </div>


