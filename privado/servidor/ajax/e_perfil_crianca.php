<script>
     /*=================== FUNÇÃO DA IDADE =============================*/
        function Mes(){document.getElementById("idade").max=12;}
        function Ano(){document.getElementById("idade").max=5;}
    
    /*=================== SELECIONA OS DADOS PARA ACOMBOBOX =============================*/
    function comboBox(sexo,parent1,parent2,idade,educador,turma,sala){
        $("#sx").val(sexo).select();
        if(parent1 != ""){
            //menos 1 pq o vetor começa do indice 0
             p1 = parent1-1;
            document.getElementsByClassName("parent")[p1].selected=true;
        }
        /*=================== PARTE DO EDUCADOR */
        if(educador != ""){
            var Ver = document.getElementsByClassName("educador1");
            for(var i = 0;i < Ver.length;i++){
                vid = Ver[i].value;
                if(vid == educador){
                    //Seleciona o educador
                    document.getElementsByClassName("educador1")[i].selected=true;
                }
            }
            t=turma-1;
            document.getElementsByClassName("turma1")[t].selected=true;
            s=sala-1;
            document.getElementsByClassName("sala1")[s].selected=true;
            document.getElementById("habilita_edu").checked=true;
            document.getElementById("habilita_edu").disabled=true;
        }
        if(educador == ""){
            //Disablita o educador ,sala e turma
            document.getElementById("educador1").disabled=true;
            document.getElementById("turma1").disabled=true;
            document.getElementById("sala1").disabled=true;
        }
        /*=================== ARTE DO PARENTE OU FAMILIA */
        if(parent2 != ""){
            p2 = parent2-1;
            document.getElementsByClassName("parent2")[p2].selected=true;
            document.getElementById("habilita").checked=true;
            document.getElementById("habilita").disabled=true;
        }
        //Disabilita os campos do encarregado 2
        if(parent2 == ""){
            document.getElementById("encarregado2").disabled=true;
            document.getElementById("parent2").disabled=true;
            document.getElementById("c_bi_").disabled=true;
            document.getElementById("tel2").disabled=true;
        }
        //subistitui o mes e o ano em void, para ficar somente o nº
        mesN = idade.replace(" meses","");
        anosN = idade.replace(" anos","");
        //subistitui o nº do mes em void para ficar somente o meses (para poder verificar)
        mes = idade.replace(mesN+" ","");
        
        if(mes == "meses"){
            document.getElementById("idade").max=12;
            $("#idade").val(mesN);
            document.getElementsByClassName("idade")[0].checked=true;
        }else{
            document.getElementById("idade").max=5;
            $("#idade").val(anosN);
            document.getElementsByClassName("idade")[1].checked=true;
        }
        
    }
    /*=================== HABILITA ENCARREGADO 2 =============================*/
    function habilitar(){
        v = document.getElementById("habilita").checked;
        if(v == true){
            //Abilita
            document.getElementById("encarregado2").disabled=false;
            document.getElementById("parent2").disabled=false;
            document.getElementById("c_bi_").disabled=false;
            document.getElementById("tel2").disabled=false;
        }else{
            document.getElementById("encarregado2").disabled=true;
            document.getElementById("parent2").disabled=true;
            document.getElementById("c_bi_").disabled=true;
            document.getElementById("tel2").disabled=true;
        }
    }
     /*=================== HABILITA A COMBOBOX DO EDUCADOR =============================*/
    function habilitar_edu(){
        v = document.getElementById("habilita_edu").checked;
        if(v == true){
            //Abilita
            document.getElementById("educador1").disabled=false;
            document.getElementById("turma1").disabled=false;
            document.getElementById("sala1").disabled=false;
        }else{
            document.getElementById("educador1").disabled=true;
            document.getElementById("turma1").disabled=true;
            document.getElementById("sala1").disabled=true;
        }
    }
    /*==================================================================================*/ 
    /*=================== AREA DO AJAX =============================*/
   
    function submeterForm(id_formulario){
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
                dataType:'json',
                type: frm.attr('method'),
                url: frm.attr('action'),
                data: new FormData($('#formID')[0]),
                processData: false,
                contentType: false,
                cache: false,
                //Verificações
                
                beforeSend: function(){
                    progresso();
                },
                success: function(i){
                    if(i.numero === '0'){
                        $("#enviar").val("...");vazio();
                        //sucesso do cadastro
                        sucesso();LimparTodos();
                    }
                    else if(i.numero === '2'){$("#arqPerfil").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar1();$("#enviar").val("...");}
                    else if(i.numero === '3'){$("#arqPerfil").html("Imagem inválida.");vazio();Limpar1();$("#enviar").val("...");}
                    else if(i.numero === '4'){$("#arqPerfil").html("O tamanho max é 1,99 MB.");vazio();Limpar1();$("#enviar").val("...");}
                    else if(i.numero === '5'){$("#arqMedico").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar2();$("#enviar").val("...");}
                    else if(i.numero === '6'){$("#arqMedico").html("PDF inválido.");vazio();Limpar2();$("#enviar").val("...");}
                    else if(i.numero === '7'){$("#arqMedico").html("O tamanho max é 1,99 MB.");vazio();Limpar2();$("#enviar").val("...");}
                    else if(i.numero === '8'){$("#arqCedula").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar3();$("#enviar").val("...");}
                    else if(i.numero === '9'){$("#arqCedula").html("PDF inválido.");vazio();Limpar3();$("#enviar").val("...");}
                    else if(i.numero === '10'){$("#arqCedula").html("O tamanho max é 1,99 MB.");vazio();Limpar3();$("#enviar").val("...");}
                    else if(i.numero === '11'){$("#arqVacina").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar4();$("#enviar").val("...");}
                    else if(i.numero === '12'){$("#arqVacina").html("PDF inválido.");vazio();Limpar4();$("#enviar").val("...");}
                    else if(i.numero === '13'){$("#arqVacina").html("O tamanho max é 1,99 MB.");vazio();Limpar4();$("#enviar").val("...");}
                    else if(i.numero === '14'){$("#arqMatricula").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar5();$("#enviar").val("...");}
                    else if(i.numero === '15'){$("#arqMatricula").html("PDF inválido.");vazio();Limpar5();$("#enviar").val("...");}
                    else if(i.numero === '16'){$("#arqMatricula").html("O tamanho max é 1,99 MB.");vazio();Limpar5();$("#enviar").val("...");}
                    else if(i.numero === '17'){$("#arqPagamento").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar6();$("#enviar").val("...");}
                    else if(i.numero === '18'){$("#arqPagamento").html("PDF inválido.");vazio();Limpar6();$("#enviar").val("...");}
                    else if(i.numero === '19'){$("#arqPagamento").html("O tamanho max é 1,99 MB.");vazio();Limpar6();$("#enviar").val("...");}
                    else{
                        //erro ao editar
                        alert("Erro ao editar a criança");vazio();
                    }
                },
                //erro do Ajax
                error: function(){
                    alert("Surgiu um erro...");vazio();
                }
            });
        });
    }
    
    function submeterForm2(id_formulario2){
        //frm -> pega o id do formulário, para ter o acesso a todos os conteúdo do formulario (metodo,acção...).
        let frm2 = $('#'+id_formulario2);
        
        //Quando o formulário for submetido será executado automaticamente
        frm2.submit(function(e){
            //e -> é usado para impedir que o formulário será submetido de forma normal.
            //preventDefault() -> impedi a submetido tradicional.
            e.preventDefault();

            //Evitando que barbarizão o formulário de cadastro
                if($("#enviar2").val() === "Enviando..."){
                    return false;
                }
                $("#enviar2").val("Enviando...");

            //Submissão do formulário em Ajax
            //Usando o jQuery
            
            $.ajax({
                dataType:'json',
                type: frm2.attr('method'),
                url: frm2.attr('action'),
                data: new FormData($('#formID2')[0]),
                processData: false,
                contentType: false,
                cache: false,
                //Verificações
                
                beforeSend: function(){
                    progresso2();
                },
                success: function(i){
                    if(i.numero === '1'){
                        $("#enviar2").val("...");
                        //sucesso do cadastro
                        sucesso2();vazio2();LimparTodos();
                    }
                    else if(i.numero === '20'){$("#arqBI1").html("Este ficheiro já existe, porfavor altere o nome.");vazio2();Limpar7();$("#enviar2").val("...");}
                    else if(i.numero === '21'){$("#arqBI1").html("PDF inválido.");vazio2();Limpar7();$("#enviar2").val("...");}
                    else if(i.numero === '22'){$("#arqBI1").html("O tamanho max é 1,99 MB.");vazio2();Limpar7();$("#enviar2").val("...");}
                    else if(i.numero === '23'){$("#arqBI2").html("Este ficheiro já existe, porfavor altere o nome.");vazio2();Limpar8();$("#enviar2").val("...");}
                    else if(i.numero === '24'){$("#arqBI2").html("PDF inválido.");vazio2();Limpar8();$("#enviar2").val("...");}
                    else if(i.numero === '25'){$("#arqBI2").html("O tamanho max é 1,99 MB.");vazio2();Limpar8();$("#enviar2").val("...");}
                    else{
                        //erro ao editar
                        alert("Erro ao editar o encarregado");vazio2();
                    }
                },
                //erro do Ajax
                error: function(){
                    alert("Surgiu um erro...");vazio2();
                }
            });
        });
    }
    
    function sucesso(){
        //Antes editado criança
        n = document.getElementById("nome").value;
        idade_v = document.getElementById("idade_v").checked;
        //verifica se o mês está checado
        if(idade_v == true){
            idade = document.getElementById("idade").value+" meses";
        }else{idade = document.getElementById("idade").value+" anos"; }
        
        //Por ser vetor temos que retirar 1
        var Ver = document.getElementsByClassName("educador1");
        educ = document.getElementById("educador1").value;
        for(var i = 0;i < Ver.length;i++){
            vid = Ver[i].value;
            if(vid == educ){
                //Pega o educador selecionado
                coded=educ-1;educador = document.getElementsByClassName("educador2")[i].value;
            }
        }
        
        trm = document.getElementById("turma1").value;
        codtrm = trm-1;
        turma = document.getElementsByClassName("turma2")[codtrm].value;
        sl = document.getElementById("sala1").value;
        codsl = sl-1;
        sala = document.getElementsByClassName("sala2")[codsl].value;
        //End vetores
        s = document.getElementById("sx").value;
         //Após editado
        document.getElementById("alt_nome").innerHTML=n;
        document.getElementById("alt_idade").innerHTML=idade;
        document.getElementById("alt_sexo").innerHTML=s;
        //Verifica se o educador está habilitado
        v = document.getElementById("habilita_edu").checked;
        if(v == true){
            //Mostra os dados no perfil
            document.getElementById("alt_educador").innerHTML=educador;
            document.getElementById("alt_turma").innerHTML=turma;
            document.getElementById("alt_sala").innerHTML=sala;
        }
        
        //========================================* Ficheiros
        //v1 = valor que substituira o C:\fakepath\ do caminho do ficheiro
        fc_ced = document.getElementById("c_cedula").value;
        v1 = "../../img/criancas/altrerados/documentos/";
        novoCED = fc_ced.replace("C:\\fakepath\\",v1);
        fficha = document.getElementById("ficha").value;
        novoFicha = fficha.replace("C:\\fakepath\\",v1);
        fat = document.getElementById("at").value;
        novoAT = fat.replace("C:\\fakepath\\",v1);
        fc_vacina = document.getElementById("c_vacina").value;
        novoCV = fc_vacina.replace("C:\\fakepath\\",v1);
        fc_p = document.getElementById("c_pagamento").value;
        novoCP = fc_p.replace("C:\\fakepath\\",v1);
        v2 = "../../img/criancas/altrerados/perfil/";
        fperfil = document.getElementById("perfil_f").value;
        novoPerfil = fperfil.replace("C:\\fakepath\\",v2);
        //Dados por default
        fc_ced2 = document.getElementById("c_cedula2").value;
        fficha2 = document.getElementById("ficha2").value;
        fat2 = document.getElementById("at2").value;
        fc_vacina2 = document.getElementById("c_vacina2").value;
        fc_p2 = document.getElementById("c_pagamento2").value;
        fperfil2 = document.getElementById("perfil2").value;
        //========================================* 
        //========================================* Ficheiros
        //Verifica se fcb for void vai permanecer o mesmo arquivo caso não será alterado
        if(fc_ced==""){document.getElementById("f_c_ced").href=fc_ced2;}
        else{document.getElementById("f_c_ced").href=novoCED;}
        if(fficha==""){document.getElementById("f_ficha").href=fficha2;}
        else{document.getElementById("f_ficha").href=novoFicha;}
        if(fat==""){document.getElementById("f_at").href=fat2;}
        else{document.getElementById("f_at").href=novoAT;}
        if(fc_vacina==""){document.getElementById("f_cv").href=fc_vacina2;}
        else{document.getElementById("f_cv").href=novoCV;}
        if(fc_p==""){document.getElementById("f_cp").href=fc_p2;}
        else{document.getElementById("f_cp").href=novoCP;}
        if(fperfil==""){document.getElementById("f_perfil").src=fperfil2;}
        else{document.getElementById("f_perfil").src=novoPerfil;}
    }
    function sucesso2(){
        //Antes editado encarregado
        enc = document.getElementById("encarregado1").value;
        enc2 = document.getElementById("encarregado2").value;
        t = document.getElementById("tel").value;
        t2 = document.getElementById("tel2").value;
        
        //Por ser vetor temos que retirar 1
        pt = document.getElementById("parent").value;
        codpt=pt-1;
        parent1 = document.getElementsByClassName("familia")[codpt].value;
        pt2 = document.getElementById("parent2").value;
        codpt2=pt2-1;
        parent2 = document.getElementsByClassName("familia2")[codpt2].value;
        
        //End vetores
        
         //Após editado
        document.getElementById("alt_enc1").innerHTML=enc;
        document.getElementById("alt_enc2").innerHTML=enc2;
        document.getElementById("alt_t1").innerHTML=t;
        document.getElementById("alt_t2").innerHTML=t2;
        document.getElementById("alt_prt1").innerHTML=parent1;
        document.getElementById("alt_prt2").innerHTML=parent2;
        //========================================* Ficheiros
        //v1 = valor que substituira o C:\fakepath\ do caminho do ficheiro
        fcb = document.getElementById("c_bi").value;
        v1 = "../../img/criancas/altrerados/encarregados/";
        novoCB = fcb.replace("C:\\fakepath\\",v1);
        fcb2 = document.getElementById("c_bi_").value;
        novoCB2 = fcb2.replace("C:\\fakepath\\",v1);
        //Dados por default
        fc_bi2 = document.getElementById("c_bi2").value;
        fc_bi_2 = document.getElementById("c_bi_2").value;
        //========================================* 
        //========================================* Ficheiros
        //Verifica se fcb for void vai permanecer o mesmo arquivo caso não será alterado
        if(fcb==""){document.getElementById("f_cb").href=fc_bi2;}
        else{document.getElementById("f_cb").href=novoCB;}
        if(fcb2==""){document.getElementById("f_cb2").href=fc_bi_2;}
        else{document.getElementById("f_cb2").href=novoCB2;}
    }
    
    //Mostra o progresso
    function progresso(){
        document.getElementById("progresso").src="../../img/progresso/loading1.gif";}
    function progresso2(){
        document.getElementById("progresso2").src="../../img/progresso/loading1.gif";}

    //Oculta o progresso
    function vazio(){document.getElementById("progresso").src="";}
    function vazio2(){document.getElementById("progresso2").src="";}
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