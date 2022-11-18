<?php
    include_once 'conectar.php';
    
    $notificacao = NotificacaoCrianca::findBySql(con(),"SELECT * FROM `notificacao_crianca`");$cont=0;
    foreach ($notificacao as $i){
        //Verifica se as notificações não foram lidas
        if($i->getEstado() == 0){++$cont;}
    }
    //Retorna o número de notificações
    echo "$cont";