<?php
    //Conecta com a base de dados
    include_once 'conectar.php';

//Cadastro de usario
    
    try {
        // 2087939 bytes -> 1,99 MB
        $foto="";
        /**********************************  VALIDAÇÃO DO FICHEIRO    ********************************/
        if(!empty($_FILES['file']['name'])){
            if(isset($_FILES['file']['size'])){
                $arqPerfil = $_FILES['file']['size'];
                //Copia o nome do e o caminho da imagem
                $foto = '../../img/usuarios/'.$_FILES['file']['name'];
                //Verifica se já existe ste ficheiro
                if(file_exists($foto)){/*"Este ficheiro já existe, porfavor altere o nome.";*/returnAjax($r, '4');}
            }else{$arqPerfil = ($_FILES['file']['size'] = 0);}
            // 2087939 bytes -> 1,99 MB , Verifica se o tamaho do ficheiro é igual ou maior que 1,99 MB e se o ficheiro
            // é diferente de zero (zero se for video)
            if($arqPerfil <= 2087939 && $arqPerfil != 0){
                //Formato de imagens
                $tipo=$_FILES['file']['type'];
                if(!preg_match('/^image\/(jpg|png|jpeg)$/',$tipo)){/*"Imagem inválida";*/returnAjax($r, '5');}
            }else{/*"O tamanho max é 1,99 MB";*/returnAjax($r, '6');}
        }
        /**********************************  END VALIDAÇÃO DO FICHEIRO    ********************************/
        
    
    //Dado do usuário
    $usuario = $_POST['usuario'];
    
    //str_word_count - conta o número de palavras que tem na frase.
    $cont = str_word_count($usuario, 0);
    if($cont > 1){
        //Não pode ter espaço em braco no nome do usuário.
        returnAjax($r, '3');
        exit();
    }
    //Dados dos usuários
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $telefone = $_POST['tel'];
    $senha = $_POST['senha'];
    $modulo = $_POST['modulo'];

    //criou-se um novo objecto
    //trim - remove os espaços do inicio e do final da frase.
    $usu = new Usuario();
   
    $usu->setNome(trim($nome));
    $usu->setUsuario(trim(strtolower($usuario)));
    $usu->setSexo($sexo);
    $usu->setEmail(trim($email));
    $usu->setTelefone($telefone);
    $usu->setSenha(md5($senha));
    $usu->setIdModulo($modulo);
    $usu->setFoto($foto);
                               
    //cadastra os registros
    // 0 = Se todos os dados estão corretos
    // 1 = Se um dos dados estiver errado
    // 2 = Se usuário já existe
    // strtolower = mete a palavra em minuscula
    if(!$usu->insertIntoDatabase(con())){
        $query = "SELECT * FROM usuario ORDER BY id ASC";
        $ver = Usuario::findBySql(con(), $query);
        foreach ($ver as $i){
            if(strtolower($i->getUsuario()) == strtolower($usuario)){
               returnAjax($r, '2');
               exit();
            }
         }
        returnAjax($r, '1');
    }else{
        //move a imagem para um local específico
        move_uploaded_file($_FILES['file']['tmp_name'], $foto);
        returnAjax($r, '0');
    }
    
    } catch (Exception $exc) {
        //returnAjax($r, '0');
    }   
    exit();