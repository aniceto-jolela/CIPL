<?php
    //Conexão
    include_once 'conectar.php';
    
    //Altera o fuso horário do servidor.
        date_default_timezone_set('Africa/Luanda');
    // END Altera o fuso horário do servidor

    $ID_funcionario = $_POST['id'];

    $h = localtime(time(),true);
    $hora_final = $h['tm_hour'];
    $data_entrada_vf = date("Y-m-d");
    $data_entrada = date("Y-m-d H:i:s");
    $data_saida = date("Y-m-d H:i:s");
    $total_hora=0;
    //$ES = nome do botão da entrada e saida

    /*==================================== Botão de entrada & saida =============================*/
    if(!empty($_POST['ES'])){
        $ver = Presenca::findBySql(con(), "SELECT * FROM presenca");
        for($a=0;count($ver)>=$a;$a++){
            $total=$a;
            if($ver == null){
                //Cadastra se não tiver dados na base de dado
                $Presenca_0 = new Presenca();
                $Presenca_0->setFuncionarioId($ID_funcionario);
                $Presenca_0->setDataEntrada($data_entrada);
                $Presenca_0->insertIntoDatabase(con());
                //Sucesso ao cadastro
                returnAjax($r, '0');
            }
        }
        $cont = 0;
        $v=0;
        foreach ($ver as $i){
            $dataTM = $i->getDataEntrada();
            $dataTM1 = $i->getDataSaida();
            //substr -> Pega a data e deixa a hora
            $data_entrada_db = substr($dataTM,0,10);
            $data_saida_db = substr($dataTM1,0,10);
            //Dado do funcioário
            $dataFt = $i->getDataFalta();
            $falta_data = substr($dataFt,0,10);
            $ID = $i->getFuncionarioId();
            $INDEX = $i->getId();
            $cont++;
            //Verifica se a data da falta é NULL (vazio)
            if($ID_funcionario == $ID && $falta_data == $data_entrada_vf){
                //O funcionário está ausente.
                returnAjax($r, '5');
            }
            //Verifica se o ID do funcionário selecionado é igual ao da base de dados o mesmo com a data
            if($ID_funcionario == $ID && $data_entrada_db == $data_entrada_vf){
                $v=1; $data_saida_v_db = $dataTM1; 
                $hora_inicial = substr($dataTM,10,3);
            }
            /*========================= Horario da Entrada =========================*/
            //-------------------------- Parte para cadastrar os dados ----------
            if($total == $cont && $v != 1){
                $Presenca_1 = new Presenca();
                $Presenca_1->setFuncionarioId($ID_funcionario);
                $Presenca_1->setDataEntrada($data_entrada);
                $Presenca_1->insertIntoDatabase(con());
                //Sucesso ao cadastro retorna em JSON
                returnAjax($r, '0');
                break;
            }
            /*========================= Horario da Saída =========================*/
            //-------------------------- Parte para editar os dados ----------
            if($v == 1 && $data_saida_v_db == null ){
                //TOTAL DE HORA 
                $c=0;
                for($a=0;$hora_final>$a;$a++){
                    if($a>=$hora_inicial){
                        $c++;
                        $total_hora = $c;
                    }
                }
                //END TOTAL DE HORA 
                
                //Dado do funcionário
                //trim - retira os espaços em branco no inicio e final da da frase 
                $obs = trim($_POST['obs']);
                $Presenca_2 = con()->prepare("UPDATE presenca SET data_entrada='$dataTM',data_saida='$data_saida',observacao='$obs',total_hora='$total_hora' WHERE id=:id_presenca");
                $Presenca_2->bindParam(":id_presenca",$INDEX);
                $Presenca_2->execute();
                //Sucesso ao Editar retorna em JSON               
                returnAjax($r, '1');
                break;
            }else if($total == $cont){
                //O funcionário já não se encontra na creche.
                returnAjax($r, '2');
            }
        }
    }
    /*======================================= Botão de Falta ===================================*/
    //$falta = nome do botão
    else{
        $s_falta = $_POST['s_falta'];
        
        if(!empty($s_falta)){
            $data_falta = date("Y-m-d");
            
            $ver2 = Presenca::findBySql(con(), "SELECT * FROM presenca");
            for($a=0;count($ver2)>=$a;$a++){
                $total2=$a;
                if($ver2 == null){
                    //Cadastra se não tiver dados na base de dado
                    $Presenca_0_1 = new Presenca();
                    $Presenca_0_1->setFuncionarioId($ID_funcionario);
                    $Presenca_0_1->setTotalHora($total_hora);
                    $Presenca_0_1->setFalta(1);
                    $Presenca_0_1->setMotivoId($s_falta);
                    $Presenca_0_1->setDataFalta($data_falta);
                    $Presenca_0_1->insertIntoDatabase(con());
                    //Sucesso ao cadastro
                    
                    /*RESERVADO PARA FAZER O DISCONTO DO SALÁRIO*/
                    
                    returnAjax($r, '7');
                }
            }
            //Verifica se o funcionário já assinou o livro de ponto
            $cont=0;
            $v2 = 0;
            $dataSaida="";
            $dataSaidaFalta="";
            foreach ($ver2 as $i2){
                $data_entrada_db2 = $i2->getDataEntrada();
                $data_saida_db2 = $i2->getDataSaida();
                $ID2 = $i2->getFuncionarioId();
                $data_falt = $i2->getDataFalta();
                //substr - serve para limitar a presentação de um texto
                $dataEnt = substr($data_entrada_db2, 0, 10);
                $cont++;
                //Se a data de entrada for NULL (vazio)
                //Verifica se o ID do funcionário selecionado é igual ao da base de dados o mesmo com a data
                if($ID_funcionario == $ID2 && $data_entrada_db2==null && $data_falt == $data_falta){$v2=1;$dataSaidaFalta = $data_falt;}
                //Se tiver data de entrada
                if($ID_funcionario == $ID2 && $dataEnt == $data_falta){$v2=1;$dataSaida = $data_saida_db2;}
                
                if($v2!=1  && $total2 == $cont){
                    //Põe falta no funcionário
                    $Presenca_0_2 = new Presenca();
                    $Presenca_0_2->setFuncionarioId($ID_funcionario);
                    $Presenca_0_2->setTotalHora($total_hora);
                    $Presenca_0_2->setFalta(1);
                    $Presenca_0_2->setMotivoId($s_falta);
                    $Presenca_0_2->setDataFalta($data_falta);
                    $Presenca_0_2->insertIntoDatabase(con());
                    //Sucesso ao cadastro
                    
                    returnAjax($r, '7');
                }else if($total2 == $cont){
                    //O funcionário está presente
                    if($dataSaidaFalta != null){
                        //O funcionário já tem falta
                        returnAjax($r, '6');
                    }
                    if($dataSaida!=null){
                        returnAjax($r, '2');
                    }else{
                        //O funcionário está presente
                        returnAjax($r, '3');
                    }
                }
            }
        }else{
            //Porfavor seleciona o motivo da falta.
            returnAjax($r, '4');
        }
    }
