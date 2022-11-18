
<script>
    /*===================== Faz o controlo do limite do praso do pagamento... ==================================*/
    data = new Date();
    var dia = data.getDate();
    //+1 Para pegar o mes certo
    var mes = data.getMonth()+1;
    var ano = data.getFullYear();
    if(dia<10){dia="0"+dia;}
    if(mes<10){mes="0"+mes;}
    var dataAct = ano+"-"+mes+"-"+dia;
    /*================= End Controle da data de emissão*/
    
    //var m = data.getMonth();
    //Altera no input (adiciona o máximo do mês inferior a 12)
    document.getElementById("mes").max=12;Mes();
    function Mes(){
        var meses = Array("JANEIRO","FEVEREIRO","MARÇO","ABRIL","MAIO","JUNHO","JULHO","AGOSTO","SETEMBRO","OUTUBRO","NOVEMBRO","DEZEMBRO");
        var MAX = document.getElementById("mes").value;
        //Verifica se o total de mês é maior ou igual ao mês digitado(input Number) e o Number for maior que zero
        if(12>=MAX &&  MAX>0){
            totN=Number.parseInt(MAX)-1;
            M=meses[totN];
            document.getElementById("mesAuto").innerHTML=M;
        }else{
            //Dinamiza o input Number se os dados forem invalidos
            document.getElementById("mes").value=1;
            document.getElementById("mesAuto").innerHTML=meses[0];
        }
    }
    /*================================== End  ==================================*/
    /*============================ Dinamismo das tabela Criança ==================================*/
        function mostrarCriana(){
            var i = $("#s_encarregado").val();
            document.getElementById("info").style="color:black";
            var dados = $("#fomDados").serialize();
            $.post("../servidor/v_crianca_pagamento.php?cod="+i,dados,function(retorna){
               $("#info").html(retorna);
            });
        }
    /*============================ End Dinamismo das tabela Criança ==================================*/
    /*============================ Seleciona todas CheckBox ==================================*/
    function sTodas(){
        var t = document.getElementById("totos").checked;
        var s = document.getElementsByClassName("s_crianca");
        if(t == true){
            for(var i = 0;s.length>i;i++){s[i].checked=true;}
        }else{
            for(var i = 0;s.length>i;i++){s[i].checked=false;}
        }
    }
    /*================================ End Seleciona  ==================================*/
    /*================================ Area do Ajax  ==================================*/
    function cPagamento(){
        event.preventDefault();
        var enc = $("#s_encarregado").val();
        if(enc == ""){
            $("#info").html("Por favor selecione um encarregado.");
            document.getElementById("info").style="color:red";
        }else{
            //Verifica se a data é menor ou igual a actual
            if(dataAct >= $("#data").val()){
                //================ AJAX
                var dados = new FormData($('#fomDados')[0]);
                $.ajax({
                //Construção dentro do ajax
                type: "POST",
                url: "../servidor/c_pagamento.php",
                dataType:'json',
                data: dados,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function(){
                    progresso();
                },
                success: function(i){
                    if(i.numero === '0'){
                        $("#codigo").val("");
                        $("#data").val("");
                        $("#f_talao").val("");$("#dataAl").html("");
                        vazio();mostrarCriana();nFSalarioAlert();LimpaT();
                    }
                    if(i.numero === '1'){
                        vazio();
                        //"Verifica o código do talão ou a data"
                        pagamento_cod_dat();LimpaT();
                    }
                    if(i.numero === '2'){
                        vazio();
                        //"Nenhuma criança selecionada"
                        pagamento_void_tb();LimpaT();
                    }
                    if(i.numero === '3'){
                        $("#dataAl").html("");vazio();
                        //O pagamento deste ano já foi feito
                        alert("Passou o limite do mês, por favor reduza \n o número do mês.");mostrarCriana();LimpaT();
                    }
                    if(i.numero === '4'){
                        $("#dataAl").html("");vazio();
                        $("#codigo").val("");$("#data").val("");$("#f_talao").val("");
                        alert("O pagamento deste ano já foi feito \n por favor aguarde o próximo ano.");mostrarCriana();LimpaT();
                    }
                    if(i.numero === '8'){
                        alert("O mês selecionado tem que ser maior que o mês actual.");vazio();LimpaT();$("#dataAl").html("");
                    }
                    else if(i.numero === '5'){$("#arqTalao").html("Este ficheiro já existe, porfavor altere o nome.");vazio();$("#dataAl").html("");}
                    else if(i.numero === '6'){$("#arqTalao").html("Imagem inválida.");vazio();$("#dataAl").html("");}
                    else if(i.numero === '7'){$("#arqTalao").html("O tamanho max é 1,99 MB.");vazio();$("#dataAl").html("");}
               },
               error:function(){
                   alert("Erro");vazio();
               }
            });
            }else{document.getElementById("dataAl").innerHTML="A data tem que ser menor ou igual a data actual.";}
        }
    }
    
    //Mostra o progresso
      function progresso(){
        document.getElementById("progresso").src="../../img/progresso/loading1.gif";}
    function pagamento_cod_dat(){document.getElementById("basicErrorAnimation_pagamento_encarregado").click();}
    function pagamento_void_tb(){document.getElementById("basicErrorAnimation_pagamento_crianca_void").click();}
    
    //Oculta o progresso
    function vazio(){document.getElementById("progresso").src="";}
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
        function LimpaT(){$("#arqTalao").html("");}
</script>