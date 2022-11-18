<?php
    //Conecta com a base de dados
    include_once 'conectar.php';

    $educador = $_POST['s_educador'];
    $turma = $_POST['s_turma'];
    $sala = $_POST['s_sala'];


    //Verifica se foi selecionado um educador
    if(!empty($educador)){
        //Verifica se foi selecionado uma criança
        if(isset($_POST['seleciona'])){
            $selecionado = $_POST['seleciona'];
            //Pega o total das crianças selecionadas
            for($a = 0;$a<count($selecionado);$a++){$total=$a;}
            //Cadastra as crianças selecionadas
            for($i = 0;$i<count($selecionado);$i++){
                $selecionar = $selecionado[$i];

                $organizar = new OrganizarCrianca();
                $organizar->setFuncionarioId($educador);
                $organizar->setCriancaId($selecionar);
                $organizar->setTurmaId($turma);
                $organizar->setSalaId($sala);

                if(!$organizar->insertIntoDatabase(con())){
                    //Erro ao cadastro
                    returnAjax($r, '1');
                }else{
                    if($total == $i){
                        //Sucesso ao cadastro
                        returnAjax($r, '0');
                    }
                }
            }
        }else{
            //Por favor seleciona uma criança
            returnAjax($r, '2');
        }
    }else{
        //Por favor seleciona um educador
        returnAjax($r, '3');
    }