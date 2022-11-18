<?php	
    //Conecta com a base de dados
    include_once 'conectar.php';
    $inclui = include_once '../importante/pdf_header_chart.php';
    $cargo = Cargo::findBySql(con(), "SELECT * FROM cargo ORDER BY nome");
    $id=0;$data = date("d/m/Y");
    $html="<html lang='pt'>";
    $html.="<head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='../importante/pdf_estilo.css'>
            ".$inclui."
        </head>";
    $html.="<body><center><img src='../../img/logo/logo2.png' id='foto'></center>";
    $html.="<h3>Estatistica</h3>";
    $html.="<h3>DADOS DOS CARGOS</h3>";
    $html.="<p id='data'>".$data."</p>";
    $html.="<table id='tabela'>";
    $html.="<tr>
                <th>Nº</th>
                <th>Nome</th>
            </tr>";
    foreach ($cargo as $i){
        $html.="<tr>";
        $html.="<td>".++$id."</td>";
        $html.="<td>".$i->getNome()."</td>";
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
            "cargos.pdf",
            array(
                    "Attachment" => false //Para realizar o download somente alterar para true
            )
    );
?>