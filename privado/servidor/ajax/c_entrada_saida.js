/* Submeter formulário
 */

//id_formulario -> é pra identificar qual formulário que está a ser submetido
//Foi declarada aqui Para a variavel codigo ficar global
var codigo;
function SubmeterFormulario(id_formulario,cod){
    //Pega o id do cod
    codigo=cod;
    //Seleciona o radioButton
    document.getElementsByClassName("selecionado")[codigo].checked=true;
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
        //var data = new FormData($('#minhaForm'));
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
            beforeSend: function(){
                progresso(codigo);
            },
            success: function(i){
                if(i.numero === '0'){
                    //sucesso ao cadastro
                    //Limpa os campos
                        document.getElementById("ec_nome").value="";
                        document.getElementById("c_bi").value="";
                    desativar(codigo);vazio();$("#erroSC").html("");
                    //Perminte fazer a mesma cadastrar ou enditar sem atualizar a página
                    $("#enviar").val("...");
                }else if(i.numero === '1'){
                    //Limpa os campos
                        document.getElementById("ec_nome").value="";
                        document.getElementById("c_bi").value="";
                    //sucesso ao editar 
                    ativar(codigo);vazio();$("#erroSC").html("");
                    $("#enviar").val("...");
                }else if(i.numero === '2'){
                   //Limpa os campos
                        document.getElementById("ec_nome").value="";
                        document.getElementById("c_bi").value="";
                    //"Erro ao executar actividade"
                    erro_actividade();vazio();$("#erroSC").html("");
                    $("#enviar").val("...");
                }else if(i.numero === '3'){
                    //Limpa os campos
                        document.getElementById("ec_nome").value="";
                        document.getElementById("c_bi").value="";
                    //Por favor seleciona um encarregado
                    seleciona_encarregado();vazio();$("#erroSC").html("");
                    $("#enviar").val("...");
                }else if(i.numero === '4'){
                    //Preencha os compos.
                    preencha_campo();vazio();$("#erroSC").html("");
                    $("#enviar").val("...");
                }else if(i.numero === '5'){
                    //Não foi possivel selecionar está. Verifique bem os dados do teu filho
                    $("#erroSC").html("Não foi possivel selecionar está criança. Verifique bem os dados do teu filho.");
                    vazio();$("#enviar").val("...");
                }
                
            },
            //erro do Ajax
            error: function(){
                 alert("Surgiu um erro....");vazio();
            }
        });
    });

}


/*------------------------------- Area do alert ------------------------------------------*/
//Mostra a cor dos botões
function ativar(codigo){ 
    document.getElementsByClassName("botao_id")[codigo].style.background="#5cb85c"; 
    document.getElementsByClassName("botao_id")[codigo].innerHTML="Entrar"; 
}
function desativar(codigo){ 
    document.getElementsByClassName("botao_id")[codigo].style.background="#D80027"; 
    document.getElementsByClassName("botao_id")[codigo].innerHTML="Sair"; 
}
function erro_actividade(){document.getElementById("basicWarningPosition").click();}
function seleciona_encarregado(){document.getElementById("basicWarningAnimation").click();}
function preencha_campo(){ document.getElementById("basicErrorAnimation").click(); }

//Mostra o progresso
function progresso(codigo){
    document.getElementsByClassName("progresso")[codigo].src="../../img/progresso/loading1.gif";}

//Oculta o progresso
function vazio(){document.getElementsByClassName("progresso")[codigo].src="";}

/*======================================== MOSTRA OS ENCARREGADOS ==============================================*/

function encarregado(p1,p2,enc1,enc2){
    if(enc1 != "" || enc2 !=""){
        document.getElementById("p1").innerHTML=p1+" : ";
        document.getElementById("enc1").innerHTML=enc1;
        if(enc2 !=""){
        document.getElementById("p2").innerHTML=" | "+p2+" : ";
        document.getElementById("enc2").innerHTML=enc2;
        }
    }
}







    
