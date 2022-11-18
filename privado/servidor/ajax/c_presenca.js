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
    //Pega o valor do texto
    var obs = document.getElementsByClassName("obs_")[codigo].value;
    //Adiciona o valor no input observação
    document.getElementById("obs").value=obs;
    
    //frm -> pega o id do formulário, para ter o acesso a todos os conteúdo do formulario (metodo,acção...).
    let frm = $('#'+id_formulario);
    
    //Quando o formulário for submetido será executado automaticamente
    frm.submit(function(e){
        //e -> é usado para impedir que o formulário será submetido de forma normal.
        //preventDefault() -> impedi a submetido tradicional.
        e.preventDefault();
        
        //Evitando que barbarizão o formulário de cadastro
            if($("#enviar").val() === "Enviando..." || $("#enviar2").val() === "Enviando..."){
                return false;
            }
            $("#enviar").val("Enviando...");$("#enviar2").val("Enviando...");
        
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
            data: frm.serialize(),
            //Verificações
            beforeSend: function(){
                progresso(codigo);
            },
            success: function(i){
                //Perminte fazer a mesma cadastrar ou enditar sem atualizar a página
                if(i.numero === '0'){
                    //sucesso ao cadastro
                    sair(codigo);vazio();
                    $("#enviar").val("..."); $("#enviar2").val("...");
                }else if(i.numero === '1'){
                    //sucesso ao editar 
                    entrar(codigo);vazio();
                    $("#enviar").val("..."); $("#enviar2").val("...");
                }else if(i.numero === '2'){
                    //O funcionário já não se encontra na creche.
                    funcionario_saida();vazio();
                    $("#enviar").val("..."); $("#enviar2").val("...");
                }else if(i.numero === '3'){
                    //O funcionário está presente.
                    funcionario_presente();vazio();
                    $("#enviar").val("..."); $("#enviar2").val("...");
                }else if(i.numero === '4'){
                    //Porfavor seleciona o motivo da falta.
                    motivo_falta();vazio();
                    $("#enviar").val("..."); $("#enviar2").val("...");
                }else if(i.numero === '5'){
                    //O funcionário está ausente
                    funcionario_ausente();vazio();
                    $("#enviar").val("..."); $("#enviar2").val("...");
                }else if(i.numero === '6'){
                    //O funcionário já tem falta
                    funcionario_falta();vazio();
                    $("#enviar").val("..."); $("#enviar2").val("...");
                }else if(i.numero === '7'){
                    //Falta
                    falta(codigo);vazio();
                    $("#enviar").val("..."); $("#enviar2").val("...");
                }else if(i.numero === '8'){
                    //Tem excesso de faltas
                    excesso_falta(codigo);vazio();
                    $("#enviar").val("..."); $("#enviar2").val("...");
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

function entrar(codigo){ 
    document.getElementsByClassName("botao_id")[codigo].style.background="#5cb85c"; 
    document.getElementsByClassName("botao_id")[codigo].innerHTML="Entrar"; 
    document.getElementsByClassName("obs_")[codigo].disabled=true;
}
function sair(codigo){ 
    document.getElementsByClassName("botao_id")[codigo].style.background="#D80027"; 
    document.getElementsByClassName("botao_id")[codigo].innerHTML="Sair"; 
    document.getElementsByClassName("obs_")[codigo].disabled=false;
}
function falta(codigo){ 
    document.getElementsByClassName("botao_id2")[codigo].style.background="#f60507"; 
    document.getElementsByClassName("botao_id2")[codigo].innerHTML="Faltou"; 
}
function funcionario_saida(){document.getElementById("basicErrorAnimation_presenca_funcionario_saida").click();}
function funcionario_presente(){document.getElementById("basicErrorAnimation_presenca_funcionario_presente").click();}
function motivo_falta(){document.getElementById("basicErrorAnimation_presenca_motivo_falta").click();}
function funcionario_ausente(){document.getElementById("basicErrorAnimation_presenca_ausente").click();}
function funcionario_falta(){ document.getElementById("basicErrorAnimation_presenca_falta").click(); }
function excesso_falta(){ document.getElementById("basicErrorAnimation_presenca_excesso_falta").click(); }

//Mostra o progresso
function progresso(codigo){
    document.getElementsByClassName("progresso")[codigo].src="../../img/progresso/loading1.gif";}

//Oculta o progresso
function vazio(){document.getElementsByClassName("progresso")[codigo].src="";}

//===================================  POSTO DE TRABALHO =========================================
function posto(p){document.getElementById("posto").innerHTML=p;}
    
