<script>
    /*--================= Funções para o formulário ser bem validado =======================--*/
    //Função de controle do encarregado
    function Existente(){
        var Ver = document.querySelectorAll(".V");
        for(var i = 0;i < Ver.length;i++){
            Ver[i].style.display="none";
        }

        /* Selecionar encarregado*/
        document.getElementById("V").style.display="inline";
        /* Apaga os dados dos encarregados */
        document.getElementById("encarregado_1").value="";
        document.getElementById("encarregado_2").value="";
        document.getElementById("f_c_bi_1").value="";
        document.getElementById("f_c_bi_2").value="";
        document.getElementById("t1").value="";
        document.getElementById("t2").value="";
    }

    function Novo(){
        var Ver = document.querySelectorAll(".V");
        for(var i = 0;i < Ver.length;i++){
            Ver[i].style.display="inline";
        }
        /* Selecionar encarregado*/
        document.getElementById("V").style.display="none";
    }
    //Funcão da idade
    function Mes(){
        document.getElementById("idade").max=12;
    }

    function Ano(){
        document.getElementById("idade").max=5;
    }
    //Total de encarregado
    function Total_1(){
        document.getElementById("encarregado_2").disabled=true;
        document.getElementById("t2").disabled=true;
        document.getElementById("f_c_bi_2").disabled=true;
        document.getElementById("parente_2").disabled=true;
        document.getElementById("t2").value="";
        document.getElementById("f_c_bi_2").value="";
        document.getElementById("encarregado_2").value="";
    }
    function Total_2(){
        document.getElementById("encarregado_2").disabled=false;
        document.getElementById("t2").disabled=false;
        document.getElementById("f_c_bi_2").disabled=false;
        document.getElementById("parente_2").disabled=false;
    }
    /*--================= End Funções para o formulário ser bem validado =======================--*/
    /*============================================= Submeter formulário ========================================*/
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
                 // mimeType: "multipart/form-data",
                dataType:'json',
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: new FormData($('#minhaForm')[0]),
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
                        LimparTodos();sucesso();mostrarComBox();
                        $("#enviar").val("...");vazio();
                    }else if(i.numero === '1'){
                        alert("Erro na base de dados");vazio();LimparTodos();
                    }else if(i.numero === '2'){
                        //Erro ao preencher o formulário
                        $("#enviar").val("...");erro();vazio();LimparTodos();
                    }else if(i.numero === '3'){$("#arqPerfil").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar1();$("#enviar").val("...");}
                    else if(i.numero === '4'){$("#arqPerfil").html("Imagem inválida.");vazio();Limpar1();$("#enviar").val("...");}
                    else if(i.numero === '5'){$("#arqPerfil").html("O tamanho max é 1,99 MB.");vazio();Limpar1();$("#enviar").val("...");}
                    else if(i.numero === '6'){$("#arqMedico").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar2();$("#enviar").val("...");}
                    else if(i.numero === '7'){$("#arqMedico").html("PDF inválido.");vazio();Limpar2();$("#enviar").val("...");}
                    else if(i.numero === '8'){$("#arqMedico").html("O tamanho max é 1,99 MB.");vazio();Limpar2();$("#enviar").val("...");}
                    else if(i.numero === '9'){$("#arqCedula").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar3();$("#enviar").val("...");}
                    else if(i.numero === '10'){$("#arqCedula").html("PDF inválido.");vazio();Limpar3();$("#enviar").val("...");}
                    else if(i.numero === '11'){$("#arqCedula").html("O tamanho max é 1,99 MB.");vazio();Limpar3();$("#enviar").val("...");}
                    else if(i.numero === '12'){$("#arqVacina").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar4();$("#enviar").val("...");}
                    else if(i.numero === '13'){$("#arqVacina").html("PDF inválido.");vazio();Limpar4();$("#enviar").val("...");}
                    else if(i.numero === '14'){$("#arqVacina").html("O tamanho max é 1,99 MB.");vazio();Limpar4();$("#enviar").val("...");}
                    else if(i.numero === '15'){$("#arqMatricula").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar5();$("#enviar").val("...");}
                    else if(i.numero === '16'){$("#arqMatricula").html("PDF inválido.");vazio();Limpar5();$("#enviar").val("...");}
                    else if(i.numero === '17'){$("#arqMatricula").html("O tamanho max é 1,99 MB.");vazio();Limpar5();$("#enviar").val("...");}
                    else if(i.numero === '18'){$("#arqPagamento").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar6();$("#enviar").val("...");}
                    else if(i.numero === '19'){$("#arqPagamento").html("PDF inválido.");vazio();Limpar6();$("#enviar").val("...");}
                    else if(i.numero === '20'){$("#arqPagamento").html("O tamanho max é 1,99 MB.");vazio();Limpar6();$("#enviar").val("...");}
                    else if(i.numero === '21'){$("#arqBI1").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar7();$("#enviar").val("...");}
                    else if(i.numero === '22'){$("#arqBI1").html("PDF inválido.");vazio();Limpar7();$("#enviar").val("...");}
                    else if(i.numero === '23'){$("#arqBI1").html("O tamanho max é 1,99 MB.");vazio();Limpar7();$("#enviar").val("...");}
                    else if(i.numero === '24'){$("#arqBI2").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar8();$("#enviar").val("...");}
                    else if(i.numero === '25'){$("#arqBI2").html("PDF inválido.");vazio();Limpar8();$("#enviar").val("...");}
                    else if(i.numero === '26'){$("#arqBI2").html("O tamanho max é 1,99 MB.");vazio();Limpar8();$("#enviar").val("...");}
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

    /*--================= Mostrar ComboBox do encarregado =======================--*/
    function mostrarComBox(){
        var dados = $("#minhaForm").serialize();
        $.post("../servidor/v_encarregado.php",dados,function(retorno){
            $("#vEncarregado").html(retorno);
        });
    }
    /*------------------------------- Area do alert ------------------------------------------*/
    //Mostra o sucess e o error
    function sucesso(){
        document.getElementById("nome").value="";document.getElementById("idade").value="";document.getElementById("perfil_").value="";
        document.getElementById("f_at_medico").value="";document.getElementById("f_cop_cedula").value="";document.getElementById("f_cop_c_vacina").value="";
        document.getElementById("f_ficha_matricula").value="";document.getElementById("f_comp_pagamento").value="";
        document.getElementById("f_c_bi_1").value="";document.getElementById("f_c_bi_2").value="";
        document.getElementById("encarregado_1").value="";document.getElementById("encarregado_2").value="";
        document.getElementById("t1").value="";document.getElementById("t2").value="";
        document.getElementById("basicSuccessAnimation_crianca").click();
    }
    function erro(){document.getElementById("basicErrorAnimation_crianca").click();}

    //Mostra o progresso
    function progresso(){ document.getElementById("progresso").src="../../img/progresso/loading1.gif"; }

    //Oculta o progresso
    function vazio(){document.getElementById("progresso").src="";}
    //=========================Limpar a validação
    function LimparTodos(){
        $("#arqPerfil").html("");$("#arqMedico").html("");$("#arqCedula").html("");$("#arqVacina").html("");
        $("#arqMatricula").html("");$("#arqPagamento").html("");$("#arqBI1").html("");$("#arqBI2").html("");
    }
    function Limpar1(){
        $("#arqMedico").html("");$("#arqCedula").html("");$("#arqVacina").html("");
        $("#arqMatricula").html("");$("#arqPagamento").html("");$("#arqBI1").html("");$("#arqBI2").html("");
    }
    function Limpar2(){
        $("#arqPerfil").html("");$("#arqCedula").html("");$("#arqVacina").html("");
        $("#arqMatricula").html("");$("#arqPagamento").html("");$("#arqBI1").html("");$("#arqBI2").html("");
    }
    function Limpar3(){
        $("#arqPerfil").html("");$("#arqMedico").html("");$("#arqVacina").html("");
        $("#arqMatricula").html("");$("#arqPagamento").html("");$("#arqBI1").html("");$("#arqBI2").html("");
    }
    function Limpar4(){
        $("#arqPerfil").html("");$("#arqMedico").html("");$("#arqCedula").html("");
        $("#arqMatricula").html("");$("#arqPagamento").html("");$("#arqBI1").html("");$("#arqBI2").html("");
    }
    function Limpar5(){
        $("#arqPerfil").html("");$("#arqMedico").html("");$("#arqCedula").html("");$("#arqVacina").html("");
        $("#arqPagamento").html("");$("#arqBI1").html("");$("#arqBI2").html("");
    }
    function Limpar6(){
        $("#arqPerfil").html("");$("#arqMedico").html("");$("#arqCedula").html("");$("#arqVacina").html("");
        $("#arqMatricula").html("");$("#arqBI1").html("");$("#arqBI2").html("");
    }
    function Limpar7(){
        $("#arqPerfil").html("");$("#arqMedico").html("");$("#arqCedula").html("");$("#arqVacina").html("");
        $("#arqMatricula").html("");$("#arqPagamento").html("");$("#arqBI2").html("");
    }
    function Limpar8(){
        $("#arqPerfil").html("");$("#arqMedico").html("");$("#arqCedula").html("");$("#arqVacina").html("");
        $("#arqMatricula").html("");$("#arqPagamento").html("");$("#arqBI1").html("");
    }
    
</script>