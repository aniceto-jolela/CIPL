<?php	
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $meses = array("JANEIRO","FEVEREIRO","MARÇO","ABRIL","MAIO","JUNHO","JULHO","AGOSTO","SETEMBRO","OUTUBRO","NOVEMBRO","DEZEMBRO");
    $m = date("m");$ano = date("Y");
    $mes = (substr($m,1))-1;
    if($mes<10){$data = $meses[$mes];
    }else{$data = $meses[$m];}
    
    /* ============================ CONTROLO DE TOTAL DE FOLHA... ======================================== */
    $BFS = FolhaSalario::findBySql(con(), "SELECT * FROM `folha_salario`");$folha=0;$dataAM=0;
    foreach ($BFS as $bf) {
        $MT2 = $bf->getDataAdmissao();
        $dAM_db2 = substr($MT2, 0,7);
        if($dataAM != $dAM_db2){
             //Conta o total de folha de salário
            if($_GET["cod"] >= $dAM_db2){
             $folha++;   
            }
        }$dataAM = $dAM_db2;
    }
    /* ============================ END TOTAL DE FOLHA... ======================================== */
    
    $html="<html lang='pt'>";
    $html.="<head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='../importante/pdf_estilo.css'>
        </head>";
    $html.="<body><center><img src='../../img/logo/republica.png' id='republica'></center>";
    $html.="<h3 style='text-decoration:none;'>REPÚBLICA DE ANGOLA</h3><h3 style='text-decoration:none;'>INSTITUTO NACIONAL DE SEGURANÇA SOCIAL</h3><br>";
    $html.="<p id='flh_n'>FOLHA Nº ".$folha."</p>";
    $html.="<div id='tabela_top'>
                <span>ACTIVIDADE: Centro Infantil</span> <span class='h_1'>Nº CONTRIB. DA S. SOCIAL</span><br>
                <span>Nome: Os Pequenos Líderes</span><br>
                <span>MORADA: Rua da Travessa da Maianga, casa nº 12</span> <span class='h_2'>Telefone: 924087454</span><br>
                <span>LOCALIDADE: Luanda</span> <span class='h_3'>NIF: 5417519146</span>
            </div>
            ";
    $html.="<p id='data'>FOLHA DE REMUNERAÇÃO REFERENTE AO MÊS DE ".$data." DE ".$ano." </p>";
    $html.="<table id='tabela'>";
    $html.="<tr>
                <th>Nº</th>
                <th>NOMES COMPLETOS</th>
                <th>CATEGORIA</th>
                <th>DATA DE <br> ADMISSÃO</th>
                <th>SALÁRIO <br> BASE</th>
                <th>Nº DE <br> FALTAS</th>
                <th>REMUNERAÇÃO <br> ADICIONAL</th>
                <th>8% SOBRE <br> LIQUIDO</th>
                <th>3% SOBRE <br> LIQUIDO</th>
                <th>Nº DE <br> BENEFICIÁRIO</th>
            </tr>";
            //Pega a data da comboBox Selecionada
            $dataSelec = $_GET["cod"];
            $folha_salario = FolhaSalario::findBySql(con(), "SELECT * FROM folha_salario ORDER BY funcionario_id");
            $ver = Cargo::findBySql(con(), "SELECT * FROM cargo ORDER BY nome");
            $id = 0; $saldo = 0;$falta=0;$remuneracao=0;$sL8=0;$sL3=0;$beneficio=0;
        foreach ($folha_salario as $i):
            //Mostra somente o ano e o mes 
            $dataAd = $i->getDataAdmissao();
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
                    $html.="<td>".$i->getDataAdmissao()."</td>";
                    $html.="<td>".$funcionario->getSalarioBase()."</td>";
                    $html.="<td>".$i->getNFalta()."</td>";
                    $html.="<td>".$i->getRemuneracaoAdicional()."</td>";
                    $html.="<td>".$i->getOitoSobreLiquido()."</td>";
                    $html.="<td>".$i->getTresSobreLiquido()."</td>";
                    $html.="<td>".$i->getNBeneficiario()."</td>";
                    $html.="</tr>";
                    //Guarda o total 
                    $falta += $i->getNFalta(); 
                    $remuneracao += $i->getRemuneracaoAdicional();
                    $sL8 += $i->getOitoSobreLiquido();
                    $sL3 += $i->getTresSobreLiquido();
                    $LT = $sL3+$sL8;
                    $beneficio += $i->getNBeneficiario();
                }
            }
        endforeach;
    $html.="</table><br><br>";
    $html.="<div id='tabela_bottom'>
                <span>Total dos Salários Líquidos</span> <span class='b_1'>".$LT.",00 Kz</span><br>
                <span>3% Sobre o Salário Liquido/Trabalhadores</span> <span class='b_2'>".$sL3.",00 Kz</span><br>
                <span>8% Sobre o Salário Líquido/Empresa</span> <span class='b_3'>".$sL8.",00 Kz</span><br>
                <span>Total de faltas</span> <span class='b_5'>".$falta."</span><br>
                <b><span>11% Total a Depositar</span> <span class='b_4'>".$beneficio.",00 Kz</span></b>
            </div>
            ";
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
    $dompdf->setPaper("A4","landscape");
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