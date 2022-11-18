<?php	
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $meses = array("JANEIRO","FEVEREIRO","MARÇO","ABRIL","MAIO","JUNHO","JULHO","AGOSTO","SETEMBRO","OUTUBRO","NOVEMBRO","DEZEMBRO");
    $m = date("m");$ano = date("Y");
    $mes = (substr($m,1))-1;
    if($mes<10){$data = $meses[$mes];
    }else{$data = $meses[$m];}
    
    
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
    $html.="<p id='data'>DESCONTO DE SALÁRIO REFERENTE AO MÊS DE ".$data." DE ".$ano." </p>";
    $html.="<table id='tabela'>";
    $html.="<tr>
                <th>Nº</th>
                <th>NOMES COMPLETOS</th>
                <th>CATEGORIA</th>
                <th>SALÁRIO BASE</th>
                <th>DESCONTO</th>
                <th>NOVO SALÁRIO</th>
                <th>DATA DE EMISSÃO</th>
            </tr>";
            $desconto = Desconto::findBySql(con(), "SELECT * FROM `desconto` ORDER BY funcionario_id");
            $ver = Cargo::findBySql(con(), "SELECT * FROM cargo ORDER BY nome");
            $id = 0; $saldo = 0;$decont=0;$slAntigo=0;$beneficioTot=0;
        foreach ($desconto as $i):
            
            
            $funcionario = Funcionario::findById(con(), $i->getFuncionarioId());   
            $cargo = Cargo::findById(con(), $funcionario->getCargoId());$pega=0;
            $slAntigo = $i->getDesconto()+$funcionario->getSalarioBase();
            foreach ($ver as $c) {
                //Verifica se o cargo foi eliminado
                if($funcionario->getCargoId() == $c->getId()){$pega=1;}
            }
            if($pega == 1){$cargo2 = $cargo->getNome();}else{$cargo2="<em style='color:red'>Não definido</em>";}
                $html.="<tr>";
                $html.="<td>".++$id."</td>";
                $html.="<td>".$funcionario->getNome()."</td>";
                $html.="<td>".$cargo2."</td>";
                $html.="<td>".$slAntigo."</td>";
                $html.="<td>".$i->getDesconto()."</td>";
                $html.="<td>".$funcionario->getSalarioBase()."</td>";
                $html.="<td>".$i->getDataD()."</td>";
                $html.="</tr>";
            //Guarda o total 
            $saldo += $funcionario->getSalarioBase();
            $decont += $i->getDesconto(); 
            $beneficioTot += $i->getDesconto()+$funcionario->getSalarioBase();
        endforeach;
        $html.="<tr>";
            $html.="<td colspan='2'></td>";
            $html.="<td><b>TOTAL</b></td>";
            $html.="<td><b>".number_format($saldo,2,",",".")." Kz</b></td>";
            $html.="<td><b>".number_format($decont,2,",",".")." Kz</b></td>";
            $html.="<td><b>".number_format($beneficioTot,2,",",".")." Kz</b></td>";
            $html.="<td></td>";
        $html.="</tr>";
    $html.="</table><br><br>";
    $html.="</body></html>";
    
    //referenciar o DomPDF com namespace para evitar erros
    use Dompdf\Dompdf;

    // include autoloader
    require_once("../dompdf/autoload.inc.php");

    //decodificando o tipo charset do documento,
    //para evitar erros nos acentos das letras etc.
    
    
    //Criando a Instancia
    $dompdf = new DOMPDF();

    // Carrega seu HTML
    $dompdf->load_html($html);
    //Muda a orientação para horizontal (landscape)
    //$dompdf->setPaper("A4","landscape");
    //Renderizar o html documento destino
    $dompdf->render();
    
    

    //Exibibir a página
    $dompdf->stream(
            "folha_salario.pdf",
            array(
                    "Attachment" => false //Para realizar o download somente alterar para true
            )
    );
?>