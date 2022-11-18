<?php include_once 'conectar.php';  ?>

    <div class="table-responsive ib-tb">
        <table class="table table-hover table-mailbox">
            <tbody>
                <?php
                    $notificacao = NotificacaoCrianca::findBySql(con(), "SELECT * FROM `notificacao_crianca` ORDER BY id DESC");
                    $id=4;
                    foreach($notificacao as $i):
                        $crianca = Crianca::findById(con(), $i->getCriancaId());$fundo="";
                        if($i->getEstado() == 0){$fundo = "active";}
                        if($i->getEstado() == 1){$activa = "";
                           echo "<script>v = document.getElementsByTagName('i')[$id].className='fa fa-eye-slash';</script>";
                        }
                ?>
                <tr class="<?php echo $fundo ?>" onclick="visto(<?php echo $id++ ?>,<?php echo $i->getId() ?>)">
                    <td colspan="2">
                        <img alt="Perfil" class="img-circle perfil" src="<?php echo $crianca->getFoto() ?>">
                        <span class="nome"><?php echo $crianca->getNome() ?> </span>
                    </td>
                    <td>
                        <span><?php echo $i->getDescricao() ?></span>
                    </td>
                    <td><i class="fa fa-eye v lk"></i></td>
                    <td class="text-right mail-date"><?php echo $i->getDataN() ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


