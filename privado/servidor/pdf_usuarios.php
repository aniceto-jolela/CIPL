<?php	
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $usuario = Usuario::findBySql(con(), "SELECT * FROM usuario ORDER BY nome");
    $id=0;$data = date("d/m/Y");
    $html="<html lang='pt'>";
    $html.="<head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='../importante/pdf_estilo.css'>
        </head>";
    $html.="<body><center><img src='../../img/logo/logo2.png' id='foto'></center>";
    $html.="<h3>DADOS DOS USUÁRIOS</h3>";
    $html.="<p id='data'>".$data."</p>";
    $html.="<table id='tabela'>";
    $html.="<tr>
                <th>Nº</th>
                <th>Nome</th>
                <th>Usuario</th>
                <th>Sexo</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Modulo</th>
            </tr>";
    foreach ($usuario as $i){
        $mod = Modulo::findById(con(),$i->getIdModulo() );
        $html.="<tr>";
        $html.="<td>".++$id."</td>";
        $html.="<td>".$i->getNome()."</td>";
        $html.="<td>".$i->getUsuario()."</td>";
        $html.="<td>".$i->getSexo()."</td>";
        $html.="<td>".$i->getEmail()."</td>";
        $html.="<td>".$i->getTelefone()."</td>";
        $html.="<td>".$mod->getNome()."</td>";
        $html.="</tr>";
    }
    $html.="</table>";
    $html.="</body></html>";
    
    

    // include autoloader
    require_once("../dompdf/autoload.inc.php");
    
    //referenciar o DomPDF com namespace para evitar erros
    use Dompdf\Dompdf;

    //Criando a Instancia
    $dompdf = new DOMPDF();

    // Carrega seu HTML
    $dompdf->loadHtml($html);
    //dados do documento destino
    //$dompdf->setPaper("A4","portrail");
    //Renderizar o html documento destino
    $dompdf->render();

    //Exibibir a página
    $dompdf->stream(
            "usuarios",
            array(
                    "Attachment" => FALSE //Para realizar o download somente alterar para true
            )
    );
?>