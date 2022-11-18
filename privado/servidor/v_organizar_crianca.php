<?php
include_once 'conectar.php';
include_once '../importante/table_header.php';
?>
    <!-- Tabela -->
    <table id="table" data-toggle="table" data-search="true" data-key-events="true" data-resizable="true" data-cookie="true"
        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
        <thead>
            <tr>
                <th data-field="" data-checkbox="false"></th>
                <th data-field="id">ID</th>
                <th data-field="name" data-editable="false">NOME</th>
                <th data-field="idade" data-editable="false">IDADE</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $query = "SELECT * FROM crianca ORDER BY nome";
                $ver = Crianca::findBySql(con(), $query);

                $query1 = "SELECT * FROM organizar_crianca ORDER BY id ASC";
                $view = OrganizarCrianca::findBySql(con(), $query1);
                //Faz o controle das crianças que já foram organizadas
                $pega=0;$id = 0;
                //id - conta o index do criança

                foreach ($ver as $i):
                    if($i->getEstado() == 0){
                        
                    $id++;$pega=0;
                    foreach ($view as $i1){
                        if($i1->getCriancaId() == $i->getId()){$pega=1;}
                        }
                    if($pega!=1){
                ?>       
                    <tr>
                        <td> <input type="checkbox" name="seleciona[]" value="<?php echo $i->getId() ?>" > </td>
                        <td data-name="id"><?php echo $i->getId() ?></td>
                        <td data-name="nome"><?php echo $i->getNome() ?></td>
                        <td data-name="idade"><?php echo $i->getIdade() ?></td>
                    </tr>
                <?php 
                     } }endforeach;
            ?>
        </tbody>
    </table>
    
    <?php include_once '../importante/table_footer.php';?>