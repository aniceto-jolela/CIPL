<html>
    <head>
        <title>Teste</title>
    </head>
    <body>
        <h1>VALIDAÇÃO</h1><hr>
        <form method="post" enctype="multipart/form-data" >
            <input type="file" name="file" required>
            <button> Enviar </button>
        </form>
    </body>
</html>

<?php
/* ======================== TEXTO ===================================== */
    

/* ======================== FICHEIRO ===================================== */
    if(isset($_FILES['file']['size'])){
        //OK
        $arquivo = $_FILES['file']['size'];
        $foto = "../../img/usuarios/".$_FILES['file']['name'];
        //Verifica se já existe ste ficheiro
        if(file_exists($foto)){
            echo "Este ficheiro já existe, porfavor altere o nome.<br>";
            exit();
        }
    }else{
        //Não
        $arquivo = ($_FILES['file']['size'] = 0);
    }
     
    // 2087939 bytes -> 1,99 MB
    if($arquivo <= 2087939 && $arquivo != 0){
        //Formato de imagens
        $tipo=$_FILES['file']['type'];
        if(!preg_match('/^image\/(jpg|png|jpeg)$/',$tipo)){
            echo ("Imagem inválida <br>");
            exit;
        }
        echo "<br>Tamanho Certo<br>";
    }else{
        echo "<br>O tamanho max é 1,99 MB<br>";
    }
//    $foto = $_FILES['file']['size'];
//
//echo "Foto = $foto";


//Formato de imagem
    /*
    $tipo=$_FILES['file']['type'];
    if(!preg_match('/^image\/(jpg|png|jpeg)$/',$tipo)){
        echo ("Imagem inválida <br>");
        exit;
    }
//Formato pdf
    $tipo=$_FILES['file']['type'];
    if(!preg_match('/^application\/(pdf)$/',$tipo)){
        echo ("PDF inválido <br>");
        exit;
    }
*/