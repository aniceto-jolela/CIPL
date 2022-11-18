<?php	
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $uniao = Uniao::findBySql(con(), "SELECT * FROM uniao ORDER BY crianca_id");
    $cri = Crianca::findBySql(con(), "SELECT * FROM `crianca` ORDER BY id");
    $id=0;$data = date("d/m/Y");
    $html="<html lang='pt'>";
    $html.="<head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='../importante/pdf_estilo.css'>
        </head>";
    $html.="<body><center><img src='../../img/logo/logo2.png' id='foto'></center>";
    $html.="<h3>DADOS DAS CRIANÇAS</h3>";
    $html.="<p id='data'>".$data."</p>";
    $html.="<table id='tabela'>";
    $html.="<tr>
                <th>Nº</th>
                <th>Nomes Completos</th>
                <th>Sexo</th>
                <th>Idade</th>
                <th>Encarregado</th>
                <th>Parentesco</th>
                <th>Telefone</th>
            </tr>";
    foreach ($cri as $c){$pega=0;
        foreach ($uniao as $i){
            if($i->getEstado() == 0){
                $encarregado = Encarregado::findById(con(), $i->getEncarregadoId());
                if($c->getId() == $i->getCriancaId()){
                    //Verifica se o encarregado tem mas de uma criança
                    if($pega==0){++$id;$pega=1;}
                }
                if($c->getId() == $i->getCriancaId() && $c->getEstado() == 0){

                    $parente = Parente::findById(con(),$encarregado->getParenteId());
                    $html.="<tr>";
                    $html.="<td>".$id."</td>";
                    $html.="<td>".$c->getNome()."</td>";
                    $html.="<td>".$c->getSexo()."</td>";
                    $html.="<td>".$c->getIdade()."</td>";
                    $html.="<td>".$encarregado->getNome()."</td>";
                    $html.="<td>".$parente->getNome()."</td>";
                    $html.="<td>".$encarregado->getTelefone()."</td>";
                    $html.="</tr>";
                }
            }
        }
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
            "criancas.pdf",
            array(
                    "Attachment" => false //Para realizar o download somente alterar para true
            )
    );
?>