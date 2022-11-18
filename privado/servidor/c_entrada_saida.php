<?php
    //Conexão
    include_once 'conectar.php';
    
//Verificação
$r_encarregado = $_POST['encarrregado'];
//Incrementa mas 1 em cada hora, para ser igual a hora actual do sistema
$h=date("H")+1;
if($h<10){$h= "0".$h;}
if($h==24){$h= "00";}
$data_entrada = date("Y-m-d");
$data_saida = date("Y-m-d $h:i:s");

    if($r_encarregado == 0){
        //------------------------------------------------------------------------------//
        //   /*-------------------- Encarregado selecionado (Habitual) ----------------*//
        //------------------------------------------------------------------------------//
        $encarregado = $_POST['s_encarregado'];
        if($encarregado != null){
            /*---------------------------------++++++++-------------------------------------//
             *--------------------------- Controlo de parentesco --------------------------*/
                $pPega = 0;
                $uniao = Uniao::findBySql(con(), "SELECT * FROM `uniao`");
                foreach($uniao as $u){
                    $ID_crianca = $_POST['id'];
                    $enca = Encarregado::findById(con(),$u->getEncarregadoId());
                    if($ID_crianca == $u->getCriancaId() && $encarregado == $enca->getNome()){
                        $pPega=1;break;
                    }
                }
            //------------------------------ END Controlo de parentesco --------------------------//
            if($pPega == 1){
                $ver = EntradaSaida::findBySql(con(), "SELECT * FROM entrada_saida");
                for($a=0;count($ver)>=$a;$a++){
                    $total=$a;
                    $ID_crianca = $_POST['id'];
                    if($ver == null){
                        //Cadastra se não tiver dados na base de dado
                        $E_S_0 = new EntradaSaida();
                        $E_S_0->setCriancaId($ID_crianca);
                        $E_S_0->setEncarregadoEntrada($encarregado);
                        $E_S_0->insertIntoDatabase(con());
                        //Sucesso ao cadastro
                        returnAjax($r, '0');
                    }
                }
                $cont = 0;
                $v=0;
                foreach ($ver as $i){
                $dataTM = $i->getDataEntrada();
                $dataTM1 = $i->getDataSaida();
                //substr -> Pega a data e deixa a hora
                $data_entrada_db = substr($dataTM,0,10);
                $data_saida_db = substr($dataTM1,0,10);
                    //Dado da criança
                    $ID_crianca = $_POST['id'];
                    $ID = $i->getCriancaId();
                    $INDEX = $i->getId();
                    $cont++;
                    //Verifica se o ID da criança selecionada é igual a da base de dados o mesmo com a data
                    if($ID_crianca == $ID && $data_entrada_db == $data_entrada){$v=1;$data_saida_v_db = substr($dataTM1,0,10);
                    }
                    /*========================= Horario da Entrada =========================*/
                    //-------------------------- Parte para cadastrar os dados ----------
                    if($total == $cont && $v != 1){
                        $E_S_1 = new EntradaSaida();
                        $E_S_1->setCriancaId($ID_crianca);
                        $E_S_1->setEncarregadoEntrada($encarregado);
                        $E_S_1->insertIntoDatabase(con());
                        //Sucesso ao cadastro retorna em JSON
                        returnAjax($r, '0');
                        break;
                    }
                    /*========================= Horario da Saída =========================*/
                    //-------------------------- Parte para editar os dados ----------
                    if($v == 1 && $data_saida_v_db == null){
                        //Dado da criança
                        $ID_crianca = $_POST['id'];
                        $E_S_2 = con()->prepare("UPDATE entrada_saida SET data_entrada='$dataTM',encarregado_saida='$encarregado',data_saida='$data_saida' WHERE id=:id_cianca");
                        $E_S_2->bindParam(":id_cianca",$INDEX);
                        $E_S_2->execute();
                        //Sucesso ao Editar retorna em JSON
                        returnAjax($r, '1');
                         break;
                    }else if($total == $cont){
                        //Erro ao executar actividade
                        returnAjax($r, '2');
                    }
            }
            }else{
                //Não foi possivel selecionar está criança. Verifique bem os dados do teu filho.
                returnAjax($r, '5');
            }
        }else{
            //Por favor seleciona um encarregado
            returnAjax($r, '3');
        }
        //------------------------------------------------------------------------------//
        //   /*-------------------------- Encarregado Opcional -----------------------*//
        //------------------------------------------------------------------------------//
    }else if($r_encarregado == 1){
        /*========================= Horario da Saída =========================*/
        //Verifica os campos se estão void
        if($_POST['ec_nome'] != null && !empty($_FILES['c_bi']['name'])){
            $nome = $_POST['ec_nome'];
            $c_bi = "../../img/encarregados/".$_FILES['c_bi']['name'];
            
            $ver1 = EntradaSaida::findBySql(con(), "SELECT * FROM entrada_saida");
            for($a=0;count($ver1)>=$a;$a++){
                $total=$a;
                $crianca_ID = $_POST['id'];
                if($ver1 == null){
                    //Cadastra se não tiver dados na base de dado
                    $E_S_0_0 = new EntradaSaida();
                    $E_S_0_0->setCriancaId($crianca_ID);
                    $E_S_0_0->setEncarregadoEntrada($nome);
                    $E_S_0_0->setFBi1($c_bi);
                    $E_S_0_0->insertIntoDatabase(con());
                    //Sucesso ao cadastro retorna em JSON
                    returnAjax($r, '0');
                }
            }
            $cont = 0;
            $v=0;
            foreach ($ver1 as $i){
                $dataTM = $i->getDataEntrada();
                $dataTM1 = $i->getDataSaida();
                //substr -> Pega a data e deixa a hora
                $data_entrada_db = substr($dataTM,0,10);
                $data_saida_db = substr($dataTM1,0,10);
                    //Dado da criança
                    $crianca_ID = $_POST['id'];
                    $ID = $i->getCriancaId();
                    $INDEX = $i->getId();
                    $cont++;
                    //Verifica se o ID da criança selecionada é igual a da base de dados o mesmo com a dadta
                    if($crianca_ID == $ID && $data_entrada_db == $data_entrada){$v=1;$data_saida_v_db = substr($dataTM1,0,10);}
                    /*========================= Horario da Entrada =========================*/
                    //-------------------------- Parte para cadastrar os dados ----------
                    if($total == $cont && $v != 1){
                        $E_S_3 = new EntradaSaida();
                        $E_S_3->setCriancaId($crianca_ID);
                        $E_S_3->setEncarregadoEntrada($nome);
                        $E_S_3->setFBi1($c_bi);
                        $E_S_3->insertIntoDatabase(con());
                        move_uploaded_file($_FILES['c_bi']['tmp_name'], $c_bi);
                        //Sucesso ao cadastro retorna em JSON
                        returnAjax($r, '0');
                        break;
                    }
                    /*========================= Horario da Saída =========================*/
                    //-------------------------- Parte para editar os dados ----------
                    if($v == 1 && $data_saida_v_db == null){
                        //Dado da criança
                        $crianca_ID = $_POST['id'];
                        $E_S_4 = con()->prepare("UPDATE entrada_saida SET data_entrada='$dataTM',encarregado_saida='$nome',data_saida='$data_saida',f_bi_2='$c_bi' WHERE id=:cianca_id");
                        $E_S_4->bindParam(":cianca_id",$INDEX);
                        $E_S_4->execute();
                        move_uploaded_file($_FILES['c_bi']['tmp_name'], $c_bi);
                        //Sucesso ao Editor retorna em JSON
                        returnAjax($r, '1');
                         break;
                    }else if($total == $cont){
                        //Erro ao executar actividade
                        returnAjax($r, '2');
                    }
            }
            
        }else{
            //Erro ao preencher o formulário
            returnAjax($r, '4');
        } 
    }