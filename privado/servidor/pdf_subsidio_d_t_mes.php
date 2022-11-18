<?php	
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $meses = array("JANEIRO","FEVEREIRO","MARÇO","ABRIL","MAIO","JUNHO","JULHO","AGOSTO","SETEMBRO","OUTUBRO","NOVEMBRO","DEZEMBRO");
    $m = date("m");$ano = date("Y");
    $mes = (substr($m,1))-1;
    if($mes<10){$data = $meses[$mes];
    }else{$data = $meses[$m];}
    
    $subsidio = SubsidioDTerceiroMes::findBySql(con(), "SELECT * FROM `subsidio_d_terceiro_mes` ORDER BY data_emissao");
    $ver = Cargo::findBySql(con(), "SELECT * FROM cargo ORDER BY nome");
    $id = 0; $saldo = 0;$sb=0;$beneficio=0;
    //Pega a data da comboBox Selecionada
    $dataSelec = $_GET["cod"];
    $html="<html lang='pt'>";
    $html.="<head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='../importante/pdf_estilo.css'>
        </head>";
    $html.="<body><center><img src='../../img/logo/republica.png' id='republica'></center>";
    $html.="<h3 style='text-decoration:none;'>REPÚBLICA DE ANGOLA</h3><h3 style='text-decoration:none;'>INSTITUTO NACIONAL DE SEGURANÇA SOCIAL</h3><br>";
    $html.="<div id='tabela_top2'>
                <span>ACTIVIDADE: Centro Infantil</span> <span class='h_sub1'>Nº CONTRIB. DA S. SOCIAL</span><br>
                <span>Nome: Os Pequenos Líderes</span><br>
                <span>MORADA: Rua da Travessa da Maianga, casa nº 12</span> <span class='h_sub2'>Telefone: 924087454</span><br>
                <span>LOCALIDADE: Luanda</span> <span class='h_3'>NIF: 5417519146</span>
            </div>
            ";
    $html.="<p id='data'>SUBSÍDIO DE 13º MÊS REFERENTE AO MÊS DE ".$data." DE ".$ano." </p>";
    $html.="<table id='tabela'>";
    $html.="<tr>
                <th>Nº</th>
                <th>Nomes Completos</th>
                <th>Categoria</th>
                <th>Salário Base</th>
                <th>Subsídio De 13º MÊS</th>
                <th>Nº De Beneficiário</th>
                <th>Data De Emissão</th>
            </tr>";
    foreach ($subsidio as $i){
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
                $html.="<tr>";
                $html.="<td>".++$id."</td>";
                $html.="<td>".$funcionario->getNome()."</td>";
                $html.="<td>".$cargo->getNome()."</td>";
                $html.="<td>".$funcionario->getSalarioBase()."</td>";
                $html.="<td>".$i->getSubsidio()."</td>";
                $html.="<td>".$i->getNBeneficiario()."</td>";
                $html.="<td>".$i->getDataEmissao()."</td>";
                $html.="</tr>";
                
                //Guarda o total 
                $sb = $i->getSubsidio();
                $beneficio += $i->getNBeneficiario();
            }
        }
    }
    //number_format => Serve para formatar os números de acordo com a vírgula,separador de miliar e as casas decimais
    //(duas casas decimais uma vírgula e um ponto).number_format($func2->getSalarioBase(),2,",",".");
    $html.="<tr>";
    $html.="<td colspan='2'></td>";
    $html.="<td><b>TOTAL</b></td>";
    $html.="<td><b>".number_format($saldo,2,",",".")." Kz</b></td>";
    $html.="<td><b>".number_format($sb,2,",",".")." Kz</b></td>";
    $html.="<td><b>".number_format($beneficio,2,",",".")." Kz</b></td>";
    $html.="<td></td>";
    $html.="</tr>";
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
            "usuarios.pdf",
            array(
                    "Attachment" => false //Para realizar o download somente alterar para true
            )
    );
?>