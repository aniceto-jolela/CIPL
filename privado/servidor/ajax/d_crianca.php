
<script>
    
    /*========================== Mostra da tabela das crianças ==============================*/
        function mostrarCrianca(){
            var dados = $("#formD").serialize();
            $.post("../servidor/v_crianca.php",dados,function(retorna){
               $("#v_dados").html(retorna);
            });
        }
    /*========================================= End  ==============================*/
    /*========================== Elimina criança ==============================*/
        function eliminarCrianca(i){
            event.preventDefault();
            var resultado = confirm("Desejas realmente apagar esta criança ?");
            if(resultado == true){
                var dados = $("#formD").serialize();
                $.post("../servidor/d_crianca.php?cod="+i,dados,function(){
                   mostrarCrianca();
                });
            }
        }
    /*======================================== End ==============================*/
</script>