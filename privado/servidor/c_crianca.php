<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    // 2087939 bytes -> 1,99 MB
    $perfil="";$f_at_medico="";$f_cop_cedula="";$f_cop_c_vacina="";$f_ficha_matricula="";$f_comp_pagamento="";$f_c_bi_1="";$f_c_bi_2="";
    $tipo="";
    /**********************************  VALIDAÇÃO DOS FICHEIROS    ********************************/
    if(isset($_FILES['perfil']['size'])){
        $arqPerfil = $_FILES['perfil']['size'];
        $perfil = '../../img/criancas/perfil/'.$_FILES['perfil']['name'];
        //Verifica se já existe ste ficheiro
        if(file_exists($perfil)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '3');}
    }else{$arqPerfil = ($_FILES['perfil']['size'] = 0);}
    // 2087939 bytes -> 1,99 MB , Verifica se o tamaho do ficheiro é igual ou maior que 1,99 MB e se o ficheiro
    // é diferente de zero (zero se for video)
    if($arqPerfil <= 2087939 && $arqPerfil != 0){
        //Formato de imagens
        $tipo=$_FILES['perfil']['type'];
        if(!preg_match('/^image\/(jpg|png|jpeg)$/',$tipo)){/*"Imagem inválida";*/returnAjax($r, '4');}
    }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '5');}
    //========================>ATESTADO MÉDICO
    if(isset($_FILES['f_at_medico']['size'])){
        $arqAtestado = $_FILES['f_at_medico']['size'];
        $f_at_medico = '../../img/criancas/documentos/'.$_FILES['f_at_medico']['name'];
        if(file_exists($f_at_medico)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '6');}
    }else{$arqAtestado = ($_FILES['f_at_medico']['size'] = 0);}
    if($arqAtestado <= 2087939 && $arqAtestado != 0){$tipo=$_FILES['f_at_medico']['type'];
        if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '7');}
    }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '8');}
    //========================>CÓPIA DA CEDULA
    if(isset($_FILES['f_cop_cedula']['size'])){
        $arqCed = $_FILES['f_cop_cedula']['size'];
        $f_cop_cedula = '../../img/criancas/documentos/'.$_FILES['f_cop_cedula']['name'];
        if(file_exists($f_cop_cedula)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '9');}
    }else{$arqCed = ($_FILES['f_cop_cedula']['size'] = 0);}
    if($arqCed <= 2087939 && $arqCed != 0){$tipo=$_FILES['f_cop_cedula']['type'];
        if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '10');}
    }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '11');}
    //========================>CARTAO DE VACINA
    if(isset($_FILES['f_cop_c_vacina']['size'])){
        $arqVacina = $_FILES['f_cop_c_vacina']['size'];
        $f_cop_c_vacina = '../../img/criancas/documentos/'.$_FILES['f_cop_c_vacina']['name'];
        if(file_exists($f_cop_c_vacina)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '12');}
    }else{$arqVacina = ($_FILES['f_cop_c_vacina']['size'] = 0);}
    if($arqVacina <= 2087939 && $arqVacina != 0){$tipo=$_FILES['f_cop_c_vacina']['type'];
        if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '13');}
    }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '14');}
    //========================>FICHA DE MATRÍCULA
    if(isset($_FILES['f_ficha_matricula']['size'])){
        $arqMatricula = $_FILES['f_ficha_matricula']['size'];
        $f_ficha_matricula = '../../img/criancas/documentos/'.$_FILES['f_ficha_matricula']['name'];
        if(file_exists($f_ficha_matricula)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '15');}
    }else{$arqMatricula = ($_FILES['f_ficha_matricula']['size'] = 0);}
    if($arqMatricula <= 2087939 && $arqMatricula != 0){$tipo=$_FILES['f_ficha_matricula']['type'];
        if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '16');}
    }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '17');}
    //========================>COMPROVATIVO DE PAGAMENTO
    if(isset($_FILES['f_comp_pagamento']['size'])){
        $arqPagamento = $_FILES['f_comp_pagamento']['size'];
        $f_comp_pagamento = '../../img/criancas/documentos/'.$_FILES['f_comp_pagamento']['name'];
        if(file_exists($f_comp_pagamento)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '18');}
    }else{$arqPagamento = ($_FILES['f_comp_pagamento']['size'] = 0);}
    if($arqPagamento <= 2087939 && $arqPagamento != 0){$tipo=$_FILES['f_comp_pagamento']['type'];
        if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '19');}
    }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '20');}
    //========================>BI 1
    if(!empty($_FILES['f_c_bi_1']['name'])){
        if(isset($_FILES['f_c_bi_1']['size'])){
            $arqBI1 = $_FILES['f_c_bi_1']['size'];
            $f_c_bi_1 = '../../img/criancas/encarregados/'.$_FILES['f_c_bi_1']['name'];
            if(file_exists($f_c_bi_1)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '21');}
        }else{$arqBI1 = ($_FILES['f_c_bi_1']['size'] = 0);}
        if($arqBI1 <= 2087939 && $arqBI1 != 0){$tipo=$_FILES['f_c_bi_1']['type'];
            if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '22');}
        }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '23');}
    }
    /**********************************  END VALIDAÇÃO DOS FICHEIROS    ********************************/
   
    //Dados da criança
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $sexo = $_POST['sexo'];
    //Verifica a idade
    $idade_click = $_POST['idade_v'];
    if($idade_click==0){$idade = $_POST['idade']." meses";}else{$idade = $_POST['idade']." anos"; }
    //=============* Dados do encarregado 1
    $encarregado_1 = $_POST['encarregado_1'];
    $t1 = filter_input(INPUT_POST, 't1', FILTER_SANITIZE_STRING);
    $parente_1 = filter_input(INPUT_POST, 'parente_1', FILTER_SANITIZE_NUMBER_INT);
    
    //verifica
    $controle_e = $_POST['controle_e'];
    $total_encarregado = $_POST['total_encarregado'];

    //criou-se um novo objecto
        $encarregado = new Encarregado();
        $crianca = new Crianca();
        $uniao = new Uniao();
      
    //Verifica o controle do encarregado
    //0 - cria encarregado
    //1 - seleciona encarregado
    if($controle_e == 0){
       /*====================================* NOVO ENCARREGADO *=========================================== */
        //Se o total de encarregado for :
        //0 - cria um encarregado
        //1 - cria dois encarregado
        if($total_encarregado == 0){
            if($encarregado_1 != null && $_FILES['f_c_bi_1']['name'] != null){
                //Dados do encarregado
                $encarregado->setNome($encarregado_1);
                $encarregado->setFBi($f_c_bi_1);
                $encarregado->setTelefone($t1);
                $encarregado->setParenteId($parente_1);
                //Verificação para enviar o retorno no AJAX
                if(!$encarregado->insertIntoDatabase(con())){
                    // Erro da base de dados
                    returnAjax($r, '1');
                }else{
                  
                    move_uploaded_file($_FILES['f_c_bi_1']['tmp_name'], $f_c_bi_1);
                    //pegar o ultimo ID do encarregado
                    $query = "SELECT * FROM encarregado ORDER BY id ASC";
                    $ver = Encarregado::findBySql(con(), $query);
                    foreach ($ver as $i){
                        $ultimo_enc = $i->getId();
                    }
                    //Dados da criança
                    $crianca->setNome($nome);
                    $crianca->setSexo($sexo);
                    $crianca->setIdade($idade);
                    $crianca->setFoto($perfil);
                    $crianca->setFAtestadoMedico($f_at_medico);
                    $crianca->setFCCedula($f_cop_cedula);
                    $crianca->setFCCartaoVacina($f_cop_c_vacina);
                    $crianca->setFFichaMatricula($f_ficha_matricula);
                    $crianca->setFComprovaPagamento($f_comp_pagamento);
                    
                    if(!$crianca->insertIntoDatabase(con())){
                        // Erro da base de dados
                        returnAjax($r, '1');
                    }else{
                        //Move a foto para um destino...
                        move_uploaded_file($_FILES['perfil']['tmp_name'], $perfil);
                        move_uploaded_file($_FILES['f_at_medico']['tmp_name'], $f_at_medico);
                        move_uploaded_file($_FILES['f_cop_cedula']['tmp_name'], $f_cop_cedula);
                        move_uploaded_file($_FILES['f_cop_c_vacina']['tmp_name'], $f_cop_c_vacina);
                        move_uploaded_file($_FILES['f_ficha_matricula']['tmp_name'], $f_ficha_matricula);
                        move_uploaded_file($_FILES['f_comp_pagamento']['tmp_name'], $f_comp_pagamento);

                        //pegar o ultimo ID da criança
                        $query = "SELECT * FROM crianca ORDER BY id ASC";
                        $ver1 = Crianca::findBySql(con(), $query);
                        foreach ($ver1 as $i1){
                            $ultimo_cria = $i1->getId();
                        }
                        //Dados da união
                        $uniao->setEncarregadoId($ultimo_enc);
                        $uniao->setCriancaId($ultimo_cria);
                        if(!$uniao->insertIntoDatabase(con())){
                            // Erro da base de dados
                            returnAjax($r, '1');
                        }else{
                            /************************************ CADASTRO DE NOTIFICAÇÃO *****************************************/
                            
                            $cri = Crianca::findBySql(con(), "SELECT * FROM `crianca` ORDER BY id ASC");
                            $uni = Uniao::findBySql(con(), "SELECT * FROM `uniao` ORDER BY id ASC");
                            $ID="";$descricao="";$enc1="";$par1="";
                            //Pega o último ID (cadastrado)
                            foreach ($cri as $c){$ID=$c->getId();}
                            foreach ($uni as $u){
                                $enc = Encarregado::findById(con(), $u->getEncarregadoId());
                                $parent = Parente::findById(con(), $enc->getParenteId());
                                //Verifica se o ultimo ID da criança é iqual ao da união (criança)
                                if($u->getCriancaId() == $ID){
                                    //Pega o último ID (cadastrado)
                                    $enc1 = $enc->getNome();$par1 = $parent->getNome();
                                    $descricao = "Nova criança foi cadastrada no sistema. Encarregado $enc1 ($par1).";
                                }
                            }
                            $notificacao = new NotificacaoCrianca();
                            $notificacao->setCriancaId($ID);
                            $notificacao->setDescricao($descricao);
                            $notificacao->insertIntoDatabase(con());
                            /********************************************** END  **************************************************/
                            //Sucesso de cadastro
                            returnAjax($r, '0');
                        }
                    }
                }
                
            } else{
                //Erro do preenchimento do formúlario;
                returnAjax($r, '2');
            }
            /*====================* VERIFICAÇÃO DO ENCARREGADO 2 *====================*/
        }else if($total_encarregado == 1){
            //=============* Dados do encarregado 2
                $t2 = filter_input(INPUT_POST,'t2', FILTER_SANITIZE_STRING);
                $encarregado_2 = filter_input(INPUT_POST,'encarregado_2', FILTER_SANITIZE_STRING);
                $parente_2 = filter_input(INPUT_POST,'parente_2', FILTER_SANITIZE_NUMBER_INT);
            //=============* End dados
            if($encarregado_1 != null && $_FILES['f_c_bi_1']['name'] != null && $encarregado_2 != null && $_FILES['f_c_bi_2']['name'] != null){
                //Dados do encarregado 1
                $encarregado_novo = new Encarregado();
                $encarregado_novo->setNome($encarregado_1);
                $encarregado_novo->setFBi($f_c_bi_1);
                $encarregado_novo->setTelefone($t1);
                $encarregado_novo->setParenteId($parente_1);
                
                //Verificação para enviar o retorno no AJAX
                if(!$encarregado_novo->insertIntoDatabase(con())){
                    // Erro da base de dados (o erro é retornado em json)
                    returnAjax($r, '1');
                }else{
                    move_uploaded_file($_FILES['f_c_bi_1']['tmp_name'], $f_c_bi_1);
                    //pegar o ultimo ID do encarregado
                    $query = "SELECT * FROM encarregado ORDER BY id ASC";
                    $ver = Encarregado::findBySql(con(), $query);
                    foreach ($ver as $i){
                        $ultimo_enc1 = $i->getId();
                    }
                    //Dados do encarregado 2
                    //========================>BI 2
                    if(isset($_FILES['f_c_bi_2']['size'])){
                        $arqBI2 = $_FILES['f_c_bi_2']['size'];
                        $f_c_bi_2 = '../../img/criancas/encarregados/'.$_FILES['f_c_bi_2']['name'];
                        if(file_exists($f_c_bi_2)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '24');}
                    }else{$arqBI2 = ($_FILES['f_c_bi_2']['size'] = 0);}
                    if($arqBI2 <= 2087939 && $arqBI2 != 0){$tipo2=$_FILES['f_c_bi_2']['type'];
                        if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '25');}
                    }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '26');}
                    
                    $novo_encarregado = new Encarregado();
                    $novo_encarregado->setNome($encarregado_2);
                    $novo_encarregado->setFBi($f_c_bi_2);
                    $novo_encarregado->setTelefone($t2);
                    $novo_encarregado->setParenteId($parente_2); 
                    if(!$novo_encarregado->insertIntoDatabase(con())){
                        // Erro da base de dados (o erro é retornado em json)
                        returnAjax($r, '1');
                    }else{
                    move_uploaded_file($_FILES['f_c_bi_2']['tmp_name'], $f_c_bi_2);
                           
                    //pegar o ultimo ID do encarregado
                    $query = "SELECT * FROM encarregado ORDER BY id ASC";
                    $ver = Encarregado::findBySql(con(), $query);
                    foreach ($ver as $i){
                        $ultimo_enc2 = $i->getId();
                    }
                    //Dados da criança
                    $crianca_nova = new Crianca();
                    $crianca_nova->setNome($nome);
                    $crianca_nova->setSexo($sexo);
                    $crianca_nova->setIdade($idade);
                    $crianca_nova->setFoto($perfil);
                    $crianca_nova->setFAtestadoMedico($f_at_medico);
                    $crianca_nova->setFCCedula($f_cop_cedula);
                    $crianca_nova->setFCCartaoVacina($f_cop_c_vacina);
                    $crianca_nova->setFFichaMatricula($f_ficha_matricula);
                    $crianca_nova->setFComprovaPagamento($f_comp_pagamento);
                    
                    if(!$crianca_nova->insertIntoDatabase(con())){
                        // Erro da base de dados (o erro é retornado em json)
                        returnAjax($r, '1');
                    }else{
                            move_uploaded_file($_FILES['perfil']['tmp_name'], $perfil);
                            move_uploaded_file($_FILES['f_at_medico']['tmp_name'], $f_at_medico);
                            move_uploaded_file($_FILES['f_cop_cedula']['tmp_name'], $f_cop_cedula);
                            move_uploaded_file($_FILES['f_cop_c_vacina']['tmp_name'], $f_cop_c_vacina);
                            move_uploaded_file($_FILES['f_ficha_matricula']['tmp_name'], $f_ficha_matricula);
                            move_uploaded_file($_FILES['f_comp_pagamento']['tmp_name'], $f_comp_pagamento);
                            //pegar o ultimo ID da criança
                            $query = "SELECT * FROM crianca ORDER BY id ASC";
                            $ver = Crianca::findBySql(con(), $query);
                            foreach ($ver as $i){
                                $ultimo_cria = $i->getId();
                            }
                            //Primeiro dados da união
                            $uniao->setEncarregadoId($ultimo_enc1);
                            $uniao->setCriancaId($ultimo_cria);
                            if(!$uniao->insertIntoDatabase(con())){returnAjax($r, '1');}else{
                                //Segundo dado da união segundo
                                $uniao2 = new Uniao();
                                $uniao2->setEncarregadoId($ultimo_enc2);
                                $uniao2->setCriancaId($ultimo_cria);
                                if(!$uniao2->insertIntoDatabase(con())){returnAjax($r, '1');}else{
                                    /************************************ CADASTRO DE NOTIFICAÇÃO *****************************************/
                            
                                    $cri2 = Crianca::findBySql(con(), "SELECT * FROM `crianca` ORDER BY id ASC");
                                    $uni2 = Uniao::findBySql(con(), "SELECT * FROM `uniao` ORDER BY id ASC");
                                    $ID="";$descricao="";$pega=0;$enc1="";$enc2="";$par1="";$par2="";
                                    //Pega o último ID (cadastrado)
                                    foreach ($cri2 as $c2){$ID=$c2->getId();}
                                    foreach ($uni2 as $u2){
                                        $enc = Encarregado::findById(con(), $u2->getEncarregadoId());
                                        $parent = Parente::findById(con(), $enc->getParenteId());
                                        //Verifica se o ultimo ID da criança é iqual ao da união (criança)
                                        if($u2->getCriancaId() == $ID){
                                            //Pega o último ID (cadastrado)
                                            $enc1 = $enc->getNome();$par1 = $parent->getNome();
                                            $descricao = "Nova criança foi cadastrada no sistema. Encarregado $enc1 ($par1).";
                                            if($pega == 1){
                                                $descricao = "Nova criança foi cadastrada no sistema. Encarregados $enc2 ($par2) e $enc1 ($par1).";    
                                            }
                                            $enc2 = $enc->getNome();$par2 = $parent->getNome();
                                            $pega=1;
                                        }
                                    }
                                    $notificacao = new NotificacaoCrianca();
                                    $notificacao->setCriancaId($ID);
                                    $notificacao->setDescricao($descricao);
                                    $notificacao->insertIntoDatabase(con());
                                    /********************************************** END  **************************************************/
                                    //Sucesso ao cadastrar
                                    returnAjax($r, '0');
                                }
                            }
                        }
                    }
                }
           }else{
                //Erro do preenchimento do formúlario;
                returnAjax($r, '2');
            }
        }
        /*====================================* ENCARREGADO EXISTENTE *=========================================== */
    }else if($controle_e == 1){
        //Dado do encarregado cadastrado
        $select_encarregado = filter_input(INPUT_POST, 'select_encarregado',FILTER_SANITIZE_NUMBER_INT);
        //Dados da criança
        $nova_criaca = new Crianca();
        $nova_criaca->setNome($nome);
        $nova_criaca->setSexo($sexo);
        $nova_criaca->setIdade($idade);
        $nova_criaca->setFoto($perfil);
        $nova_criaca->setFAtestadoMedico($f_at_medico);
        $nova_criaca->setFCCedula($f_cop_cedula);
        $nova_criaca->setFCCartaoVacina($f_cop_c_vacina);
        $nova_criaca->setFFichaMatricula($f_ficha_matricula);
        $nova_criaca->setFComprovaPagamento($f_comp_pagamento);
             
        if(!$nova_criaca->insertIntoDatabase(con())){
            // Erro da base de dados (o erro é retornado em json)
            returnAjax($r, '1');
        }else{
            move_uploaded_file($_FILES['perfil']['tmp_name'], $perfil);
            move_uploaded_file($_FILES['f_at_medico']['tmp_name'], $f_at_medico);
            move_uploaded_file($_FILES['f_cop_cedula']['tmp_name'], $f_cop_cedula);
            move_uploaded_file($_FILES['f_cop_c_vacina']['tmp_name'], $f_cop_c_vacina);
            move_uploaded_file($_FILES['f_ficha_matricula']['tmp_name'], $f_ficha_matricula);
            move_uploaded_file($_FILES['f_comp_pagamento']['tmp_name'], $f_comp_pagamento);
            //pegar o ultimo ID da criança
            $query = "SELECT * FROM crianca ORDER BY id ASC";
            $ver = Crianca::findBySql(con(), $query);
            foreach ($ver as $i){
                $ultimo_cria = $i->getId();
            }
            // Dados da união
            $nova_uniao = new Uniao();
            $nova_uniao->setEncarregadoId($select_encarregado);
            $nova_uniao->setCriancaId($ultimo_cria);
            if(!$nova_uniao->insertIntoDatabase(con())){returnAjax($r, '1');}else{
                /************************************ CADASTRO DE NOTIFICAÇÃO *****************************************/
                            
                $cri3 = Crianca::findBySql(con(), "SELECT * FROM `crianca` ORDER BY id ASC");
                $uni3 = Uniao::findBySql(con(), "SELECT * FROM `uniao` ORDER BY id ASC");
                $ID="";$descricao="";$enc1="";$par1="";
                //Pega o último ID (cadastrado)
                foreach ($cri3 as $c){$ID=$c->getId();}
                foreach ($uni3 as $u){
                    $enc = Encarregado::findById(con(), $u->getEncarregadoId());
                    $parent = Parente::findById(con(), $enc->getParenteId());
                    //Verifica se o ultimo ID da criança é iqual ao da união (criança)
                    if($u->getCriancaId() == $ID){
                        //Pega o último ID (cadastrado)
                        $enc1 = $enc->getNome();$par1 = $parent->getNome();
                        $descricao = "Nova criança foi cadastrada no sistema. Encarregado $enc1 ($par1).";
                    }
                }
                $notificacao = new NotificacaoCrianca();
                $notificacao->setCriancaId($ID);
                $notificacao->setDescricao($descricao);
                $notificacao->insertIntoDatabase(con());
                /********************************************** END  **************************************************/
                //Sucesso ao cadastrar
                returnAjax($r, '0');
            }
        }
    }else{
        //Erro do preenchimento do formúlario;
        returnAjax($r, '2');
    }
    
    //FIM

    