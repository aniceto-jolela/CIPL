<?php
    //Conecta com a base de dados
    include_once 'conectar.php';

    $c_bi="";$c_bi2="";$perfil="";$at="";$c_cedula="";$c_vacina="";$ficha="";$c_pagamento="";
    //Filtra os dados da criança
    $ID = trim(filter_input(INPUT_POST, 'cod', FILTER_SANITIZE_NUMBER_INT));
    $nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
    $idade_click = trim(filter_input(INPUT_POST, 'idade_v',FILTER_SANITIZE_NUMBER_INT));
    $educador = filter_input(INPUT_POST,'educador', FILTER_SANITIZE_NUMBER_INT);
    $turma = filter_input(INPUT_POST,'s_turma', FILTER_SANITIZE_NUMBER_INT);
    $sala = filter_input(INPUT_POST,'s_sala', FILTER_SANITIZE_NUMBER_INT);$tipo="";
    
    //Verifica a idade
    if($idade_click==0){$idade = filter_input(INPUT_POST,'idade',FILTER_SANITIZE_STRING)." meses";}
    else{$idade = filter_input(INPUT_POST,'idade',FILTER_SANITIZE_STRING)." anos"; }
    //$perfil = $_FILES['perfil']['name'];
    
    //Filtra os dados encarregados
    $encarregado1 = trim(filter_input(INPUT_POST, 'encarregado1',FILTER_SANITIZE_STRING));
    $encarregado2 = trim(filter_input(INPUT_POST, 'encarregado2', FILTER_SANITIZE_STRING));
    $parente1 = filter_input(INPUT_POST, 'parente1', FILTER_SANITIZE_NUMBER_INT);
    $parente2 = filter_input(INPUT_POST, 'parente2', FILTER_SANITIZE_NUMBER_INT);
    $telefone = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
    $telefone2 = filter_input(INPUT_POST, 'tel2', FILTER_SANITIZE_STRING);
    $data_cadastro = trim(filter_input(INPUT_POST, 'data_cadastro', FILTER_SANITIZE_STRING));
    
    /*=================== VERIFICA SE O FICHEIRO UPLOAD ESTÁ VOID OU NÃO =============================*/
    if(!empty($nome)){
        //Controlo de ficheiros
        if(empty($_FILES['perfil']['name'])){
            $perfil = $_POST['perfil2'];
        }else{
            if(isset($_FILES['perfil']['size'])){
            $arqPerfil = $_FILES['perfil']['size'];
            $perfil = "../../img/criancas/altrerados/perfil/".$_FILES['perfil']['name'];
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
        }
        if(empty($_FILES['at']['name'])){
            $at = $_POST['at2'];
        }else{
            //========================>ATESTADO MÉDICO
            if(isset($_FILES['at']['size'])){
                $arqAtestado = $_FILES['at']['size'];
                $at = "../../img/criancas/altrerados/documentos/".$_FILES['at']['name'];
                if(file_exists($at)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '5');}
            }else{$arqAtestado = ($_FILES['at']['size'] = 0);}
            if($arqAtestado <= 2087939 && $arqAtestado != 0){$tipo=$_FILES['at']['type'];
                if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '6');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '7');}
        }
        if(empty($_FILES['c_cedula']['name'])){
            $c_cedula = $_POST['c_cedula2'];
        }else{
            //========================>CÓPIA DA CEDULA
            if(isset($_FILES['c_cedula']['size'])){
                $arqCed = $_FILES['c_cedula']['size'];
                $c_cedula = "../../img/criancas/altrerados/documentos/".$_FILES['c_cedula']['name'];
                if(file_exists($c_cedula)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '8');}
            }else{$arqCed = ($_FILES['c_cedula']['size'] = 0);}
            if($arqCed <= 2087939 && $arqCed != 0){$tipo=$_FILES['c_cedula']['type'];
                if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '9');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '10');}
        }
        if(empty($_FILES['c_vacina']['name'])){
            $c_vacina = $_POST['c_vacina2'];
        }else{
            //========================>CARTAO DE VACINA
            if(isset($_FILES['c_vacina']['size'])){
                $arqVacina = $_FILES['c_vacina']['size'];
                $c_vacina = "../../img/criancas/altrerados/documentos/".$_FILES['c_vacina']['name'];
                if(file_exists($c_vacina)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '11');}
            }else{$arqVacina = ($_FILES['c_vacina']['size'] = 0);}
            if($arqVacina <= 2087939 && $arqVacina != 0){$tipo=$_FILES['c_vacina']['type'];
                if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '12');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '13');}
        }
        if(empty($_FILES['ficha']['name'])){
            $ficha = $_POST['ficha2'];
        }else{
            //========================>FICHA DE MATRÍCULA
            if(isset($_FILES['ficha']['size'])){
                $arqMatricula = $_FILES['ficha']['size'];
                $ficha = "../../img/criancas/altrerados/documentos/".$_FILES['ficha']['name'];
                if(file_exists($ficha)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '14');}
            }else{$arqMatricula = ($_FILES['ficha']['size'] = 0);}
            if($arqMatricula <= 2087939 && $arqMatricula != 0){$tipo=$_FILES['ficha']['type'];
                if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '15');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '16');}
        }if(empty($_FILES['c_pagamento']['name'])){
            $c_pagamento = $_POST['c_pagamento2'];
        }else{
             //========================>COMPROVATIVO DE PAGAMENTO
            if(isset($_FILES['c_pagamento']['size'])){
                $arqPagamento = $_FILES['c_pagamento']['size'];
                $c_pagamento = "../../img/criancas/altrerados/documentos/".$_FILES['c_pagamento']['name'];
                if(file_exists($c_pagamento)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '17');}
            }else{$arqPagamento = ($_FILES['c_pagamento']['size'] = 0);}
            if($arqPagamento <= 2087939 && $arqPagamento != 0){$tipo=$_FILES['c_pagamento']['type'];
                if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '18');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '19');}
        }

        //Edita criança
        $crianca_edit = con()->prepare("UPDATE `crianca` SET `nome`='$nome',`sexo`='$sexo',`idade`='$idade',`foto`='$perfil',`f_atestado_medico`='$at',`f_c_cedula`='$c_cedula',`f_c_cartao_vacina`='$c_vacina',`f_ficha_matricula`='$ficha',`f_comprova_pagamento`='$c_pagamento',`data_cadastro`='$data_cadastro' WHERE `id`=:IDcrianca");
        $crianca_edit->bindParam(":IDcrianca",$ID); 
        $crianca_edit->execute();
        
        move_uploaded_file($_FILES['perfil']['tmp_name'], $perfil);
        move_uploaded_file($_FILES['at']['tmp_name'], $at);
        move_uploaded_file($_FILES['c_cedula']['tmp_name'], $c_cedula);
        move_uploaded_file($_FILES['c_vacina']['tmp_name'], $c_vacina);
        move_uploaded_file($_FILES['ficha']['tmp_name'], $ficha);
        move_uploaded_file($_FILES['c_pagamento']['tmp_name'], $c_pagamento);
        
        //Id do organizar criança
        $ID_organiza = trim(filter_input(INPUT_POST, 'ID_organiza', FILTER_SANITIZE_NUMBER_INT));
       
        if(!empty($educador)){
            $query = OrganizarCrianca::findBySql(con(), "SELECT * FROM organizar_crianca");$pega=0;
            foreach ($query as $c) {
                if($ID == $c->getCriancaId()){
                    //Edita criança
                    $crianca_edit = con()->prepare("UPDATE `organizar_crianca` SET `funcionario_id`='$educador',`turma_id`='$turma',`sala_id`='$sala' WHERE `crianca_id`=:IDcrianca1");
                    $crianca_edit->bindParam(":IDcrianca1",$ID);
                    $crianca_edit->execute();$pega=1;
                }
            }
            if($pega != 1){
                //Cadastra criança (organização da criança)
                $crianca_cad = new OrganizarCrianca();
                $crianca_cad->setFuncionarioId($educador);
                $crianca_cad->setTurmaId($turma);
                $crianca_cad->setSalaId($sala);
                $crianca_cad->setCriancaId($ID);
                $crianca_cad->insertIntoDatabase(con());
            }
        }
        
        //RETORNA SUCESSO
        returnAjax($r, '0');
    }else{
        /*=============================  DADOS DO ENCARREGADO  =============================================*/
        $ID_1 = trim(filter_input(INPUT_POST, 'cod_enc1', FILTER_SANITIZE_NUMBER_INT));
        $ID_2 = trim(filter_input(INPUT_POST, 'cod_enc2', FILTER_SANITIZE_NUMBER_INT));
        if(empty($_FILES['c_bi']['name'])){
            $c_bi = $_POST['c_bi2'];
        }else{
            //========================>BI 1
            if(isset($_FILES['c_bi']['size'])){
            $arqBI1 = $_FILES['c_bi']['size'];
            $c_bi = "../../img/criancas/altrerados/encarregados/".$_FILES['c_bi']['name'];
            if(file_exists($c_bi)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '20');}
            }else{$arqBI1 = ($_FILES['c_bi']['size'] = 0);}
            if($arqBI1 <= 2087939 && $arqBI1 != 0){$tipo=$_FILES['c_bi']['type'];
                if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '21');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '22');}
        }
        if(empty($_FILES['c_bi_']['name'])){
            $c_bi2 = $_POST['c_bi_2'];
        }else{
            //========================>BI 2
            if(isset($_FILES['c_bi_']['size'])){
            $arqBI2 = $_FILES['c_bi_']['size'];
            $c_bi2 = "../../img/criancas/altrerados/encarregados/".$_FILES['c_bi_']['name'];
            if(file_exists($c_bi2)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '23');}
            }else{$arqBI2 = ($_FILES['c_bi_']['size'] = 0);}
            if($arqBI2 <= 2087939 && $arqBI2 != 0){$tipo=$_FILES['c_bi_']['type'];
                if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '24');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '25');}
        }
        $ver = Encarregado::findBySql(con(), "SELECT * FROM encarregado");
        foreach ($ver as $i) {
            if($ID_1 == $i->getId()){
                //Edita funcioários
                $encarregado_edit = con()->prepare("UPDATE `encarregado` SET `nome`='$encarregado1',`f_bi`='$c_bi',`telefone`='$telefone',`parente_id`='$parente1' WHERE `id`=:IDencarregado");
                $encarregado_edit->bindParam(":IDencarregado",$ID_1);
                $encarregado_edit->execute();
                move_uploaded_file($_FILES['c_bi']['tmp_name'], $c_bi);
            }
            if($ID_2 == $i->getId()){
                //Edita funcioários
                $encarregado_edit2 = con()->prepare("UPDATE `encarregado` SET `nome`='$encarregado2',`f_bi`='$c_bi2',`telefone`='$telefone2',`parente_id`='$parente2' WHERE `id`=:IDencarregado_");
                $encarregado_edit2->bindParam(":IDencarregado_",$ID_2);
                $encarregado_edit2->execute();  
                move_uploaded_file($_FILES['c_bi_']['tmp_name'], $c_bi2);
            }  
        }
        //RETORNA SUCESSO
        returnAjax($r, '1');
    }
   
