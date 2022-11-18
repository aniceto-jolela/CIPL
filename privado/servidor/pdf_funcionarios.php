<?php	
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $funcionario = Funcionario::findBySql(con(), "SELECT * FROM funcionario ORDER BY nome");
    $ver2 = Cargo::findBySql(con(), "SELECT * FROM cargo ORDER BY nome");
    $id=0;$data = date("d/m/Y");
    $html="<html lang='pt'>";
    $html.="<head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='../importante/pdf_estilo.css'>
        </head>";
    $html.="<body><center><img src='../../img/logo/logo2.png' id='foto'></center>";
    $html.="<h3>DADOS DOS FUNCIONÁRIOS</h3>";
    $html.="<p id='data'>".$data."</p>";
    $html.="<table id='tabela'>";
    $html.="<tr>
                <th>Nº</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Cargo</th>
                <th>Contacto</th>
                <th>Salário Base</th>
            </tr>";
    foreach ($funcionario as $i){
        if($i->getEstado() == 0){
            $cargo = Cargo::findById(con(), $i->getCargoId());$pega=0;
            foreach ($ver2 as $c) {
                //Verifica se o cargo foi eliminado
                if($i->getCargoId() == $c->getId()){$pega=1;}
            }
            if($pega == 1){$cargo2 = $cargo->getNome();}else{$cargo2="<em style='color:red'>Não definido</em>";}
            $html.="<tr>";
            $html.="<td>".++$id."</td>";
            $html.="<td>".$i->getNome()."</td>";
            $html.="<td>".$i->getSexo()."</td>";
            $html.="<td>".$cargo2."</td>";
            $html.="<td>".$i->getTelefone()."</td>";
            $html.="<td>".$i->getSalarioBase().",00 Kz</td>";
            $html.="</tr>";
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
            "funcionarios.pdf",
            array(
                    "Attachment" => false //Para realizar o download somente alterar para true
            )
    );
?>