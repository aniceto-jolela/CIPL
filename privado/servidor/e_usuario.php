<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    //filter_input - filtra o dados
    //INPUT_POST - metodo
    //nome - dado do campo
    //FILTER_SANITIZE_STRING - Receber como string
    //trim - retira os espaços em branco no inicio e final da da frase 
    $nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $usuario = strtolower(trim(filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING)));
    $sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
    $modulo = filter_input(INPUT_POST, 'modulo', FILTER_SANITIZE_NUMBER_INT);
    $tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
    
    if(!empty($nome) && !empty($usuario) && !empty($email)){
        $foto = "";
        /**********************************  VALIDAÇÃO DO FICHEIRO    ********************************/
        if(!empty($_FILES['file']['name'])){
            if(isset($_FILES['file']['size'])){
                $arqPerfil = $_FILES['file']['size'];
                //Copia o nome do e o caminho da imagem
                $foto = '../../img/usuarios/'.$_FILES['file']['name'];
                //Verifica se já existe ste ficheiro
                if(file_exists($foto)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '1');}
            }else{$arqPerfil = ($_FILES['file']['size'] = 0);}
            // 2087939 bytes -> 1,99 MB , Verifica se o tamaho do ficheiro é igual ou maior que 1,99 MB e se o ficheiro
            // é diferente de zero (zero se for video)
            if($arqPerfil <= 2087939 && $arqPerfil != 0){
                //Formato de imagens
                $tipo=$_FILES['file']['type'];
                if(!preg_match('/^image\/(jpg|png|jpeg)$/',$tipo)){/*"Imagem inválida";*/returnAjax($r, '2');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '3');}
        }else{
            $foto = $_POST['file2'];
        }
        /**********************************  END VALIDAÇÃO DO FICHEIRO    ********************************/
        //str_word_count - conta o número de palavras que tem na frase.
        //Não pode ter espaço em braco no nome do usuário.
        $cont = str_word_count($usuario, 0);
        if($cont > 1){returnAjax($r, '4');}
        // Verifica se usuário especificado já existe
        $ID = $_POST['ID'];
        $query = "SELECT * FROM usuario WHERE id=$ID";
        $ver = Usuario::findBySql(con(), $query);
        $ver2 = Usuario::findBySql(con(), "SELECT * FROM usuario");
        foreach ($ver as $i){
            if(strtolower($i->getUsuario()) != strtolower($usuario)){
                //Verifica se usuário (Geral) já existe
                foreach ($ver2 as $i2){
                    if(strtolower($i2->getUsuario()) == strtolower($usuario)){
                        returnAjax($r, '5');
                    }
                }
            }
        }
        
        //Edita os dados
        $data_cad = $_POST['data_cad'];
        $usuario_edit = con()->prepare("UPDATE usuario SET nome='$nome',usuario='$usuario',sexo='$sexo',email='$email',telefone='$tel',foto='$foto',id_modulo='$modulo',data_cadastro='$data_cad' WHERE id=:id_usuario");
        $usuario_edit->bindParam(":id_usuario",$ID);
        $usuario_edit->execute();
        move_uploaded_file($_FILES['file']['tmp_name'], $foto);
        //Sucesso ao editar
        returnAjax($r, '0');
    }else{
        //Os campos do formulário não foram bem preenchidos
        returnAjax($r, '6');
    }
    
    
    
    
    
    