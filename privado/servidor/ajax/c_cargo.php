
<script>

    /*========================== AJAX recuperar a senha ==============================*/
    function submeterForm(){
        
        //Verifica se o input do cargo é diferente de void
        if($("#nome").val() != ""){
            //Evitando que barbarizão o formulário de cadastro
            if($("#enviar").val() === "Enviando..."){return false;}
            $("#enviar").val("Enviando...");
            
            event.preventDefault();
            var dados =  $("#minhaForm").serialize();
            //Area do Ajax
            $.ajax({
                //Construção dentro do ajax
                type: "POST",
                url: "../servidor/c_cargo.php",
                dataType:'json',
                data: dados,
                beforeSend: function(){
                    progresso();
                },
                success: function(i){
                    if(i.numero === '0'){
                        vazio();sucesso();
                        $("#enviar").val("...");
                    }else if(i.numero === '1'){
                        document.getElementById("alerta").innerHTML="Este cargo já existe";vazio();$("#enviar").val("...");
                    }else{
                        alert("Nenhum retorno");vazio();
                    }
               },
               error:function(){
                   alert("Erro");vazio();
               }
            });
        }
    }
    /*========================== End AJAX  ==============================*/
    //Sucesso
    function sucesso(){
        document.getElementById("nome").value="";
        document.getElementById("alerta").innerHTML="";
        document.getElementById("basicSuccessAnimation_cargo").click();}
    //Mostra o progresso
    function progresso(){
        document.getElementById("progresso").src="../../img/progresso/loading1.gif";}

    //Oculta o progresso
    function vazio(){document.getElementById("progresso").src="";}

</script>