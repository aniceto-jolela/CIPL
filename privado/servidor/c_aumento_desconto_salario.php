<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    $radioS = filter_input(INPUT_POST,'radioS',FILTER_SANITIZE_NUMBER_INT);
    $cargo = filter_input(INPUT_POST,'cargo',FILTER_SANITIZE_NUMBER_INT);
    $aumt_desc = $_POST['aumt_desc'];
    $data = date("Y-m-d");
    $cargS="";
    /*Notificação
     *funcionario_id (código):
     * 1 = aumento todos
     * 2 = aumento cargo
     * 3 = desconto todos
     * 4 = desconto cargo
     **/
    $funcionario = Funcionario::findBySql(con(), "SELECT * FROM funcionario");
    if($radioS == 0){
        //Aumento
        if(empty($cargo)){
            //Todos funcionários
            foreach($funcionario as $f) {
                $aumento = new Aumento();
                $aumento->setFuncionarioId($f->getId());
                $aumento->setAumento($aumt_desc);
                $aumento->setDataD($data);
                $aumento->insertIntoDatabase(con());
                //Edita o salário dos funcionários
                $data_cadastro = $f->getDataCadastro();
                $salario_base = $f->getSalarioBase()+$aumt_desc;
                $ID = $f->getId();
                $funcionario_edit = con()->prepare("UPDATE `funcionario` SET `salario_base`='$salario_base',`data_cadastro`='$data_cadastro' WHERE `id`=:IDfuncionario");
                $funcionario_edit->bindParam(":IDfuncionario",$ID);
                $funcionario_edit->execute();
            }
            /************************************ CADASTRO DE NOTIFICAÇÃO *****************************************/
                $descricao = "Todos funcionários receberam um aumento de $aumt_desc,00 Kz.";
                $notificacao = new NotificacaoSalario();
                $notificacao->setFuncionarioId(1);
                $notificacao->setDescricao($descricao);
                $notificacao->setPesquisa("Funcionários");
                $notificacao->insertIntoDatabase(con());
            /********************************************** END  **************************************************/
            //Sucesso ao cadastro o aumento de (Todos funcionários)
            returnAjax($r, '0');
        }else{
            //Cargo selecionado
            foreach($funcionario as $f1) {
                if($f1->getCargoId() == $cargo){
                    $aumento1 = new Aumento();
                    $aumento1->setFuncionarioId($f1->getId());
                    $aumento1->setAumento($aumt_desc);
                    $aumento1->setDataD($data);
                    $aumento1->insertIntoDatabase(con());
                    //Edita o salário dos funcionários
                    $data_cadastro = $f1->getDataCadastro();
                    $salario_base = $f1->getSalarioBase()+$aumt_desc;
                    $ID = $f1->getId();
                    $funcionario_edit = con()->prepare("UPDATE `funcionario` SET `salario_base`='$salario_base',`data_cadastro`='$data_cadastro' WHERE `id`=:IDfuncionario");
                    $funcionario_edit->bindParam(":IDfuncionario",$ID);
                    $funcionario_edit->execute();
                }
            }
            /************************************ CADASTRO DE NOTIFICAÇÃO *****************************************/
            $carg = Cargo::findBySql(con(),"SELECT * FROM cargo");
            foreach ($carg as $cg) {
                if($cargo==$cg->getId()){$cargS=$cg->getNome();}
            }
                $descricao1 = "Foi efectuado um aumento de $aumt_desc,00 Kz nos funcionários pertencente na categoria de $cargS.";
                $notificacao1 = new NotificacaoSalario();
                $notificacao1->setFuncionarioId(2);
                $notificacao1->setDescricao($descricao1);
                $notificacao1->setPesquisa("Cargos");
                $notificacao1->insertIntoDatabase(con());
            /********************************************** END  **************************************************/
            //Sucesso ao cadastro o aumento de (Cargo selecionado)
            returnAjax($r, '0');
        }
    }else{
        //Desconto
        if(empty($cargo)){
            //Todos funcionários
            foreach($funcionario as $f2) {
                //Verifica se o salário é maior ou igual ao desconto
                if($f2->getSalarioBase() >= $aumt_desc){
                    $desconto = new Desconto();
                    $desconto->setFuncionarioId($f2->getId());
                    $desconto->setDesconto($aumt_desc);
                    $desconto->setDataD($data);
                    $desconto->insertIntoDatabase(con());
                    //Edita o salário dos funcionários
                    $data_cadastro = $f2->getDataCadastro();
                    $salario_base = $f2->getSalarioBase()-$aumt_desc;
                    $ID = $f2->getId();
                    $funcionario_edit = con()->prepare("UPDATE `funcionario` SET `salario_base`='$salario_base',`data_cadastro`='$data_cadastro' WHERE `id`=:IDfuncionario");
                    $funcionario_edit->bindParam(":IDfuncionario",$ID);
                    $funcionario_edit->execute();
                }else{
                    //O Desconto é maior que o salário
                    returnAjax($r, '1');
                }
            }
            /************************************ CADASTRO DE NOTIFICAÇÃO *****************************************/
                $descricao = "Todos funcionários sofreram um desconto de $aumt_desc,00 Kz.";
                $notificacao = new NotificacaoSalario();
                $notificacao->setFuncionarioId(3);
                $notificacao->setDescricao($descricao);
                $notificacao->setPesquisa("Funcionários");
                $notificacao->insertIntoDatabase(con());
            /********************************************** END  **************************************************/
            //Todos funcionários DESCONTO
            returnAjax($r, '0');
        }else{
            //Cargo selecionado
            foreach($funcionario as $f3) {
                if($f3->getCargoId() == $cargo){
                    //Verifica se o salário é maior ou igual ao desconto
                    if($f3->getSalarioBase() >= $aumt_desc){
                        $desconto1 = new Desconto();
                        $desconto1->setFuncionarioId($f3->getId());
                        $desconto1->setDesconto($aumt_desc);
                        $desconto1->setDataD($data);
                        $desconto1->insertIntoDatabase(con());
                        //Edita o salário dos funcionários
                        $data_cadastro = $f3->getDataCadastro();
                        $salario_base = $f3->getSalarioBase()-$aumt_desc;
                        $ID = $f3->getId();
                        $funcionario_edit = con()->prepare("UPDATE `funcionario` SET `salario_base`='$salario_base',`data_cadastro`='$data_cadastro' WHERE `id`=:IDfuncionario");
                        $funcionario_edit->bindParam(":IDfuncionario",$ID);
                        $funcionario_edit->execute();
                    }else{
                        //O Desconto é maior que o salário
                        returnAjax($r, '1');
                    }
                }
            }
            /************************************ CADASTRO DE NOTIFICAÇÃO *****************************************/
            $carg = Cargo::findBySql(con(),"SELECT * FROM cargo");
            foreach ($carg as $cg) {
                if($cargo==$cg->getId()){$cargS=$cg->getNome();}
            }
                $descricao1 = "Todos funcionários pertencente na categoria de $cargS sofreram um desconto de $aumt_desc,00 Kz.";
                $notificacao1 = new NotificacaoSalario();
                $notificacao1->setFuncionarioId(4);
                $notificacao1->setDescricao($descricao1);
                $notificacao1->setPesquisa("Cargos");
                $notificacao1->insertIntoDatabase(con());
            /********************************************** END  **************************************************/
            //Cargo selecionado DESCONTO
            returnAjax($r, '0');
        }
    }



