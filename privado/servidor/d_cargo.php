<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    //Deletar carggo
    if(!empty($_GET['cod'])){
        $valor=$_GET['cod'];

        $deletar = new Cargo();
        $deletar->setId($valor);
        $deletar->deleteFromDatabase(con());
    }
    
    
    
   