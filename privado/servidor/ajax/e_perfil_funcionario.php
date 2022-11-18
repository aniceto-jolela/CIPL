<script>
    /*=================== SELECIONA OS DADOS PARA ACOMBOBOX =============================*/
    function comboBox(sexo,banco,cargo){
        document.getElementById("sx").value=sexo;
         b = banco-1;
        document.getElementsByClassName("bcv")[b].selected=true;
        //Verifica se tem cargo 
        c = cargo-1;
        document.getElementsByClassName("cg")[c].selected=true;
    }
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
                        //sucesso ao editar
                        $("#enviar").val("...");sucesso();vazio();LimparTodos();
                    }
                    else if(i.numero === '1'){$("#arqPerfil").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar1();$("#enviar").val("...");}
                    else if(i.numero === '2'){$("#arqPerfil").html("Imagem inválida.");vazio();Limpar1();$("#enviar").val("...");}
                    else if(i.numero === '3'){$("#arqPerfil").html("O tamanho max é 1,99 MB.");vazio();Limpar1();$("#enviar").val("...");}
                    else if(i.numero === '4'){$("#arqDeclaracao").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar2();$("#enviar").val("...");}
                    else if(i.numero === '5'){$("#arqDeclaracao").html("PDF inválido.");vazio();Limpar2();$("#enviar").val("...");}
                    else if(i.numero === '6'){$("#arqDeclaracao").html("O tamanho max é 1,99 MB.");vazio();Limpar2();$("#enviar").val("...");}
                    else if(i.numero === '7'){$("#arqIban").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar3();$("#enviar").val("...");}
                    else if(i.numero === '8'){$("#arqIban").html("PDF inválido.");vazio();Limpar3();$("#enviar").val("...");}
                    else if(i.numero === '9'){$("#arqIban").html("O tamanho max é 1,99 MB.");vazio();Limpar3();$("#enviar").val("...");}
                    else if(i.numero === '10'){$("#arqBI").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar4();$("#enviar").val("...");}
                    else if(i.numero === '11'){$("#arqBI").html("PDF inválido.");vazio();Limpar4();$("#enviar").val("...");}
                    else if(i.numero === '12'){$("#arqBI").html("O tamanho max é 1,99 MB.");vazio();Limpar4();$("#enviar").val("...");}
                    else if(i.numero === '13'){$("#arqAtestado").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar5();$("#enviar").val("...");}
                    else if(i.numero === '14'){$("#arqAtestado").html("PDF inválido.");vazio();Limpar5();$("#enviar").val("...");}
                    else if(i.numero === '15'){$("#arqAtestado").html("O tamanho max é 1,99 MB.");vazio();Limpar5();$("#enviar").val("...");}
                    else if(i.numero === '16'){$("#arqBoletim").html("Este ficheiro já existe, porfavor altere o nome.");vazio();Limpar6();$("#enviar").val("...");}
                    else if(i.numero === '17'){$("#arqBoletim").html("PDF inválido.");vazio();Limpar6();$("#enviar").val("...");}
                    else if(i.numero === '18'){$("#arqBoletim").html("O tamanho max é 1,99 MB.");vazio();Limpar6();$("#enviar").val("...");}
                    else{
                        //erro ao editar
                        alert("Erro ao editar o funcionário");vazio();
                    }
                },
                //erro do Ajax
                error: function(){
                    alert("Surgiu um erro...");vazio();
                }
            });
        });
    }
    function sucesso(){
        //Antes editado
        n = document.getElementById("nome").value;
        t = document.getElementById("tel").value;
        dv = document.getElementById("validade").value;c="";
        //Conta o número de cargos da comboBOx
        cod1 = document.getElementsByClassName("cg");
        codSelc = document.getElementById("cg").value;
        codCHid = document.getElementsByClassName("cat");
        for(var i = 0;cod1.length>i;i++){
            if(codCHid[i].value == codSelc){
                c = document.getElementsByClassName("cat")[i].innerHTML;
            }
        }
        cod2 = document.getElementById("bc").value;
        codb = cod2-1;
        bc = document.getElementsByClassName("bac")[codb].value;
        //End vetores
        s = document.getElementById("sx").value;
        bi = document.getElementById("n_bi").value;
        ib = document.getElementById("iban_e").value;
         //Após editado
        document.getElementById("alt_nome").innerHTML=n;
        document.getElementById("alt_tel").innerHTML=t;
        document.getElementById("alt_validade").innerHTML=dv;
        document.getElementById("alt_cargo").innerHTML=c;
        document.getElementById("alt_sexo").innerHTML=s;
        document.getElementById("alt_banco").innerHTML=bc;
        document.getElementById("alt_bi").innerHTML=bi;
        document.getElementById("alt_ib").innerHTML=ib;
        //========================================* Ficheiros
        //v1 = valor que substituira o C:\fakepath\ do caminho do ficheiro
        fcb = document.getElementById("c_bi").value;
        v1 = "../../img/funcionarios/altrerados/documentos/";
        novoCB = fcb.replace("C:\\fakepath\\",v1);
        fsanidade = document.getElementById("sanidade").value;
        novoSanide = fsanidade.replace("C:\\fakepath\\",v1);
        fdc = document.getElementById("dc").value;
        novoDC = fdc.replace("C:\\fakepath\\",v1);
        fat = document.getElementById("at").value;
        novoAT = fat.replace("C:\\fakepath\\",v1);
        fiban = document.getElementById("iban").value;
        novoIban = fiban.replace("C:\\fakepath\\",v1);
        v2 = "../../img/funcionarios/altrerados/perfil/";
        fperfil = document.getElementById("perfil_f").value;
        novoPerfil = fperfil.replace("C:\\fakepath\\",v2);
        //Dados por default
        fcb2 = document.getElementById("c_bi2").value;
        fsanidade2 = document.getElementById("sanidade2").value;
        fat2 = document.getElementById("at2").value;
        fdc2 = document.getElementById("dc2").value;
        fiban2 = document.getElementById("iban2").value;
        fperfil2 = document.getElementById("perfil2").value;
        //========================================* 
        //========================================* Ficheiros
        //Verifica se fcb for void vai permanecer o mesmo arquivo caso não será alterado
        if(fcb==""){document.getElementById("f_cb").href=fcb2;}
        else{document.getElementById("f_cb").href=novoCB;}
        if(fsanidade==""){document.getElementById("f_sanidade").href=fsanidade2;}
        else{document.getElementById("f_sanidade").href=novoSanide;}
        if(fdc==""){document.getElementById("f_dc").href=fdc2;}
        else{document.getElementById("f_dc").href=novoDC;}
        if(fat==""){document.getElementById("f_at").href=fat2;}
        else{document.getElementById("f_at").href=novoAT;}
        if(fiban==""){document.getElementById("f_iban").href=fiban2;}
        else{document.getElementById("f_iban").href=novoIban;}
        if(fperfil==""){document.getElementById("f_perfil").src=fperfil2;}
        else{document.getElementById("f_perfil").src=novoPerfil;}
    }
    
    //Mostra o progresso
    function progresso(){
        document.getElementById("progresso").src="../../img/progresso/loading1.gif";}

    //Oculta o progresso
    function vazio(){document.getElementById("progresso").src="";}
    
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

</script>