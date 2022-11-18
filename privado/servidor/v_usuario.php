<?php
    include_once 'conectar.php';
    include_once '../importante/table_header.php';
?>

    <table id="table" data-toggle="table" data-search="true" data-show-columns="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
    data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
    <thead>
        <tr>
            <th data-field="id">Nº</th>
            <th data-field="name" >Nome</th>
            <th data-field="usuario">Usuário</th>
            <th data-field="sexo" >Sexo</th>
            <th data-field="email" >Email</th>
            <th data-field="phone" >Telefone</th>
            <th data-field="task" >Modulo</th>
            <th data-field="date" >Date de cadastro</th>
            <th data-field="img">Foto</th>
            <th data-field="action" >Opções</th>
        </tr>
    </thead>
    <tbody> 
        <?php 
            //Ver os usuarios
            $query = "SELECT * FROM usuario ORDER BY nome";
            $ver = Usuario::findBySql(con(), $query);
            //id_botao - conta o index dos botões
            $id_botao = 0;
            //id - conta o index do usuário
            $id = 0;
            foreach ($ver as $i):
                $mod = Modulo::findById(con(),$i->getIdModulo() );
                if(empty($i->getFoto())){
                    $foto = "../../img/usuarios/padrao/padrao.png";
                }else{$foto=$i->getFoto();}
            ?>       
                    <tr>
                        <td><?php echo ++$id ?></td>
                        <td class="tdnome"><?php echo $i->getNome(); ?></td>
                        <td class="tdusuario"><?php echo $i->getUsuario(); ?></td>
                        <td class="tdsexo"><?php echo $i->getSexo(); ?></td>
                        <td class="tdemail"><?php echo $i->getEmail(); ?></td>
                        <td class="tdtel"><?php echo $i->getTelefone(); ?></td>
                        <td class="tdmod"><?php echo $mod->getNome(); ?></td>
                        <td><?php echo $i->getDataCadastro(); ?></td>
                        <td class="tdfile"><img src="<?php echo $foto ?>" style="height: 30px" onclick="Model('<?php echo $foto ?>')"  data-toggle="modal" id="imagem" data-target="#img_arquivo" data-cod="<?php echo $i->getId(); ?>"></td>
                        <td class="datatable-ct">

                            <button class="btn-link" id="enviar" type="submit" onclick="eliminarUsuario('<?php echo $i->getId(); ?>')"><i class="fa fa-trash-o" style="color: red;"></i></button>

                            <button type="button"  data-toggle="modal" data-target="#editaModal" 
                                onclick="modelEdita('<?php echo $i->getId(); ?>','<?php echo $i->getNome(); ?>','<?php echo $i->getUsuario();?>','<?php echo $i->getSexo(); ?>','<?php echo $i->getEmail(); ?>','<?php echo $i->getTelefone(); ?>',
                                            '<?php echo $mod->getId(); ?>','<?php echo $foto; ?>','<?php echo $i->getDataCadastro(); ?>')">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                    </tr>
            <?php 
            //Controla a contagem da tabela
            $id_botao++;
            endforeach; ?>

    </tbody>
    </table>
<?php include_once '../importante/table_footer.php'; ?>