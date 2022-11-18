<?php 
    include_once 'conectar.php';
?>
    <thead>
        <tr>
             <th data-field="id">Nº</th>
            <th data-field="name" >NOMES COMPLETOS</th>
            <th data-field="categoria">CATEGORIA</th>
            <th data-field="feria">13º MÊS | TODOS <input type="checkbox" id="sub_tm" onclick="subDTM()" class="lk"></th>
        </tr>
    </thead>
    <tbody >
        <?php 
            $funcionario = Funcionario::findBySql(con(), "SELECT * FROM funcionario ORDER BY nome");
            $subsidio_dTM = SubsidioDTerceiroMes::findBySql(con(), "SELECT * FROM `subsidio_d_terceiro_mes` ORDER BY data_emissao ");
            $ver = Cargo::findBySql(con(), "SELECT * FROM cargo ORDER BY nome");
            $id = 0; $ano = date("Y");
            foreach ($funcionario as $i):
                //Verifica o estádo do funcionário (se está activo ou eliminado do Syst)
                if($i->getEstado() == 0){
                $pega=0;
                $cargo = Cargo::findById(con(), $i->getCargoId());$pega2=0;
            foreach ($subsidio_dTM as $sb){
                //Pega simplismente o ano
                $an = $sb->getDataEmissao();
                $ano_db = substr($an,0,4);
                //Verifica se o funcID do subsídio for igual ao id do func
                if($i->getId() == $sb->getFuncionarioId()){
                    //Verifica se o ano da BD for iqual ao ano corrente
                    if($ano_db == $ano){
                        //Pega recebe 1 significa que este funcionário já recebeu o subsídio (não será mostrado)
                        //Daqui só proxímo ano
                        $pega=1;
                    }
                    //Verifica se o ano da BD for menor ao ano corrente
                    if($ano_db < $ano){$pega=0;}
                }
            }
            //Verifica se pega é iqual a 0 (caso sim) o funcionário será mostrado (ainda não recebeu subsídio)
            if($pega == 0){
        ?>
        <tr>
            <td><?php echo ++$id ?> </td>
            <td><?php echo $i->getNome() ?></td>
            <td><?php 
                foreach ($ver as $c) {
                    //Verifica se o cargo foi eliminado
                    if($i->getCargoId() == $c->getId()){$pega2=1;}
                }
                if($pega2 == 1){echo $cargo->getNome();
                }else{echo "<em style='color:red'>Não definido</em>";}
            ?></td>
            <td><input type="checkbox" class="sub_tm lk" name="sub_tm[]" value="<?php echo $i->getId() ?>" ></td>
        </tr>
            <?php }}endforeach; ?>
        <tr>
    </tbody>


