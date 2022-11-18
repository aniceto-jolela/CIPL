
<script>
    function editarSenha(){
        
        var pw =  $("#pw").val();
        //Verifica se o campo da password é diferente de void
        if(pw!=="" && pw.length >= 4){
            event.preventDefault();
            var dados =  $("#formDados").serialize();
           
            $.ajax({
                type: "POST",
                url: "../servidor/e_senha_novato.php",
                dataType:'json',
                data: dados,
                //Verificações
                beforeSend: function(){
                    progresso();
                },
                success: function(i){
                        if(i.numero === '1'){location.reload("../admin/index.php");vazio();$("#alerta").html("");}
                    else if(i.numero === '2'){location.reload("../g_pessoal/index.php");vazio();$("#alerta").html("");}
                    else if(i.numero === '3'){location.reload("../g_crianca/index.php");vazio();$("#alerta").html("");}
                    else if(i.numero === '4'){location.reload("../g_salario/index.php");vazio();$("#alerta").html("");}
                    else if(i.numero === '0'){$("#alerta").html("Por favor altere a sua senha.");vazio();}
                    else if(i.numero === '40'){$("#alerta").html("Tens que iniciar a sessão.");vazio();}
                    else{alert("Erro");}
                },
                //erro do Ajax
                error: function(){
                    alert("Surgiu um erro...");
                }
            });
        }
    }
        
    //Mostra o progresso
   function progresso(){document.getElementById("progresso").src="images/loading1.gif";}
   function vazio(){document.getElementById("progresso").src="";}
</script>
