<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    // 2087939 bytes -> 1,99 MB
    $perfil="";$declaracao="";$iban="";$c_bi="";$atestado="";$b_sanidade="";$tipo="";
  
    /*=================== VERIFICA SE O FICHEIRO UPLOAD ESTÁ VOID OU NÃO =============================*/
    if(empty($_FILES['perfil']['name'])){
        $perfil = $_POST['perfil2'];
    }else{
        if(isset($_FILES['perfil']['size'])){
            $arqPerfil = $_FILES['perfil']['size'];
            $perfil = "../../img/funcionarios/altrerados/perfil/".$_FILES['perfil']['name'];
            //Verifica se já existe ste ficheiro
            if(file_exists($perfil)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '1');}
        }else{$arqPerfil = ($_FILES['perfil']['size'] = 0);}
        // 2087939 bytes -> 1,99 MB , Verifica se o tamaho do ficheiro é igual ou maior que 1,99 MB e se o ficheiro
        // é diferente de zero (zero se for video)
        if($arqPerfil <= 2087939 && $arqPerfil != 0){
            //Formato de imagens
            $tipo=$_FILES['perfil']['type'];
            if(!preg_match('/^image\/(jpg|png|jpeg)$/',$tipo)){/*"Imagem inválida";*/returnAjax($r, '2');}
        }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '3');}
    }
    if(empty($_FILES['dc']['name'])){
      $declaracao = $_POST['dc2'];
    }else{
        //========================>DECLARAÇÃO
        if(isset($_FILES['dc']['size'])){
            $arqDeclarracao = $_FILES['dc']['size'];
            $declaracao = "../../img/funcionarios/altrerados/documentos/".$_FILES['dc']['name'];
            if(file_exists($declaracao)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '4');}
        }else{$arqDeclarracao = ($_FILES['dc']['size'] = 0);}
        if($arqDeclarracao <= 2087939 && $arqDeclarracao != 0){$tipo=$_FILES['dc']['type'];
            if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '5');}
        }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '6');}
    }
    if(empty($_FILES['iban']['name'])){
        $iban = $_POST['iban2'];
    }else{
        //========================>IBAN
        if(isset($_FILES['iban']['size'])){
            $arqIban = $_FILES['iban']['size'];
            $iban = "../../img/funcionarios/altrerados/documentos/".$_FILES['iban']['name'];
            if(file_exists($iban)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '7');}
        }else{$arqIban = ($_FILES['iban']['size'] = 0);}
        if($arqIban <= 2087939 && $arqIban != 0){$tipo=$_FILES['iban']['type'];
            if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '8');}
        }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '9');}
    }
    if(empty($_FILES['c_bi']['name'])){
      $c_bi = $_POST['c_bi2'];
    }else{
        //========================>BI
        if(isset($_FILES['c_bi']['size'])){
            $arqBI = $_FILES['c_bi']['size'];
            $c_bi = "../../img/funcionarios/altrerados/documentos/".$_FILES['c_bi']['name'];
            if(file_exists($c_bi)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '10');}
        }else{$arqBI = ($_FILES['c_bi']['size'] = 0);}
        if($arqBI <= 2087939 && $arqBI != 0){$tipo=$_FILES['c_bi']['type'];
            if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '11');}
        }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '12');}
    }
    if(empty($_FILES['at']['name'])){
        $atestado = $_POST['at2'];
    }else{
        //========================>Atestado
        if(isset($_FILES['at']['size'])){
            $arqAtestado = $_FILES['at']['size'];
            $atestado = "../../img/funcionarios/altrerados/documentos/".$_FILES['at']['name'];
            if(file_exists($atestado)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '13');}
        }else{$arqAtestado = ($_FILES['at']['size'] = 0);}
        if($arqAtestado <= 2087939 && $arqAtestado != 0){$tipo=$_FILES['at']['type'];
            if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '14');}
        }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '15');}
    }
    if(empty($_FILES['sanidade']['name'])){
        $b_sanidade = $_POST['sanidade2'];
    }else{
        //========================>Sanidade
        if(isset($_FILES['sanidade']['size'])){
            $arqBoletim = $_FILES['sanidade']['size'];
            $b_sanidade = "../../img/funcionarios/altrerados/documentos/".$_FILES['sanidade']['name'];
            if(file_exists($b_sanidade)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '16');}
        }else{$arqBoletim = ($_FILES['sanidade']['size'] = 0);}
        if($arqBoletim <= 2087939 && $arqBoletim != 0){$tipo=$_FILES['sanidade']['type'];
            if(!preg_match('/^application\/(pdf)$/',$tipo)){/*"PDF inválida";*/returnAjax($r, '17');}
        }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '18');}
    }
    
    //Filtra os dados do funcioário
    $ID = trim(filter_input(INPUT_POST, 'cod', FILTER_SANITIZE_NUMBER_INT));
    $nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $sexo = trim(filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING));
    $banco = trim(filter_input(INPUT_POST, 'banco',FILTER_SANITIZE_NUMBER_INT));
    $iban_escrito = trim(filter_input(INPUT_POST, 'iban_escrito',FILTER_SANITIZE_STRING));
    $n_bi = trim(filter_input(INPUT_POST, 'n_bi', FILTER_SANITIZE_STRING));
    $validade = trim(filter_input(INPUT_POST, 'validade', FILTER_SANITIZE_STRING));
    $cargo = trim(filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_NUMBER_INT));
    $telefone = trim(filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING));
    $data_cadastro = trim(filter_input(INPUT_POST, 'data_cadastro', FILTER_SANITIZE_STRING));
    
    //Edita funcioários
    $funcionario_edit = con()->prepare("UPDATE `funcionario` SET `nome`='$nome',`sexo`='$sexo',`foto`='$perfil',`f_declaracao`='$declaracao',`f_iban`='$iban',`f_copia_bi`='$c_bi',`banco_id`='$banco',`iban_escrito`='$iban_escrito',`n_bi`='$n_bi',`data_validade`='$validade',`f_atestado_medico`='$atestado',`f_boletim_sanidade`='$b_sanidade',`cargo_id`='$cargo',`telefone`='$telefone',`data_cadastro`='$data_cadastro' WHERE `id`=:IDfuncionario");
    $funcionario_edit->bindParam(":IDfuncionario",$ID);
    $funcionario_edit->execute();
    
    move_uploaded_file($_FILES['perfil']['tmp_name'], $perfil);
    move_uploaded_file($_FILES['c_bi']['tmp_name'], $c_bi);
    move_uploaded_file($_FILES['dc']['tmp_name'], $declaracao);
    move_uploaded_file($_FILES['iban']['tmp_name'], $iban);
    move_uploaded_file($_FILES['at']['tmp_name'], $atestado);
    move_uploaded_file($_FILES['sanidade']['tmp_name'], $b_sanidade);
   
    //RETORNA SUCESSO
    returnAjax($r, '0');
    