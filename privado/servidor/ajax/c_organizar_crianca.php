<script>
    /*========================== Dinamismo da tabela Organizar criança ==============================*/
    function mostraOrgCrianca(){
        var dados = $("#idForm").serialize();
        $.post("../servidor/v_organizar_crianca.php",dados,function(retorna){
           $("#mTB").html(retorna);
        });
    }
    /*========================== End Organizar criança ==============================*/

/* Submeter formulário */
//id_formulario -> é pra identificar qual formulário que está a ser submetido

function submeterOrganizar(idForm){

    //frm -> pega o id do formulário, para ter o acesso a todos os conteúdo do formulario (metodo,acção...).
    let frm = $('#'+idForm);
    
    //Quando o formulário for submetido será executado automaticamente
    frm.submit(function(e){
        //e -> é usado para impedir que o formulário será submetido de forma normal.
        //preventDefault() -> impedi a submetido tradicional.
        e.preventDefault();
        
        //Evitando que barbarizão o formulário de cadastro
            if($("#enviar").val() === "Enviando..."){
                return false;
            }
            $("#enviar").val("Enviando...");
        //Submissão do formulário em Ajax
        //Usando o jQuery
        $.ajax({
            //Construção dentro do ajax
            dataType:'json',
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            cache: false,
            //Verificações
            beforeSend: function(){
               progresso();
            },
            success: function(i){
                if(i.numero === '0'){
                    $("#enviar").val("...");
                    mostraOrgCrianca();vazio();
                }else if(i.numero === '1'){
                    //erro();
                    $("#enviar").val("...");
                     alert("Erro ao organizar a criança.");vazio();
                }else if(i.numero === '2'){
                    $("#enviar").val("...");
                     alert("Por favor seleciona uma criança");vazio();
                }else if(i.numero === '3'){
                    $("#enviar").val("...");
                    alert("Por favor seleciona um educador");vazio();
                }
            },
            //erro do Ajax
            error: function(){
                alert("Surgiu um erro...");vazio();
            }
        });
    });

}
/*------------------------------- Area do alert ------------------------------------------*/
//Mostra o alerta sucesso
/*
function sucesso(){document.getElementById("basicSuccessAnimation").click();}
    //Mostra o alerta erro
function erro(){document.getElementById("basicErrorAnimation_usuario").click();}
function erro_espaco(){document.getElementById("basicErrorAnimation_usuario_espaco").click();}
*/
//Progresso
function progresso(){document.getElementById("progresso").src="../../img/progresso/loading1.gif";}
function vazio(){document.getElementById("progresso").src="";}
</script>