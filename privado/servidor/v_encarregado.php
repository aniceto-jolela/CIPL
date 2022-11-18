<?php
    include_once 'conectar.php';
    include_once '../importante/select_header.php';
?>
    <div class="chosen-select-single mg-b-20">
        <label>Seleciona o Encarregado</label>
        <select data-placeholder="Seleciona o encarregado" name="select_encarregado" class="chosen-select vento" tabindex="-1">
            <?php 
                $ver1 = Encarregado::findBySql(con(), "SELECT * FROM encarregado ORDER BY nome");
                foreach ($ver1 as $i):
                    if($i->getEstado() == 0){
            ?>
            <option value="<?php echo $i->getId() ?>"><?php echo $i->getNome() ?></option>
            <?php }endforeach; ?>
        </select>
    </div>
<?php include_once '../importante/select_footer.php'; ?>