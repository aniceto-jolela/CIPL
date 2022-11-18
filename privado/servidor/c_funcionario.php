<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    //Cadastro de funcioários
    try {
            // 2087939 bytes -> 1,99 MB
            $perfil="";$f_declaracao="";$f_iban="";$f_copia_bi="";$f_atestado_medico="";$f_boletim_sanidade="";$tipo="";
            
            /**********************************  VALIDAÇÃO DOS FICHEIROS    ********************************/
            if(isset($_FILES['perfil']['size'])){
                $arqPerfil = $_FILES['perfil']['size'];
                $perfil = '../../img/funcionarios/perfil/'.$_FILES['perfil']['name'];
                //Verifica se já existe ste ficheiro
                if(file_exists($perfil)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '2');}
            }else{$arqPerfil = ($_FILES['perfil']['size'] = 0);}
            // 2087939 bytes -> 1,99 MB , Verifica se o tamaho do ficheiro é igual ou maior que 1,99 MB e se o ficheiro
            // é diferente de zero (zero se for video)
            if($arqPerfil <= 2087939 && $arqPerfil != 0){
                //Formato de imagens
                $tipo=$_FILES['perfil']['type'];
                if(!preg_match('/^image\/(jpg|png|jpeg)$/',$tipo)){/*"Imagem inválida";*/returnAjax($r, '3');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '4');}
            //========================>DECLARAÇÃO
            if(isset($_FILES['f_declaracao']['size'])){
                $arqDeclarracao = $_FILES['f_declaracao']['size'];
                $f_declaracao = '../../img/funcionarios/documentos/'.$_FILES['f_declaracao']['name'];
                if(file_exists($f_declaracao)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '5');}
            }else{$arqDeclarracao = ($_FILES['f_declaracao']['size'] = 0);}
            if($arqDeclarracao <= 2087939 && $arqDeclarracao != 0){$tipo=$_FILES['f_declaracao']['type'];
                if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '6');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '7');}
            //========================>IBAN
            if(isset($_FILES['f_iban']['size'])){
                $arqIban = $_FILES['f_iban']['size'];
                $f_iban = '../../img/funcionarios/documentos/'.$_FILES['f_iban']['name'];
                if(file_exists($f_iban)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '8');}
            }else{$arqIban = ($_FILES['f_iban']['size'] = 0);}
            if($arqIban <= 2087939 && $arqIban != 0){$tipo=$_FILES['f_iban']['type'];
                if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '9');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '10');}
            //========================>BI
            if(isset($_FILES['f_copia_bi']['size'])){
                $arqBI = $_FILES['f_copia_bi']['size'];
                $f_copia_bi = '../../img/funcionarios/documentos/'.$_FILES['f_copia_bi']['name'];
                if(file_exists($f_copia_bi)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '11');}
            }else{$arqBI = ($_FILES['f_copia_bi']['size'] = 0);}
            if($arqBI <= 2087939 && $arqBI != 0){$tipo=$_FILES['f_copia_bi']['type'];
                if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '12');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '13');}
            //========================>Atestado
            if(isset($_FILES['f_atestado_medico']['size'])){
                $arqAtestado = $_FILES['f_atestado_medico']['size'];
                $f_atestado_medico = '../../img/funcionarios/documentos/'.$_FILES['f_atestado_medico']['name'];
                if(file_exists($f_atestado_medico)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '14');}
            }else{$arqAtestado = ($_FILES['f_atestado_medico']['size'] = 0);}
            if($arqAtestado <= 2087939 && $arqAtestado != 0){$tipo=$_FILES['f_atestado_medico']['type'];
                if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '15');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '16');}
            //========================>Sanidade
            if(isset($_FILES['f_boletim_sanidade']['size'])){
                $arqBoletim = $_FILES['f_boletim_sanidade']['size'];
                $f_boletim_sanidade = '../../img/funcionarios/documentos/'.$_FILES['f_boletim_sanidade']['name'];
                if(file_exists($f_boletim_sanidade)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '17');}
            }else{$arqBoletim = ($_FILES['f_boletim_sanidade']['size'] = 0);}
            if($arqBoletim <= 2087939 && $arqBoletim != 0){$tipo=$_FILES['f_boletim_sanidade']['type'];
                if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '18');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '19');}
           
            /**********************************  END VALIDAÇÃO DOS FICHEIROS    ********************************/
            $nome = $_POST['nome'];
            $sexo = $_POST['sexo'];
            $banco = $_POST['banco'];
            $iban_escrito = $_POST['iban_escrito'];
            $n_bi = $_POST['n_bi'];
            $validade = $_POST['validade'];
            $cargo = $_POST['cargo'];
            $telefone = $_POST['tel'];
            $salario_base = $_POST['salario'];
            
            $funcionario = new Funcionario();
            
            $funcionario->setNome($nome);
            $funcionario->setSexo($sexo);
            $funcionario->setBancoId($banco);
            $funcionario->setIbanEscrito($iban_escrito);
            $funcionario->setNBi($n_bi);
            $funcionario->setDataValidade($validade);
            $funcionario->setCargoId($cargo);
            $funcionario->setTelefone($telefone);
            $funcionario->setSalarioBase($salario_base);
            
            $funcionario->setFoto($perfil);
            $funcionario->setFDeclaracao($f_declaracao);
            $funcionario->setFIban($f_iban);
            $funcionario->setFCopiaBi($f_copia_bi);
            $funcionario->setFAtestadoMedico($f_atestado_medico);
            $funcionario->setFBoletimSanidade($f_boletim_sanidade);
            
            if(!$funcionario->insertIntoDatabase(con())){
                //RETORNA ERRO NA BASE DE DADO
                returnAjax($r, '1');
            }else{
                move_uploaded_file($_FILES['perfil']['tmp_name'], $perfil);
                move_uploaded_file($_FILES['f_declaracao']['tmp_name'], $f_declaracao);
                move_uploaded_file($_FILES['f_iban']['tmp_name'], $f_iban);
                move_uploaded_file($_FILES['f_copia_bi']['tmp_name'], $f_copia_bi);
                move_uploaded_file($_FILES['f_atestado_medico']['tmp_name'], $f_atestado_medico);
                move_uploaded_file($_FILES['f_boletim_sanidade']['tmp_name'], $f_boletim_sanidade);
                /************************************ CADASTRO DE NOTIFICAÇÃO *****************************************/
                
                $func = Funcionario::findBySql(con(), "SELECT * FROM `funcionario` ORDER BY id ASC");
                $ID="";$descricao="";
                foreach ($func as $i){
                    //Pega o último ID (cadastrado)
                    $ID=$i->getId();
                    if($i->getSexo()=="M"){$descricao = "Novo funcionário foi cadastrado no sistema.";
                    }else{$descricao = "Nova funcionária foi cadastrada no sistema.";}
                }
                
                $notificacao = new NotificacaoFuncionario();
                $notificacao->setFuncionarioId($ID);
                $notificacao->setDescricao($descricao);
                $notificacao->insertIntoDatabase(con());
                /********************************************** END  **************************************************/
                //RETORNA SUCESSO
                returnAjax($r, '0');
            }
            
        }catch (Exception $exc){
            //echo $exc->getTraceAsString();
        }