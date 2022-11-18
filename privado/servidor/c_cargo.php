<?php
    //Conecta com a base de dados
    include_once 'conectar.php';

//Cadastro de usario
    
    try {

        $nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));

         if(!empty($nome)){
             $cargo = Cargo::findBySql(con(), "SELECT * FROM `cargo`");
             foreach ($cargo as $i){
                 //Veriifica se o nome da bd é o mesmo do input text
                 if(strtolower($nome) == strtolower($i->getNome())){
                    //Este cargo já existe
                    returnAjax($r, '1');
                 }
             }
            
            //criou-se um novo objecto
            //trim - remove os espaços do inicio e do final da frase.
            $carg = new Cargo();
            $carg->setNome(trim($nome));
            $carg->insertIntoDatabase(con());
            //Sucesso ao editar
            returnAjax($r, '0');
         }
    } catch (Exception $exc) {
        //returnAjax($r, '0');
    }   
    exit();