/* Submeter formulário
 */

//id_formulario -> é pra identificar qual formulário que está a ser submetido

function cadastrarFuncionario(id_formulario){
    
//    $("#formFuncionario").validate({
//        rules: {nome: {required: true},perfil: {required: true},f_declaracao: {required: true}},
//        messages: {nome: {required: "Digite o Nome do Funcionário"},perfil: {required: "Digite a sua foto do perfil"},
//            f_declaracao: {required: "Digite a sua declaração"}},
//            submitHandler: function () {alert("Oi");}
//    });
//            

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
            data: new FormData($('#formFuncionario')[0]),
            processData: false,
            contentType: false,
            cache: false,
            //Verificações
            beforeSend: function(){
                progresso();
            },
            success: function(i){
                if(i.numero === '0'){
                    //sucesso do cadastro
                    //Limpa os campos
                    document.getElementById("nome").value="";
                    document.getElementById("iban_escrito").value="";
                    document.getElementById("n_bi").value="";
                    document.getElementById("validade").value="";
                    document.getElementById("tel").value="";
                    document.getElementById("perfil_func").value="";
                    document.getElementById("f_declaracao").value="";
                    document.getElementById("f_iban").value="";
                    document.getElementById("f_copia_bi").value="";
                    document.getElementById("f_atestado_medico").value="";
                    document.getElementById("f_boletim_sanidade").value="";
                    sucesso();vazio();$("#enviar").val("...");LimparTodos();
                }else if(i.numero === '1'){
                    alert("Erro na base de dados");vazio();LimparTodos();
                }else if(i.numero === '2'){$("#arqPerfil").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar1();$("#enviar").val("...");}
                else if(i.numero === '3'){$("#arqPerfil").html("Imagem inválida.");vazio();Limpar1();$("#enviar").val("...");}
                else if(i.numero === '4'){$("#arqPerfil").html("O tamanho max é 1,99 MB.");vazio();Limpar1();$("#enviar").val("...");}
                else if(i.numero === '5'){$("#arqDeclaracao").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar2();$("#enviar").val("...");}
                else if(i.numero === '6'){$("#arqDeclaracao").html("PDF inválido.");vazio();Limpar2();$("#enviar").val("...");}
                else if(i.numero === '7'){$("#arqDeclaracao").html("O tamanho max é 1,99 MB.");vazio();Limpar2();$("#enviar").val("...");}
                else if(i.numero === '8'){$("#arqIban").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar3();$("#enviar").val("...");}
                else if(i.numero === '9'){$("#arqIban").html("PDF inválido.");vazio();Limpar3();$("#enviar").val("...");}
                else if(i.numero === '10'){$("#arqIban").html("O tamanho max é 1,99 MB.");vazio();Limpar3();$("#enviar").val("...");}
                else if(i.numero === '11'){$("#arqBI").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar4();$("#enviar").val("...");}
                else if(i.numero === '12'){$("#arqBI").html("PDF inválido.");vazio();Limpar4();$("#enviar").val("...");}
                else if(i.numero === '13'){$("#arqBI").html("O tamanho max é 1,99 MB.");vazio();Limpar4();$("#enviar").val("...");}
                else if(i.numero === '14'){$("#arqAtestado").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar5();$("#enviar").val("...");}
                else if(i.numero === '15'){$("#arqAtestado").html("PDF inválido.");vazio();Limpar5();$("#enviar").val("...");}
                else if(i.numero === '16'){$("#arqAtestado").html("O tamanho max é 1,99 MB.");vazio();Limpar5();$("#enviar").val("...");}
                else if(i.numero === '17'){$("#arqBoletim").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar6();$("#enviar").val("...");}
                else if(i.numero === '18'){$("#arqBoletim").html("PDF inválido.");vazio();Limpar6();$("#enviar").val("...");}
                else if(i.numero === '19'){$("#arqBoletim").html("O tamanho max é 1,99 MB.");vazio();Limpar6();$("#enviar").val("...");}
                else{
                    alert("Nenhum retorno");vazio();LimparTodos();
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
//Mostra o progresso
function progresso(){ document.getElementById("progresso").src="../../img/progresso/preloader.gif"; }

//Oculta o progresso
function vazio(){document.getElementById("progresso").src="";}

function sucesso(){document.getElementById("basicWarningPosition_funcionario_inserir").click();}
//=========================Limpar a validação
function LimparTodos(){
    $("#arqPerfil").html("");$("#arqDeclaracao").html("");$("#arqIban").html("");
    $("#arqBI").html("");$("#arqAtestado").html("");$("#arqBoletim").html("");
}
function Limpar1(){
    $("#arqDeclaracao").html("");$("#arqIban").html("");
    $("#arqBI").html("");$("#arqAtestado").html("");$("#arqBoletim").html("");
}
function Limpar2(){
    $("#arqPerfil").html("");$("#arqIban").html("");
    $("#arqBI").html("");$("#arqAtestado").html("");$("#arqBoletim").html("");
}
function Limpar3(){
    $("#arqPerfil").html("");$("#arqDeclaracao").html("");
    $("#arqBI").html("");$("#arqAtestado").html("");$("#arqBoletim").html("");
}
function Limpar4(){
    $("#arqPerfil").html("");$("#arqDeclaracao").html("");$("#arqIban").html("");
    $("#arqAtestado").html("");$("#arqBoletim").html("");
}
function Limpar5(){
    $("#arqPerfil").html("");$("#arqDeclaracao").html("");$("#arqIban").html("");
    $("#arqBI").html("");$("#arqBoletim").html("");
}
function Limpar6(){
    $("#arqPerfil").html("");$("#arqDeclaracao").html("");$("#arqIban").html("");
    $("#arqBI").html("");$("#arqAtestado").html("");
}


