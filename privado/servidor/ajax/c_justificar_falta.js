/*========================== Dinamismo da tabela ==============================*/

function mostrarFalta(funcionarioSelecionado){
    var resultado = document.getElementById("info");
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    if(funcionarioSelecionado === ""){
        resultado.innerHTML="";
    }else{
        //Construção do AJAX
        xmlhttp.onreadystatechange=function(){
           if(this.readyState === 4 && this.status===200){
                resultado.innerHTML=this.responseText;
            }
        };
        xmlhttp.open("GET","../servidor/v_falta.php?funcionario="+funcionarioSelecionado,true);
        xmlhttp.send();
    }
}

/*========================== Cadastrar o justificativo ==============================*/

function submeterJustificar(id_formulario){
    fs = document.getElementById("fs").value;
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
                        vazio();
                    //Limpa os campos
                    document.getElementById("f_justificativo").value="";
                    $("#enviar").val("...");
                    mostrarFalta(fs);
                }else if(i.numero === '1'){
                    nao_justificou();
                    $("#enviar").val("...");vazio();
                }else if(i.numero === '2'){
                   funcionario_void();
                    $("#enviar").val("...");vazio();
                }else{
                    //erro ao cadastrar
                     alert("Erro ao justificar a falta");vazio();
                }
            },
            //erro do Ajax
            error: function(){
                //alert("Numero = "+i.numero);
                alert("Surgiu um erro...");vazio();
            }
        });
    });
}

/*------------------------------- Area do alert ------------------------------------------*/
    //Mostra o alerta erro
function nao_justificou(){document.getElementById("basicErrorAnimation_justificativo_funcionario_n_justificou").click();}
function funcionario_void(){document.getElementById("basicErrorAnimation_justificativo_funcionario_void").click();}

//Progresso
function progresso(){document.getElementById("progresso").src="../../img/progresso/loading1.gif";}
function vazio(){document.getElementById("progresso").src="";}
    




