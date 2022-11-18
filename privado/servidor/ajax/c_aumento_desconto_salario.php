
<script>
    /*========================== Habilita e desabilita a comboBox ==============================*/
       function habilitarCargo(){
            var todos = document.getElementById("todos").checked;
            if(todos==true){document.getElementById("cargo").disabled=true;document.getElementById("aviso").innerHTML="";$("#aviso2").html("");}
            else{document.getElementById("cargo").disabled=false;$("#aviso2").html("");}
        }
        function voidAviso(){document.getElementById("aviso").innerHTML="";}
    /*================================== End  ==============================*/
    /*========================== Altera o nome da leibo ==============================*/
        function radioAumento(){document.getElementById("dois").innerHTML="Aumento";}
        function radioDesconto(){document.getElementById("dois").innerHTML="Desconto";}
    /*============================================= End ==============================*/
    /*========================== AJAX cadastra a folha de salário ==============================*/
    function submeterForm(){
        event.preventDefault();
        var c = document.getElementById("cargo").disabled;
        var t = document.getElementById("todos").checked;
        var cv = document.getElementById("cargo").value;
        var n = document.getElementById("aumt_desc").value;
       //Verifica se a comboBox e a checkBox estão false (e se não foi selecionado nenhum cargo)
        if(c == false && t == false && cv == "Seleciona o cargo"){
            document.getElementById("aviso").innerHTML="Por favor selecione um cargo.";$("#aviso2").html("");
        }else{
            //Verifica se o valor do input é maior que zero
            if(n>0){
                document.getElementById("aviso").innerHTML="";
                //Area do Ajax
                var dados =  $("#fomDados").serialize();
                //Evitando que barbarizão o formulário de cadastro
                if($("#enviar").val() === "Enviando..."){
                    return false;
                }
                $("#enviar").val("Enviando...");
                $.ajax({
                //Construção dentro do ajax
                type: "POST",
                url: "../servidor/c_aumento_desconto_salario.php",
                dataType:'json',
                data: dados,
                beforeSend: function(){
                    progresso();
                },
                success: function(i){
                    if(i.numero === '0'){
                        vazio();nFSalarioAlert();
                        document.getElementById("aumt_desc").value=0;
                        document.getElementById("aviso2").innerHTML="";$("#aviso").html("");
                        document.getElementById("aumet").checked=true;
                        document.getElementById("dois").innerHTML="Aumento";
                        $("#enviar").val("...");
                    }else if(i.numero === '1'){
                        alert("O Desconto é maior que o salário");vazio();
                    }else{
                        alert("Nenhum retorno");vazio();
                    }
               },
               error:function(){
                   alert("Erro");vazio();
               }
            });
            }else{document.getElementById("aviso2").innerHTML="Por favor selecione um valor que não seja menor que 0.";$("#aviso").html("");}
        }
        
    }
    /*========================== End AJAX  ==============================*/
    //Mostra o progresso
    function progresso(){
        document.getElementById("progresso").src="../../img/progresso/loading1.gif";}

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

</script>