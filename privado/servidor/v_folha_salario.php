<?php 
    include_once 'conectar.php';
?>
   <thead>
        <tr>
            <th data-field="id">Nº</th>
            <th data-field="name" >NOMES COMPLETOS</th>
            <th data-field="categoria">CATEGORIA</th>
            <th data-field="date">DATA DE <br> ADMISSÃO</th>
            <th data-field="salario">SALÁRIO <br> BASE</th>
            <th data-field="falta">Nº DE <br> FALTAS</th>
            <th data-field="remuneracao">REMUNERAÇÃO <br> ADICIONAL</th>
            <th data-field="oito">8% SOBRE <br> LIQUIDO</th>
            <th data-field="tres">3% SOBRE <br> LIQUIDO</th>
            <th data-field="beneficiario">Nº DE <br> BENEFICIÁRIO</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            //Pega a data da comboBox Selecionada
            $dataSelec = $_GET["data"];
            $folha_salario = FolhaSalario::findBySql(con(), "SELECT * FROM folha_salario ORDER BY funcionario_id");
            $ver = Cargo::findBySql(con(), "SELECT * FROM cargo ORDER BY nome");
            $id = 0; $saldo = 0;$falta=0;$remuneracao=0;$sL8=0;$sL3=0;$beneficio=0;
            foreach ($folha_salario as $i):
            //Mostra somente o ano e o mes 
            $dataAd = $i->getDataAdmissao();
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
            <td><?php echo $i->getDataAdmissao() ?></td>
            <td><?php echo $funcionario->getSalarioBase() ?></td>
            <td><?php echo $i->getNFalta() ?> </td>
            <td><?php echo $i->getRemuneracaoAdicional() ?> </td>
            <td><?php echo $i->getOitoSobreLiquido() ?> </td>
            <td><?php echo $i->getTresSobreLiquido() ?> </td>
            <td><?php echo $i->getNBeneficiario() ?> </td>
        </tr>
        <?php 
            //Guarda o total 
            $falta += $i->getNFalta(); 
            $remuneracao += $i->getRemuneracaoAdicional();
            $sL8 += $i->getOitoSobreLiquido();
            $sL3 += $i->getTresSobreLiquido();
            $beneficio += $i->getNBeneficiario();
            }
        }
        endforeach; ?>
        <tr>
            <td colspan="3"></td>
            <td><b>TOTAL</b></td>
            <td><b> <?php echo $saldo.",00 Kz" ?> </b></td>
            <td><b> <?php echo $falta ?> </b></td>
            <td><b> <?php echo $remuneracao.",00 Kz" ?> </b></td>
            <td><b> <?php echo $sL8.",00 Kz" ?> </b></td>
            <td><b> <?php echo $sL3.",00 Kz" ?> </b></td>
            <td><b> <?php echo $beneficio.",00 Kz" ?> </b></td>
        </tr>
    </tbody>
