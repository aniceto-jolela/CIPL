<?php 
    include_once 'conectar.php';
?>
    <thead>
        <tr>
            <th data-field="id">Nº</th>
            <th data-field="name" >NOMES COMPLETOS</th>
            <th data-field="categoria">CATEGORIA</th>
            <th data-field="remuneracao">REMUNERAÇÃO ADICIONAL</th>
        </tr>
    </thead>
    <tbody >
        <?php
            $ver = Funcionario::findBySql(con(), "SELECT * FROM funcionario ORDER BY nome");
            $ver2 = Cargo::findBySql(con(), "SELECT * FROM cargo ORDER BY nome");
            $data = date("d-m-Y");
            $id = 0; $saldo = 0;
            foreach ($ver as $i):
                //Verifica o estado do funcionario (activo = 0, eliminado=1)
                if($i->getEstado() == 0){
                $cargo = Cargo::findById(con(), $i->getCargoId());$pega=0;
                $saldo += $i->getSalarioBase(); 
                 foreach ($ver2 as $c) {
                    //Verifica se o cargo foi eliminado
                    if($i->getCargoId() == $c->getId()){$pega=1;}
                    }
                    if($pega == 1){
            ?>
            <tr>
                <td><?php echo ++$id ?> </td>
                <td>
                    <?php echo $i->getNome() ?>
                    <input type="hidden" value="<?php echo $i->getId() ?>" name="id[]">
                </td>
                <td><?php echo $cargo->getNome() ?></td>
                <td> <input type="number" min="0" value="0" name="remuneracao[]" class="remuneracao texto"> </td>
            </tr>
            <?php }}
        endforeach; 
        ?>
    </tbody>


