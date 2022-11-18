<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    $data = date("Y-m");
    $dataEmissao = date("Y-m-d");
    $funcionario = Funcionario::findBySql(con(), "SELECT * FROM funcionario");
    /*Notificação
     *funcionario_id (código):
     * 8 = subsídio de 13º mês 
     * cN = é o contador de total de funcionário que recerberam subsídios
     **/
        $cN=0;$pega=0;
    if(isset($_POST['sub_tm'])){
        $tm_selec = $_POST['sub_tm'];
    
        for($a=0;count($tm_selec)>$a;$a++){
            foreach ($funcionario as $i):
                //Verifica se o ID da BD é igual oa selecionado
                if($i->getId() == $tm_selec[$a]){++$cN;
                    //================= RESEVADO PARA A FORMULA DO SUBSÍDIO =================
                    $s = $i->getSalarioBase();
                    $sb = ($s*50)/100;
                    $saldo = $sb + $s;
                    //======================= END FORMULA DO SUBSÍDIO =====================
                    // CADASTRA O SUBSÍDIO DE 13º MÊS
                    $subsidio_d_mes = new SubsidioDTerceiroMes();
                    $subsidio_d_mes->setFuncionarioId($i->getId());
                    $subsidio_d_mes->setSubsidio($sb);
                    $subsidio_d_mes->setNBeneficiario($saldo);
                    $subsidio_d_mes->setDataEmissao($dataEmissao);
                    $subsidio_d_mes->insertIntoDatabase(con());
                }
            endforeach;
            //Verifica se contador de notificaçao é maior que 1 (plural)
            if($cN>1){$pega=1;}
        }
        //Sucesso
        /************************************ CADASTRO DE NOTIFICAÇÃO *****************************************/
            if($pega == 1){
                $descricao = "$cN funcionários receberam os seus subsídios de 13º mês.";
                $notificacao = new NotificacaoSalario();
                $notificacao->setFuncionarioId(8);
                $notificacao->setDescricao($descricao);
                $notificacao->setPesquisa("Subsídio 13º mês");
                $notificacao->insertIntoDatabase(con());
            }else{
                $descricao2 = "$cN funcionário recebeu o seu subsídio de 13º mês.";
                $notificacao2 = new NotificacaoSalario();
                $notificacao2->setFuncionarioId(8);
                $notificacao2->setDescricao($descricao2);
                $notificacao2->setPesquisa("Subsídio 13º mês");
                $notificacao2->insertIntoDatabase(con());
            }
        /********************************************** END  **************************************************/
        returnAjax($r, '0');
    }else{
        //Void (Nenhum selecionado)
        returnAjax($r, '1');
    }