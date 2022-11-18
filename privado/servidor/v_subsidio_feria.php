<?php 
    include_once 'conectar.php';
?>
   <thead>
        <tr>
            <th data-field="id">Nº</th>
            <th data-field="name" >NOMES COMPLETOS</th>
            <th data-field="categoria">CATEGORIA</th>
            <th data-field="salario">SALÁRIO <br> BASE</th>
            <th data-field="sub">SUBSÍDIO DE<br> FÉRIA</th>
            <th data-field="beneficiario">Nº DE <br> BENEFICIÁRIO</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            //Pega a data da comboBox Selecionada
            $dataSelec = $_GET["data"];
            $subsidio_feria = SubsidioFeria::findBySql(con(), "SELECT * FROM subsidio_feria ORDER BY data_emissao");
            $ver = Cargo::findBySql(con(), "SELECT * FROM cargo ORDER BY nome");
            $id = 0; $saldo = 0;$sb=0;$beneficio=0;
            foreach ($subsidio_feria as $i):
            //Mostra somente o ano e o mes 
            $dataAd = $i->getDataEmissao();
            $dataAdmissao = substr($dataAd,0,7);
            //Verifica se a data da base de dado é igual a data do selected
            if($dataAdmissao == $dataSelec){
                $funcionario = Funcionario::findById(con(), $i->getFuncionarioId());   
                $saldo += $funcionario->getSalarioBase();
                $cargo = Cargo::findById(con(), $funcionario->getCargoId());$pega=0;
                foreach ($ver as $c) {
                    //Verifica se o cargo foi eliminado
                    if($funcionario->getCargoId() == $c->getId()){$pega=1;}
                }
                if($pega == 1){
        ?>
        <tr>
            <td><?php echo ++$id ?> </td>
            <td><?php echo $funcionario->getNome() ?></td>
            <td><?php echo $cargo->getNome() ?></td>
            <td><?php echo $funcionario->getSalarioBase() ?></td>
            <td><?php echo $i->getSubsidio() ?> </td>
            <td><?php echo $i->getNBeneficiario() ?> </td>
        </tr>
        <?php 
            //Guarda o total 
            $sb = $i->getSubsidio();
            $beneficio += $i->getNBeneficiario();
            }
        }
        endforeach; ?>
        <tr>
            <td colspan="2"></td>
            <td><b>TOTAL</b></td>
            <td><b> <?php echo $saldo.",00 Kz" ?> </b></td>
            <td><b> <?php echo $sb.",00 Kz" ?> </b></td>
            <td><b> <?php echo $beneficio.",00 Kz" ?> </b></td>
        </tr>
    </tbody>
