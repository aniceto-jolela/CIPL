<?php

include_once 'conectar.php';

$funcionario = $_GET['funcionario'];
$funcionario = (int)$funcionario;

/*============ Pega o totl de falta*/
    $total = 0;
    $ver = Presenca::findBySql(con(), "SELECT * FROM presenca");
    foreach ($ver as $i) {
        if($funcionario == $i->getFuncionarioId() && $i->getFalta() != null && empty($i->getObservacao())){
            $total +=1;
        }
    }

    $funcionarioBD = "";

    $funcionarioBD .= "<thead>";
    $funcionarioBD .= "<tr>";
    $funcionarioBD .= "<th> Total : <b style='color:red;'> $total </b> | RETIRAR</th>";
    $funcionarioBD .= "<th>DATA</th>";
    $funcionarioBD .= "</tr>";
    $funcionarioBD .= "</thead>";

    $ver = Presenca::findBySql(con(), "SELECT * FROM presenca ORDER BY data_falta");
    foreach ($ver as $i2) {
        if($funcionario == $i2->getFuncionarioId() && $i2->getFalta() != null && empty($i2->getObservacao())){
           $funcionarioBD .= "<tbody>";
            $funcionarioBD .= "<tr>";
            $funcionarioBD .= "<td><input type='checkbox' name='retirar[]' value='".$i2->getDataFalta()."'></td>";
            $funcionarioBD .= "<td>".$i2->getDataFalta()."</td>";
            $funcionarioBD .= "</tr>";
            $funcionarioBD .= "</tbody>";
        }
    }
/*End pega o totl de falta*/

echo $funcionarioBD;

