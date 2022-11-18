
<script>
    mostrarUsuario();
    /*========================== Mostra da tabela dos usuários ==============================*/
        function mostrarUsuario(){
            var dados = $("#mostrarD").serialize();
            $.post("../servidor/v_usuario.php",dados,function(retorna){
               $("#v_dados").html(retorna);
            });
        }
    /*========================================= End  ==============================*/
    /* ============= Mostra os dados do usuário na modal ==========================*/
        function modelEdita(id,nome,usuario,sexo,email,tel,modulo,file,data_cad){
            Limpa();
            $("#ID").val(id);
            $("#nome").val(nome);
            $("#usuario").val(usuario);
            $("#sexo").val(sexo);
            $("#email").val(email);
            $("#tel").val(tel);
            $("#modulo").val(modulo);
            $("#file2").val(file);
            $("#data_cad").val(data_cad);
        }
        /* =============================== EDITAR USUÁRIO ================================= */
        function editarFuncao(){
            event.preventDefault();
            //Receber os dados do formulário
            var dados = new FormData($('#edita_form')[0]);
            $.ajax({
                //Construção dentro do ajax
                type: "POST",
                url: "../servidor/e_usuario.php",
                dataType:'json',
                data: dados,
                processData: false,
                contentType: false,
                cache: false,
                success: function(i){
                    if(i.numero === '0'){
                        //Limpa os dados
                        Limpa();mostrarUsuario();$("#fecha").click();
                    }else if(i.numero === '1'){
                        $("#alerta1").html("");$("#alerta2").html("Este ficheiro já existe, por favor altere o nome.");
                    }else if(i.numero === '2'){
                        $("#alerta1").html("");$("#alerta2").html("Imagem inválida.");
                    }
                    else if(i.numero === '3'){
                        $("#alerta1").html("");$("#alerta2").html("O tamanho max é 1,99 MB.");
                    }else if(i.numero === '4'){
                        $("#alerta2").html("");$("#alerta1").html("Não pode ter espaço em braco no nome do usuário.");
                    }else if(i.numero === '5'){
                        $("#alerta2").html("");$("#alerta1").html("Este usuário já existe.");
                    }else if(i.numero === '6'){
                        alert("Os campos do formulário não foram bem preenchidos.");
                    }
                    
               },
               error:function(){
                   alert("Erro ao editar.");
               }
            });
        }
    /* ============================ End EDITAR USUÁRIO =============================== */
    /*========================== Elimina usuário ==============================*/
        function eliminarUsuario(a){
            event.preventDefault();
            var resultado = confirm("Desejas realmente apagar este usuário ?");
            if(resultado == true){
                var dados = $("#mostrarD").serialize();
                $.post("../servidor/d_usuario.php?cod="+a,dados,function(i){
                   if(i === '0'){
                        alert("Este usuário está logado \n não podes eliminar está conta.");
                    }else{mostrarUsuario();}
                });
            }
        }
    /*======================================== End ==============================*/
    //Função pra mostrar foto no modal
    function Model(m){
        //Valor da imagem
        var valor = document.getElementById("imagem").innerHTML=m;
        //Mostrar no modal
        document.getElementById("foto_modal").src=valor;
    }
    function Limpa(){
        $("#nome").val("");$("#usuario").val("");$("#sexo").val("");$("#email").val("");
        $("#tel").val("");$("#file").val("");$("#alerta1").html("");$("#alerta2").html("");
    }

</script>