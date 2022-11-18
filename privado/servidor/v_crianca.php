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
                <th data-field="name">Nome</th>
                <th data-field="usuario" >Sexo</th>
                <th data-field="email">Idade</th>
                <th data-field="date" >Date de cadastro</th>
                <th data-field="img" >Foto</th>
                <th data-field="action">Opção</th>
            </tr>
        </thead>
        <tbody>
            <?php
             //Ver as crianças
                $query = "SELECT * FROM crianca ORDER BY nome";
                $ver = Crianca::findBySql(con(), $query);
                //id - conta o index do criança
                $id = 0;
                foreach ($ver as $i):
                    if($i->getEstado() == 0){
            ?>       
                <tr>
                    <td><?php echo ++$id ?></td>
                    <td><?php echo $i->getNome() ?></td>
                    <td><?php echo $i->getSexo() ?></td>
                    <td><?php echo $i->getIdade() ?></td>
                    <td><?php echo $i->getDataCadastro() ?></td>
                    <td><a href="perfil_crianca.php?id=<?php echo $i->getId()?>"><img src="<?php echo $i->getFoto() ?>" style="height: 30px"></a></td>
                    <td>
                        <button class="btn-link" type="submit" onclick="eliminarCrianca('<?php echo $i->getId(); ?>')" style="color:red">
                           <i class="fa fa-trash-o" ></i>
                       </button> 
                    </td>
                </tr>
                <?php } endforeach; ?>
        </tbody>
    </table>

<?php include_once '../importante/table_footer.php'; ?>