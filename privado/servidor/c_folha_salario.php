<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    $data = date("Y-m");
    $dataAdmissao = date("Y-m-d");
    $funcionario = Funcionario::findBySql(con(), "SELECT * FROM funcionario");
    $presenca = Presenca::findBySql(con(), "SELECT * FROM presenca ORDER BY funcionario_id");
    /*Notificação
     *funcionario_id (código):
     * 5 = nova folha de salário 
     * 6 = nova folha com bônus
     * rN = é o contador de total de funcionário que sofreram remuneração
     **/
    /*=========================================== End FORMULA ==============================================*/
    if(isset($_POST['id'])){$rN=0;
        /*=========================================== REMUNERAÇÃO (BÔNUS)==============================================*/
        $ID = $_POST['id'];
        $remuneracao = $_POST['remuneracao'];$cont=0;
    
        for($i=0;count($ID)>$i;$i++){
            //Verifica se o Number do input está void recebe zero e adiciona zero (para evitar erro nos calculos)
            if(empty($remuneracao[$i])){$remuneracao[$i]=0;}
            //Verifica se o Number do input é diferente de zero (NF)
            if(!empty($remuneracao[$i])){++$rN;}
            $totalFalta=0;$cont++;
            foreach ($presenca as $f) {
                $dataD = $f->getDataFalta();
                //substr -> Pega o ano e o mes e deixa o dia
                $data_db = substr($dataD,0,7);
                //Verifica se o id funcionário não está void
                    
                //Verifica se o id do func da presença é igual ao id do Funcionário
                if($f->getFuncionarioId() == $ID[$i] && $data_db == $data){
                    //Pega o total de falta de cada funcionário
                    ++$totalFalta;
                }
            }
            foreach ($funcionario as $func2) {
                //======================= RESEVADO PARA A FORMULA DO SALÁRIO
                //number_format => Serve para formatar os números de acordo com a vírgula,separador de miliar e as casas decimais
                //(duas casas decimais uma vírgula e um ponto).number_format($func2->getSalarioBase(),2,",",".");
                if($func2->getEstado() == 0){
                    if($func2->getId() == $ID[$i]){
                        $saldo = $func2->getSalarioBase();
                        $result = ($saldo*8)/100;
                        $result2 = ($saldo*3)/100;
                        $desconto = ($saldo-($totalFalta*1000))+$remuneracao[$i];
                        // CADASTRA A FOLHA DE SALÁRIO
                        $folha_salario = new FolhaSalario();
                        $folha_salario->setFuncionarioId($func2->getId());
                        $folha_salario->setDataAdmissao($dataAdmissao);
                        $folha_salario->setNFalta($totalFalta);
                        $folha_salario->setRemuneracaoAdicional($remuneracao[$i]);
                        $folha_salario->setOitoSobreLiquido($result);
                        $folha_salario->setTresSobreLiquido($result2);
                        $folha_salario->setNBeneficiario($desconto);
                        $folha_salario->insertIntoDatabase(con());
                    }
                }
            }
        }
        /*=========================================== End REMUNERAÇÃO ==============================================*/
        /************************************ CADASTRO DE NOTIFICAÇÃO *****************************************/
            $descricao = "$rN funcionários receberam uma remuneração na nova folha de salário.";
            $notificacao = new NotificacaoSalario();
            $notificacao->setFuncionarioId(6);
            $notificacao->setDescricao($descricao);
            $notificacao->setPesquisa("Remuneração");
            $notificacao->insertIntoDatabase(con());
        /********************************************** END  **************************************************/
        returnAjax($r, '0');
    /*=========================================== FOLHA DE SALÁRIO SEM O BÔNUS ==============================================*/
    }else{
        /*=========================================== PEGA O TOTAL DE FALTAS ==============================================*/
       
        foreach ($funcionario as $func){
            //Verifica o estado do funcioário
            if($func->getEstado() == 0){
                $totalFalta=0;
                foreach ($presenca as $f) {
                    $dataD = $f->getDataFalta();
                    //substr -> Pega o ano e o mes e deixa o dia
                    $data_db = substr($dataD,0,7);

                    //Verifica se o id do func da presença é igual ao id do Funcionário
                    if($f->getFuncionarioId() == $func->getId() && $data_db == $data){
                        //Pega o total de falta de cada funcionário
                        ++$totalFalta;
                    }
                }
                //======================= RESEVADO PARA A FORMULA DO SALÁRIO
                //number_format => Serve para formatar os números de acordo com a vírgula,separador de miliar e as casas decimais
                //(duas casas decimais uma vírgula e um ponto).
                $saldo = $func->getSalarioBase();
                $result = ($saldo*8)/100;
                $result2 = ($saldo*3)/100;
                $desconto = $saldo-($totalFalta*1000);
                // CADASTRA A FOLHA DE SALÁRIO
                $folha_salario = new FolhaSalario();
                $folha_salario->setFuncionarioId($func->getId());
                $folha_salario->setDataAdmissao($dataAdmissao);
                $folha_salario->setNFalta($totalFalta);
                $folha_salario->setRemuneracaoAdicional(0);
                $folha_salario->setOitoSobreLiquido($result);
                $folha_salario->setTresSobreLiquido($result2);
                $folha_salario->setNBeneficiario($desconto);
                $folha_salario->insertIntoDatabase(con());
            }
        }
        /*=========================================== End TOTAL ==============================================*/
        /************************************ CADASTRO DE NOTIFICAÇÃO *****************************************/
            $descricao = "Uma nova folha de salário foi cadastrada.";
            $notificacao = new NotificacaoSalario();
            $notificacao->setFuncionarioId(5);
            $notificacao->setDescricao($descricao);
            $notificacao->setPesquisa("Folha de Salário");
            $notificacao->insertIntoDatabase(con());
        /********************************************** END  **************************************************/
        returnAjax($r, '0');
    }

