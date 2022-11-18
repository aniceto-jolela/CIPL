<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    /*Notificação
     *funcionario_id (código):
     * 9 = pagamento de propína
     * cN = é o contador de total de crinaças que foram pagas
     **/
    $dataAt = date("Y");
    
    //Verifica se foi selecionado ... criança/s
    if(isset($_POST['s_crianca'])){
        if(!empty($_POST['codigo']) && !empty($_POST['data'])){
            $s_crianca = $_POST['s_crianca'];
            $encarregado = $_POST['s_encarregado'];
            $codigoT = $_POST['codigo'];
            $mes = $_POST['mes'];
            $data = $_POST['data'];
            $fotoT="";
            $cPagamento = Pagamento::findBySql(con(), "SELECT * FROM `pagamento`");
            //Verifica se o campo da foto (talão) está diferente de void
            if(!empty($_FILES['f_talao']['name'])){
                /**********************************  VALIDAÇÃO DOS FICHEIROS    ********************************/
                    if(isset($_FILES['f_talao']['size'])){
                        $arqTalao = $_FILES['f_talao']['size'];
                        $fotoT = "../../img/encarregados/talao/".$_FILES['f_talao']['name'];
                        //Verifica se já existe ste ficheiro
                        if(file_exists($fotoT)){/*"Este ficheiro já existe, porfavor altere o nome.";*/ returnAjax($r, '5');}
                    }else{$arqTalao = ($_FILES['f_talao']['size'] = 0);}
                    // 2087939 bytes -> 1,99 MB , Verifica se o tamaho do ficheiro é igual ou maior que 1,99 MB e se o ficheiro
                    // é diferente de zero (zero se for video)
                    if($arqTalao <= 2087939 && $arqTalao != 0){
                        //Formato de imagens
                        $tipo=$_FILES['f_talao']['type'];
                        if(!preg_match('/^image\/(jpg|png|jpeg)$/',$tipo)){/*"Imagem inválida";*/ returnAjax($r, '6');}
                    }else{/*"O tamanho max é 1,99 MB";*/ returnAjax($r, '7');}
                /********************************** END VALIDAÇÃO DOS FICHEIROS    ********************************/
            }$nN=0;
            for($a=0;count($s_crianca)>$a;$a++){$pega=0;
                foreach ($cPagamento as $i) {
                    //Verifica se Id da criança slecionada é igual a ID da tb da criança
                    if($s_crianca[$a] == $i->getCriancaId()){++$nN;$pega=1;
                        $cmes_db = $i->getMes();
                        $anodb = $i->getDataEmissao();
                        $ano_db = substr($anodb,0,4);
                        //Elimina o zero da esquerda
                        if($mes<10){$mes=$mes+0;}$cMes=0;
                        //Verifica se o mês do input é maior que o mês da bd
                        if($mes > $cmes_db){$cMes=1;
                            for($m=0;$mes>$m;$m++){
                                if($m > $cmes_db){++$cMes;}
                            }
                        }
                        //Verifica se o mês do input é menor que o mês da bd
                        if($mes < $cmes_db){
                            //"O mês selecionado tem que ser maior que o mês atual.<br>";
                            returnAjax($r, '8');
                        }
                        $mes2 = $cmes_db+$cMes;
                        //Verifica se o mes do BD é maior ou igual que 12
                        if($mes2<=12){
                            if($cmes_db==12){
                                //echo "O pagamento deste ano já foi feito<br>";
                                returnAjax($r, '4');
                            }
                            
                            //Verifica se o ano a BD é igual ao actual
                            
                            if($dataAt >= $ano_db){
                                //echo "<br>Mes_DB = $cmes_db | Mes2 = $mes2 | ContadorM = $cMes | MES_AT = $mes <br>";
                                //Edita os dados
                                $ID = $i->getId();
                                $pagamento_edit = con()->prepare("UPDATE `pagamento` SET `encarregado_id`='$encarregado',`codigo`='$codigoT',`f_talao`='$fotoT',`data_emissao`='$data',`mes`='$mes2' WHERE id=:id_pg");
                                $pagamento_edit->bindParam(":id_pg",$ID);
                                $pagamento_edit->execute();
                            }
                        }else{
                            //echo "Passou o limite do mês, por favor reduza.<br>";
                            returnAjax($r, '3');
                        }
                    }
                }
                //Verifica se o Id do pagamento não for igual ao da criança
                if($pega==0){
                    if($mes<=12){
                        if($mes<10){$mes=$mes+0;}
                        $pagamento = new Pagamento();
                        $pagamento->setEncarregadoId($encarregado);
                        $pagamento->setCriancaId($s_crianca[$a]);
                        $pagamento->setCodigo($codigoT);
                        $pagamento->setFTalao($fotoT);
                        $pagamento->setDataEmissao($data);
                        $pagamento->setMes($mes);
                        $pagamento->insertIntoDatabase(con());
                        
                            //Move a imagm na pasta epecifica
                            move_uploaded_file($_FILES['f_talao']['tmp_name'],$fotoT);
                    }else{
                        //echo "<br>Passou o limite do mês, por favor reduza.";
                        returnAjax($r, '3');
                    }
                }
                
            }
            //Sucesso
            /************************************ CADASTRO DE NOTIFICAÇÃO *****************************************/
            //Pega o grau de parentesco e o nome do encarregado
            $par="";$en="";
            $enca = Encarregado::findBySql(con(),"SELECT * FROM encarregado");
            foreach ($enca as $value) {
                $parente= Parente::findById(con(), $value->getParenteId());
                if($encarregado == $value->getId()){
                    $par=$parente->getNome();$en=$value->getNome();
                }
            }
            $meses = array("JANEIRO","FEVEREIRO","MARÇO","ABRIL","MAIO","JUNHO","JULHO","AGOSTO","SETEMBRO","OUTUBRO","NOVEMBRO","DEZEMBRO");
            $altMes = $mes-1;
            $descricao = "$en ($par) fez o pagamento do mês de $meses[$altMes] para $nN criança/s.";
            $notificacao = new NotificacaoSalario();
            $notificacao->setFuncionarioId(9);
            $notificacao->setDescricao($descricao);
            $notificacao->setPesquisa("Propína");
            $notificacao->insertIntoDatabase(con());
            /********************************************** END  **************************************************/
            //Sucesso
            returnAjax($r, '0');
        }else{
            //Verifica o código do talão e data
            returnAjax($r, '1');
        }
    }else{
        //Void (Nenhuma criança selecionada)
        returnAjax($r, '2');
    }
    
    
    
    


    

