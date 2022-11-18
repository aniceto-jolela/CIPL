<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    //Deletar usuário
    $valor=$_GET['cod'];
    //Verifica se o ID selecionado é iguail ao da sessão
    if($valor != $_SESSION['codigo']){
        $deletar = new Usuario();
        $deletar->setId($valor);
        $deletar->deleteFromDatabase(con());
    }else{
        //Retorno
        echo "0";
    }
    
   