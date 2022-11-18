<?php
    include_once 'conectar.php';
    
    if(isset($_GET['id'])){
        $ID = $_GET['id'];$pega=0;
        $usuario = Usuario::findBySql(con(), "SELECT * FROM `usuario` WHERE id = '".$ID."'");
        foreach ($usuario as $i):
            if($i->getId() == $ID){
                $pega = $i->getFoto();
                echo "$pega";break;
            }
        endforeach;
    }
    
    
    
    
    
    
    
    


