<?php
    include_once 'conectar.php';
    include_once '../importante/table_header.php';
?>

    <table id="table" data-toggle="table" data-search="true" data-show-columns="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
    data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
    <thead>
        <tr>
            <th data-field="id">Nº</th>
            <th data-field="name" data-editable="false">Cargos</th>
            <th data-field="opcao" data-editable="false">Opções</th>
        </tr>
    </thead>
    <tbody> 
        <?php 
            //Ver os usuarios
            $query = "SELECT * FROM cargo ORDER BY nome";
            $ver = Cargo::findBySql(con(), $query);
            //id_botao - conta o index dos botões
            $id_botao = 0;
            //id - conta o index do usuário
            $id = 0;
            foreach ($ver as $i):
            ?>       
                <tr>
                    <td><?php echo ++$id; ?></td>
                    <td class="tdnome"><?php echo $i->getNome(); ?></td>                        
                    <td class="datatable-ct">
                        <button class="btn-link" id="enviar" type="submit" onclick="eliminarCargo('<?php echo $i->getId(); ?>')"><i class="fa fa-trash-o" style="color: red;"></i></button>

                        <button type="button"  data-toggle="modal" data-target="#editaModal" onclick="modelEdita('<?php echo $i->getId(); ?>','<?php echo $i->getNome(); ?>')">
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