<?php	
    //Conecta com a base de dados
    include_once 'conectar.php';
    
   
    $relatorio = EntradaSaida::findBySql(con(), "SELECT * FROM entrada_saida");
    $id=0;$data = date("d/m/Y");$dataV = date("Y-m-d");
    $html="<html lang='pt'>";
    $html.="<head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='../importante/pdf_estilo.css'>
        </head>";
    $html.="<body><center><img src='../../img/logo/logo2.png' id='foto'></center>";
    $html.="<h3>RELATÓRIO <br> ENTRADA E SAÍDA DAS CRIANÇAS</h3>";
    $html.="<p id='data'>".$data."</p>";
    $html.="<div id='corTb'>
                <div class='corTbEncAzul'></div>
                <span>Encarregado de entrada e de saída diferentes. </span><br>
                <div class='corTbEncVerde'></div>
                <span>Não fazem parte do sistema.</span><br>
                <div class='corTbEncVermelho'></div>
                <span>Não saiu.</span>
            </div>";
    $html.="<table id='tabela'>";
    $html.="<tr>
                <th>Nº</th>
                <th>Criança</th>
                <th>Encarregado</th>
                <th>Entrada</th>
                <th>BI</th>
                <th>Encarregado</th>
                <th>Saída</th>
                <th>BI</th>
            </tr>";
    foreach ($relatorio as $i){
         $par1 = "";$par2 = "";
        $datEM = $i->getDataEntrada();$dataDB = substr($datEM,0,10);
        $crianca= Crianca::findById(con(), $i->getCriancaId());
        if($i->getEncarregadoEntrada() != $i->getEncarregadoSaida() && empty($i->getFBi1()) && !empty($i->getEncarregadoSaida())){$core1 ="azul";}else{$core1="";}
        if($i->getEncarregadoEntrada() != $i->getEncarregadoSaida() && empty($i->getFBi2()) && !empty($i->getEncarregadoSaida())){$core2 ="azul";}else{$core2="";}
        if(empty($i->getEncarregadoSaida()) && $dataV > $dataDB){$core3 ="vermelho";}else{$core3="";}
        if(!empty($i->getFBi1())){$cor ="verde";$texto="sim";}else{$cor="";$texto="";}
        if(!empty($i->getFBi2())){$cor2 ="verde";$texto2="sim";}else{$cor2="";$texto2="";}
        
        $encarregado = Encarregado::findBySql(con(), "SELECT * FROM `encarregado`");
        foreach ($encarregado as $enc){
            $parente = Parente::findById(con(), $enc->getParenteId());
            if($enc->getNome() == $i->getEncarregadoEntrada()){$par1 = "(".$parente->getNome().")";}
            if($enc->getNome() == $i->getEncarregadoSaida()){$par2 = "(".$parente->getNome().")";}
        }
        
        $html.="<tr class='".$core3."'>";
        $html.="<td class='".$cor."".$core1."'>".++$id."</td>";
        $html.="<td class='".$cor."".$core1."'>".$crianca->getNome()."</td>";
        $html.="<td class='".$cor."".$core1."'>".$i->getEncarregadoEntrada()." ".$par1."</td>";
        $html.="<td class='".$cor."".$core1."'>".$i->getDataEntrada()."</td>";
        $html.="<td class='".$cor."".$core1."'>".$texto."</td>";
        $html.="<td class='".$cor2."".$core2."'>".$i->getEncarregadoSaida()." ".$par2."</td>";
        $html.="<td class='".$cor2."".$core2."'>".$i->getDataSaida()."</td>";
        $html.="<td class='".$cor2."".$core2."'>".$texto2."</td>";
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
            "relatorio.pdf",
            array(
                    "Attachment" => false //Para realizar o download somente alterar para true
            )
    );
?>