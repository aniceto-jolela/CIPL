/* Submeter formulário
 */

//id_formulario -> é pra identificar qual formulário que está a ser submetido

function SubmeterFormulario(id_formulario){
    //frm -> pega o id do formulário, para ter o acesso a todos os conteúdo do formulario (metodo,acção...).
    let frm = $('#'+id_formulario);
    
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
            //type -> qual é o tipo de Request (estamos utilizar o post) podemos ir buscar do nosso formulário frm
            //attr -> ir buscar o atributo cusjo o nome é ...
            //url -> busca acção que é usada no formulário
            //data -> busca os dados do formulário ou melhor são os dados que será enviado para o servidor.
            //FormData -> serve para trabalhar com ficheiros 
            //dataType-> é o valor que estas esperando, estas esperrando um valor do servidor (pode ser em html,xml ou json).
            //serialize() -> pega toda a informação dentro dos input do formulário e coloca dentro do obj data
            // que é a informação enviada do pedido do AJAX.
            
            dataType:'json',
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: new FormData($('#minhaForm')[0]),
            processData: false,
            contentType: false,
            cache: false,
            //Verificações
            /*
            beforeSend: function(){
              
            },*/
            success: function(i){
                if(i.numero === '0'){
                    //Limpa os campos
                    document.getElementById("nome").value="";
                    document.getElementById("usuario").value="";
                    document.getElementById("email").value="";
                    document.getElementById("tel").value="";
                    document.getElementById("senha").value="";
                    document.getElementById("file").value="";
                    $("#arqFoto").html("");$("#enviar").val("...");
                    //sucesso do cadastro
                    sucesso();
                }else if(i.numero === '1'){
                    alert("Erro ao cadastrar");
                }
                else if(i.numero === '2'){
                    document.getElementById("usuario").value="";
                    erro();$("#enviar").val("...");
                }else if(i.numero === '3'){
                    document.getElementById("usuario").value="";
                    erro_espaco();$("#enviar").val("...");
                }else if(i.numero === '4'){
                    $("#arqFoto").html("Este ficheiro já existe, porfavor altere o nome.");$("#enviar").val("...");
                }else if(i.numero === '5'){
                    $("#arqFoto").html("Imagem inválida.");$("#enviar").val("...");
                }
                else if(i.numero === '6'){
                    $("#arqFoto").html("O tamanho max é 1,99 MB.");$("#enviar").val("...");
                }
            },
            //erro do Ajax
            error: function(){
                //alert("Numero = "+i.numero);
                alert("Surgiu um erro...");
            }
        });
    });

}
/*------------------------------- Area do alert ------------------------------------------*/
//Mostra o alerta sucesso
function sucesso(){document.getElementById("basicSuccessAnimation").click();}
    //Mostra o alerta erro
function erro(){document.getElementById("basicErrorAnimation_usuario").click();}
function erro_espaco(){document.getElementById("basicErrorAnimation_usuario_espaco").click();}

    