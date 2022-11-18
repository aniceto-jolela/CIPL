<?php
    //Conecta com a base de dados
    include_once 'conectar.php';
    
    //filter_input - filtra o dados
    //INPUT_POST - metodo
    //nome - dado do campo
    //FILTER_SANITIZE_STRING - Receber como string
    //trim - retira os espaços em branco no inicio e final da da frase 
    $nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    
    if(!empty($nome)){
        $cargo = Cargo::findBySql(con(), "SELECT * FROM `cargo`");$pega = 0;
        foreach ($cargo as $i){
            //Veriifica se o nome da bd é o mesmo do input text
            if(strtolower($nome) == strtolower($i->getNome())){
                $pega = 1;
            }
        }
        if($pega == 0){
            //Edita os dados
            $ID = $_POST['ID'];
            $cargo_edit = con()->prepare("UPDATE cargo SET nome='$nome' WHERE id=:id_cargo");
            $cargo_edit->bindParam(":id_cargo",$ID);
            $cargo_edit->execute();
            //Sucesso ao editar
            returnAjax($r, '0');
        } else {
            //Este cargo já existe
            returnAjax($r, '1');
        }
    }
    
    
    
    
    
    