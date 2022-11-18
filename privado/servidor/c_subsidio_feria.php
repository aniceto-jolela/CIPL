<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    $data = date("Y-m");
    $dataEmissao = date("Y-m-d");
    $funcionario = Funcionario::findBySql(con(), "SELECT * FROM funcionario");
    /*Notificação
     *funcionario_id (código):
     * 7 = subsídio de féria 
     * cN = é o contador de total de funcionário que recerberam subsídios
     **/
        $cN=0;$pega=0;
    if(isset($_POST['sub_feria'])){
        $feria_selec = $_POST['sub_feria'];
    
        for($a=0;count($feria_selec)>$a;$a++){
            foreach ($funcionario as $i):
                //Verifica se o ID da BD é igual oa selecionado
                if($i->getId() == $feria_selec[$a]){++$cN;
                    //================= RESEVADO PARA A FORMULA DO SUBSÍDIO =================
                    $saldo = $i->getSalarioBase()+$i->getSalarioBase();
                    //======================= END FORMULA DO SUBSÍDIO =====================
                    // CADASTRA O SUBSÍDIO DE FÉRIA
                    $subsidio_feria = new SubsidioFeria();
                    $subsidio_feria->setFuncionarioId($i->getId());
                    $subsidio_feria->setSubsidio($i->getSalarioBase());
                    $subsidio_feria->setNBeneficiario($saldo);
                    $subsidio_feria->setDataEmissao($dataEmissao);
                    $subsidio_feria->insertIntoDatabase(con());
                }
            endforeach;
            //Verifica se contador de notificaçao é maior que 1 (plural)
            if($cN>1){$pega=1;}
        }
        //Sucesso
        /************************************ CADASTRO DE NOTIFICAÇÃO *****************************************/
            if($pega == 1){
                $descricao = "$cN funcionários receberam os seus subsídios de féria.";
                $notificacao = new NotificacaoSalario();
                $notificacao->setFuncionarioId(7);
                $notificacao->setDescricao($descricao);
                $notificacao->setPesquisa("Subsídio de Féria");
                $notificacao->insertIntoDatabase(con());
            }else{
                $descricao2 = "$cN funcionário recebeu o seu subsídio de féria.";
                $notificacao2 = new NotificacaoSalario();
                $notificacao2->setFuncionarioId(7);
                $notificacao2->setDescricao($descricao2);
                $notificacao2->setPesquisa("Subsídio de Féria");
                $notificacao2->insertIntoDatabase(con());
            }
        /********************************************** END  **************************************************/
        returnAjax($r, '0');
    }else{
        //Void (Nenhum selecionado)
        returnAjax($r, '1');
    }
    
    
    
    


    

