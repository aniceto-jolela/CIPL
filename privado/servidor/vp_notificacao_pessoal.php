<?php include_once 'conectar.php';  ?>

    <div class="table-responsive ib-tb">
        <table class="table table-hover table-mailbox">
            <tbody>
                <?php
                    $id=4;$ID = $_GET['pn'];
                    
                    $notificacao = con()->query("SELECT * FROM `notificacao_funcionario` n,`funcionario` f WHERE n.funcionario_id=f.id AND UPPER(f.nome) LIKE '$ID%'");
                    foreach($notificacao as $i):
                        $fundo="";
                        if($i["estado"] == 0){$fundo = "active";}
                        if($i["estado"] == 1){$activa = "";
                           echo "<script>v = document.getElementsByTagName('i')[$id].className='fa fa-eye-slash';</script>";
                        }
                ?>
                <tr class="<?php echo $fundo ?>" onclick="visto(<?php echo $id++ ?>,<?php echo $i["id"] ?>)">
                    <td colspan="2">
                        <img alt="Perfil" class="img-circle perfil" src="<?php echo $i["foto"] ?>">
                        <span class="nome"><?php echo $i["nome"] ?> </span>
                    </td>
                    <td>
                        <span><?php echo $i["descricao"] ?></span>
                    </td>
                    <td><i class="fa fa-eye v lk"></i></td>
                    <td class="text-right mail-date"><?php echo $i["data_n"] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


