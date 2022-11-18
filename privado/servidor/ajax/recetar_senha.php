
<script>
    /*========================== Mostra a imagem no circulo ==============================*/
       function mostrarImagem(id){
            var dados = $("#fomDados").serialize();
            $.post("../servidor/v_foto_usuario.php?id="+id,dados,function(retorno){
                document.getElementById("fotoUsu").src=retorno;$("#alerta").html("");
            });
        }
    /*================================== End  ==============================*/

    /*========================== AJAX recuperar a senha ==============================*/
    function submeterForm(){
        event.preventDefault();
        var usuario = $("#usuario").val();
       //Veifica se o usuário foi selecionado
        if(usuario != ""){
            //Area do Ajax
            var dados =  $("#minhaForm").serialize();
           
            $.ajax({
                //Construção dentro do ajax
                type: "POST",
                url: "../servidor/recetar_senha.php",
                dataType:'json',
                data: dados,
                beforeSend: function(){
                    progresso();
                },
                success: function(i){
                    $("#alerta").html("");
                    if(i.numero === '0'){
                        vazio();sucesso();
                    }else if(i.numero === '1'){
                        alert("Por favor seleciona um usuário");vazio();
                    }else{
                        alert("Nenhum retorno");vazio();
                    }
               },
               error:function(){
                   alert("Erro");$("#alerta").html("");vazio();
               }
            });
        }else{
            $("#alerta").html("Por favor seleciona o usuário.");
        }
        
    }
    /*========================== End AJAX  ==============================*/
    //Sucesso
    function sucesso(){document.getElementById("basicSuccessAnimation_recetar_senha").click();}
    //Mostra o progresso
    function progresso(){
        document.getElementById("progresso").src="../../img/progresso/loading1.gif";}

    //Oculta o progresso
    function vazio(){document.getElementById("progresso").src="";}

</script>