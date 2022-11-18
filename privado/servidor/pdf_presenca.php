<?php	
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $presenca = Presenca::findBySql(con(), "SELECT * FROM presenca ORDER BY id");
    $id=0;$data = date("d/m/Y");
    $html="<html lang='pt'>";
    $html.="<head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='../importante/pdf_estilo.css'>
        </head>";
    $html.="<body><center><img src='../../img/logo/logo2.png' id='foto'></center>";
    $html.="<h3>RELATÓRIO <br> PRESENÇA DOS FUNCIONÁRIOS</h3>";
    $html.="<p id='data'>".$data."</p>";
    $html.="<table id='tabela'>";
    $html.="<tr>
                <th>Nº</th>
                <th>Nome</th>
                <th>Entrada</th>
                <th>Saída</th>
                <th>Obcervação</th>
                <th>Total de hora</th>
                <th>Falta</th>
                <th>Motivo</th>
                <th>Data</th>
            </tr>";
    foreach ($presenca as $i){
        $motivo = MotivoFalta::findById(con(), $i->getMotivoId());
        $funcionario = Funcionario::findById(con(), $i->getFuncionarioId());
        $html.="<tr>";
        $html.="<td>".++$id."</td>";
        $html.="<td>".$funcionario->getNome()."</td>";
        $html.="<td>".$i->getDataEntrada()."</td>";
        $html.="<td>".$i->getDataSaida()."</td>";
        $html.="<td>".$i->getObservacao()."</td>";
        $html.="<td>".$i->getTotalHora()."</td>";
        $html.="<td>".$i->getFalta()."</td>";
        
        if($motivo !=null){
            $html.="<td>".$motivo->getNome()."</td>";
        }else{ 
           $html.="<td></td>";
        }
        $html.="<td>".$i->getDataFalta()."</td>";
        $html.="</tr>";
    }
    $html.="</table>";
    $html.="</body></html>";
    
    
    //referenciar o DomPDF com namespace para evitar erros
    use Dompdf\Dompdf;

    // include autoloader
    require_once("../dompdf/autoload.inc.php");

    //Criando a Instancia
    $dompdf = new DOMPDF();

    // Carrega seu HTML
    $dompdf->load_html($html);
    //dados do documento destino
    //$dompdf->setPaper("A4","portrail");
    //Renderizar o html documento destino
    $dompdf->render();

    //Exibibir a página
    $dompdf->stream(
            "presenca.pdf",
            array(
                    "Attachment" => false //Para realizar o download somente alterar para true
            )
    );
?>