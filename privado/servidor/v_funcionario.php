<?php
    include_once 'conectar.php';
    include_once '../importante/table_header.php';
?>

    <!-- Tabela -->
    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
        data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
        <thead>
            <tr>
                <th data-field="id">Nº</th>
                <th data-field="name" >Nome</th>
                <th data-field="sexo" >Sexo</th>
                <th data-field="cargo" >Cargo</th>
                <th data-field="date" >Date de cadastro</th>
                <th data-field="img">Foto</th>
                <th data-field="action">Opção</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $ver = Funcionario::findBySql(con(), "SELECT * FROM funcionario ORDER BY nome");$id=0;
                $ver2 = Cargo::findBySql(con(), "SELECT * FROM cargo ORDER BY nome");
                foreach ($ver as $i):
                    if($i->getEstado() == 0){
                    $cargo = Cargo::findById(con(),$i->getCargoId());$pega=0;
            ?>
                <tr>
                    <td><?php echo ++$id ?></td>
                    <td><?php echo $i->getNome() ?></td>
                    <td><?php echo $i->getSexo() ?></td>
                    <td><?php
                        foreach ($ver2 as $c) {
                            //Verifica se o cargo foi eliminado
                            if($i->getCargoId() == $c->getId()){$pega=1;}
                        }
                        if($pega == 1){echo $cargo->getNome();
                        }else{echo "<em style='color:red'>Não definido</em>";}
                    ?></td>
                    <td><?php echo $i->getDataCadastro() ?></td>
                    <td><a href="perfil_funcionario.php?id=<?php echo $i->getId() ?>"><img src="<?php echo $i->getFoto() ?>" style="height: 30px"></a></td>
                    <td> 
                        <button class="btn-link" type="submit" onclick="eliminarFuncionario('<?php echo $i->getId(); ?>')" style="color: red;"><i class="fa fa-trash-o" ></i></button>
                    </td>
                </tr>
                    <?php }endforeach; ?>
        </tbody>
    </table>

<?php include_once '../importante/table_footer.php'; ?>