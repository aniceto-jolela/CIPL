<?php include_once 'conectar.php';  ?>

    <div class="table-responsive ib-tb">
        <table class="table table-hover table-mailbox">
            <tbody>
                <?php
                    $id=5;$ID = $_GET['pn'];
                    $notificacao = con()->query("SELECT * FROM `notificacao_salario` n WHERE UPPER(n.pesquisa) LIKE '$ID%'");
                    foreach ($notificacao as $i):
                        $activa="";$cor = "";$icon = "";$nome="";
                        //Verifica se a notificação foi lida ou não (1 sim, 0 não).
                        if($i["estado"] == 0){$activa = "active";}
                        if($i["estado"] == 1){$activa = "";
                            echo "<script>v = document.getElementsByTagName('i')[$id].className='fa fa-eye-slash';</script>";
                        }
                        
                        //Verifica o estado do funcionario_id  para mostrar a cor e o icon correspondente.
                        if($i["funcionario_id"] == 1){$cor = "perfil1";$icon = "fa fa-group";$nome="Funcionários";}
                        if($i["funcionario_id"] == 2){$cor = "perfil1";$icon = "fa fa-suitcase";$nome="Cargos";}
                        if($i["funcionario_id"] == 3){$cor = "perfil2";$icon = "fa fa-group";$nome="Funcionários";}
                        if($i["funcionario_id"] == 4){$cor = "perfil2";$icon = "fa fa-suitcase";$nome="Cargos";}
                        if($i["funcionario_id"] == 5){$cor = "perfil3";$icon = "fa fa-bar-chart";$nome="Folha de Salário";}
                        if($i["funcionario_id"] == 6){$cor = "perfil4";$icon = "fa fa-money";$nome="Remuneração";}
                        if($i["funcionario_id"] == 7){$cor = "perfil5";$icon = "fa fa-money";$nome="Subsídio de Féria";}
                        if($i["funcionario_id"] == 8){$cor = "perfil6";$icon = "fa fa-money";$nome="Subsídio 13º mês";}
                        if($i["funcionario_id"] == 9){$cor = "perfil7";$icon = "fa fa-money";$nome="Propína";}
                      

                ?>
                <tr class="<?php echo $activa ?>" onclick="visto(<?php echo $id++ ?>,<?php echo $i["id"] ?>)">
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
                        <span><?php echo $i["descricao"] ?></span>
                    </td>
                    <td><i class="fa fa-eye v lk" ></i></td>
                    <td class="text-right mail-date"><?php echo $i["data_n"] ?></td>
                </tr>
                <?php 
                    endforeach;
                ?>
            </tbody>
        </table>
    </div>


