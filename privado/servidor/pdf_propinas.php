<?php	
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $pagamento = Pagamento::findBySql(con(), "SELECT * FROM `pagamento`");
    $id=0;$data = date("d/m/Y");$enc="";
    $html="<html lang='pt'>";
    $html.="<head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='../importante/pdf_estilo.css'>
        </head>";
    $html.="<body><center><img src='../../img/logo/logo2.png' id='foto'></center>";
    $html.="<h3>DADOS DOS CARGOS</h3>";
    $html.="<p id='data'>".$data."</p>";
    $html.="<table id='tabela'>";
    $html.="<tr>
                <th>Nº</th>
                <th>ºParentesco</th>
                <th>Encarregado</th>
                <th>Criança</th>
                <th>Código do Talão</th>
                <th>Data</th>
            </tr>";
    foreach ($pagamento as $i){
        $encarregado = Encarregado::findById(con(),$i->getEncarregadoId());
        $crianca = Crianca::findById(con(),$i->getCriancaId());
        $parente = Parente::findById(con(), $encarregado->getParenteId());
        //Verifica o id do Nº do encarregado (pra ser o mesmo se for semelhante).
        if($encarregado->getId() == $enc){$id;}else{++$id;}
        $enc = $i->getEncarregadoId();
        
        $html.="<tr>";
        $html.="<td>".$id."</td>";
        $html.="<td>".$parente->getNome()."</td>";
        $html.="<td>".$encarregado->getNome()."</td>";
        $html.="<td>".$crianca->getNome()."</td>";
        $html.="<td>".$i->getCodigo()."</td>";
        $html.="<td>".$i->getDataEmissao()."</td>";
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