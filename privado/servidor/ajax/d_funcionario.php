
<script>
    
    /*========================== Mostra da tabela dos funcionários ==============================*/
        function mostrarFuncionario(){
            var dados = $("#formD").serialize();
            $.post("../servidor/v_funcionario.php",dados,function(retorna){
               $("#v_dados").html(retorna);
            });
        }
    /*========================================= End  ==============================*/
    /*========================== Elimina funcionário ==============================*/
        function eliminarFuncionario(i){
            event.preventDefault();
            var resultado = confirm("Desejas realmente apagar este funcionário ?");
            if(resultado == true){
                var dados = $("#formD").serialize();
                $.post("../servidor/d_funcionario.php?cod="+i,dados,function(){
                   mostrarFuncionario();
                });
            }
        }
    /*======================================== End ==============================*/
</script>