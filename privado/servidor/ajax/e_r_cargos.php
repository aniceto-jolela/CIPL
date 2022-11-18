
<script>
    mostrarCargo();
    /*========================== Mostra da tabela dos usuários ==============================*/
        function mostrarCargo(){
            var dados = $("#mostrarD").serialize();
            $.post("../servidor/v_cargo.php",dados,function(retorna){
               $("#v_dados").html(retorna);
            });
        }
    /*========================================= End  ==============================*/
    /* ============= Mostra os dados do usuário na modal ==========================*/
        function modelEdita(id,nome){
            $("#nome").val("");$("#aC").html("");
            $("#ID").val(id);
            $("#nome").val(nome);
        }
        /* =============================== EDITAR USUÁRIO ================================= */
        function editarFuncao(){
            event.preventDefault();
            //Receber os dados do formulário
            var dados = new FormData($('#edita_form')[0]);
            $.ajax({
                //Construção dentro do ajax
                type: "POST",
                url: "../servidor/e_cargo.php",
                dataType:'json',
                data: dados,
                processData: false,
                contentType: false,
                cache: false,
                success: function(i){
                    if(i.numero === '0'){
                        //Limpa os dados
                        $("#nome").val("");$("#aC").html("");
                        $("#fecha").click();mostrarCargo();
                    }
                    else if(i.numero === '1'){
                        $("#aC").html("Este cargo já existe");
                    }
               },
               error:function(){
                   alert("Erro ao editar.");
               }
            });
        }
    /* ============================ End EDITAR EDITAR =============================== */
    /*========================== Elimina cargo ==============================*/
        function eliminarCargo(a){
            event.preventDefault();
            var resultado = confirm("Desejas realmente apagar este cargo ?");
            if(resultado == true){
                var dados = $("#mostrarD").serialize();
                $.post("../servidor/d_cargo.php?cod="+a,dados,function(){
                    mostrarCargo();
                });
            }
        }
    /*======================================== End ==============================*/
</script>