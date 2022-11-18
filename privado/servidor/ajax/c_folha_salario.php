
<script>
    /*============================ Dinamismo das tabela ==================================*/
        function mostraRemuneracao(){
            event.preventDefault();
            //Muda o valor do botão dos subsídio
            $("#enviar3").html("Subsídio de féria");
            $("#enviar4").html("Subsídio de 13º mês");
            var dados = $("#fomDados").serialize();
            $.post("../servidor/v_remuneracao.php",dados,function(retorna){
               $(".mR").html(retorna);
            });
        }
        function mostraSubFeria(){
            event.preventDefault();
            $("#enviar4").html("Subsídio de 13º mês");
            var dados = $("#fomDados").serialize();
            $.post("../servidor/v_sub_feria_aplicar.php",dados,function(retorna){
                //Pega o id do botão de ferias
                var btn = $("#enviar3").html();
                //Quando é a primeira vez mostra a tabela
                if(btn!="Novo Subsídio de féria"){$(".mR").html(retorna);}
                //Verifica se o botão de ferias é igual a Novo
                if(btn == "Novo Subsídio de féria"){
                    var v = document.getElementsByClassName("sub_feria_td");
                    var pega=0;
                    //Conta o total de checkBox da td
                    for(var i=0;v.length>i;i++){
                        if(v[i].checked == true){pega=1;}
                    }
                    if(pega==0){alert("Por favor selecione um funcionário");}
                    if(pega==1){
                        //==========================================* Are do Ajax *==========================
                        $.ajax({
                            //Construção dentro do ajax
                            type: "POST",
                            url: "../servidor/c_subsidio_feria.php",
                            dataType:'json',
                            data: dados,
                            beforeSend: function(){
                                progresso2();
                            },
                            success: function(i){
                                if(i.numero === '0'){
                                    vazio2();ActualizarSubFeria();nFSalarioAlert();
                                }
                                if(i.numero === '1'){
                                    vazio2();alert("Por favor selecione um funcionário");
                                }
                           },
                           error:function(){
                               alert("Erro");vazio2();
                           }
                        });
                        //==========================================* End Ajax *==========================
                    }
                }
                //Muda o nome do botão de férias
              $("#enviar3").html("Novo Subsídio de féria");
            });
        }
        function mostraSubDMes(){
            event.preventDefault();
            $("#enviar3").html("Subsídio de féria");
            var dados = $("#fomDados").serialize();
            $.post("../servidor/v_sub_dt_mes_aplicar.php",dados,function(retorna){
               //Pega o id do botão de ferias
                var btn = $("#enviar4").html();
                //Quando é a primeira vez mostra a tabela
                if(btn!="Novo Subsídio de 13º mês"){$(".mR").html(retorna);}
                //Verifica se o botão de ferias é igual a Novo
                if(btn == "Novo Subsídio de 13º mês"){
                    var v = document.getElementsByClassName("sub_tm");
                    var pega=0;
                    //Conta o total de checkBox da td
                    for(var i=0;v.length>i;i++){
                        if(v[i].checked == true){pega=1;}
                    }
                    if(pega==0){alert("Porfavor seleciona um funcionário");}
                    if(pega==1){
                        //==========================================* Are do Ajax
                        $.ajax({
                            //Construção dentro do ajax
                            type: "POST",
                            url: "../servidor/c_subsidio_d_terceiro_mes.php",
                            dataType:'json',
                            data: dados,
                            beforeSend: function(){
                                progresso3();
                            },
                            success: function(i){
                                if(i.numero === '0'){
                                    vazio3();ActualizarSubDMes();nFSalarioAlert();
                                }
                                if(i.numero === '1'){
                                    vazio3();alert("Porfavor seleciona um funcionário");
                                }
                           },
                           error:function(){
                               alert("Erro");vazio3();
                           }
                        });
                        //==========================================* End Ajax
                    }
                }
                //Muda o nome do botão de férias
              $("#enviar4").html("Novo Subsídio de 13º mês");
            });
        }
        /*========================****** Actualizar os subsídios no SUCCESS ******=============================*/
        function ActualizarSubFeria(){
            var dados = $("#fomDados").serialize();
            $.post("../servidor/v_sub_feria_aplicar.php",dados,function(retorna){
                $(".mR").html(retorna);
            });
        }
        function ActualizarSubDMes(){
            var dados = $("#fomDados").serialize();
            $.post("../servidor/v_sub_dt_mes_aplicar.php",dados,function(retorna){
                $(".mR").html(retorna);
            });
        }
        /*================================ End actualizar os subsídios no SUCCESS ==================================*/
        /*========================================= Função das checkBox */
        function subFeria(){
            var f = document.getElementById("sub_feria").checked;
            var v = document.getElementsByClassName("sub_feria_td");
            if(f == true){
                for(var i=0;v.length>i;i++){v[i].checked=true;}
            }else{for(var i=0;v.length>i;i++){v[i].checked=false;}}
        }
        function subDTM(){
            var f = document.getElementById("sub_tm").checked;
            var v = document.getElementsByClassName("sub_tm");
            if(f == true){
                for(var i=0;v.length>i;i++){v[i].checked=true;}
            }else{for(var i=0;v.length>i;i++){v[i].checked=false;}}
        }
    /*========================== End Dinamismo da tabela ==============================*/
    /*========================== Dinamismo da tabela Remuneração ==============================*/
        function mostrarFolha(i){
            event.preventDefault();
            //Adiciona o link do pdf com a data no PDF
            document.getElementById("pdf_f").href = "../servidor/pdf_folha_salario.php?cod="+i;
            var dados = $("#fomDados").serialize();
            $.post("../servidor/v_folha_salario.php?data="+i,dados,function(retorna){
               $(".mR").html(retorna);
            });
        }
    /*========================== End Dinamismo da tabela ==============================*/
    /*========================== AJAX cadastra a folha de salário ==============================*/
        function novaFolha(){
            event.preventDefault();
            //Muda o valor do botão dos subsídio
            $("#enviar3").html("Subsídio de féria");
            $("#enviar4").html("Subsídio de 13º mês");
            
            var dados =  $("#fomDados").serialize();
            $.ajax({
                //Construção dentro do ajax
                type: "POST",
                url: "../servidor/c_folha_salario.php",
                dataType:'json',
                data: dados,
                beforeSend: function(){
                    progresso();
                },
                success: function(i){
                    if(i.numero === '0'){
                        adicionaDados();vazio();nFSalarioAlert();
                        //Disablita os dois botões
                        document.getElementById("enviar").disabled=true;
                        document.getElementById("enviar2").disabled=true;
                    }
               },
               error:function(){
                   alert("Erro");vazio();
               }
            });
        }
    /*========================== End AJAX  ==============================*/
     /*========================== Adiciona a data na comboBox ==============================*/
    function adicionaDados(){
        var data = new Date();
        //Mas 1 para apresentar o mes correto
        var mes = data.getMonth()+1;
        var ano = data.getFullYear();
         //Recebe a data no select
        var lista =document.getElementById("add_data");
        //Cria o elemento
        var option = document.createElement("option");
        //Verifica se o mes é menor que 10
        if(mes<10){mes="0"+mes;}
        //Define a data do select
        var texto = ano+"-"+mes;

        //Define o texto do option
        option.textContent = texto;
        //Adiciona ou mostra texto no select
        lista.appendChild(option);
    }
    /*========================== End Adiciona a data na comboBox ==============================*/
    //Mostra o progresso
    function progresso(){
        document.getElementById("progresso").src="../../img/progresso/loading1.gif";}
    function progresso2(){
        document.getElementById("progresso2").src="../../img/progresso/loading1.gif";
        }
    function progresso3(){
        document.getElementById("progresso3").src="../../img/progresso/loading1.gif";}

    //Oculta o progresso
    function vazio(){document.getElementById("progresso").src="";}
    function vazio2(){document.getElementById("progresso2").src="";}
    function vazio3(){document.getElementById("progresso3").src="";}
    /************************************************************************************************************/
        /*========================== Mostrar o alert (número) da notificação ===============================*/
            nFSalarioAlert();
            function nFSalarioAlert(){
                var dados = $("#fomDados").serialize();
                $.post("../servidor/v_nfalert.php",dados,function(retorno){
                    $("#notifica").html(retorno);
                    if(retorno>=99){$("#notifica").html(99);}
                });
            }
        /*=================================== End alert ==================================================*/
    /************************************************************************************************************/
</script>