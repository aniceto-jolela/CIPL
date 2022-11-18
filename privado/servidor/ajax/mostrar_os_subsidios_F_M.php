
<script>
    /*========================== Dinamismo das tabelas dos Subsídios ==============================*/
        function mostrarSubsidioF(i){
            event.preventDefault();
            //Adiciona o link do pdf com a data no PDF
            document.getElementById("pdf_f").href = "../servidor/pdf_subsidio_feria.php?cod="+i;
            var dados = $("#fomDados").serialize();
            $.post("../servidor/v_subsidio_feria.php?data="+i,dados,function(retorna){
               $(".mR").html(retorna);
            });
        }
        function mostrarSubsidioTM(i){
            event.preventDefault();
            //Adiciona o link do pdf com a data no PDF
            document.getElementById("pdf_f").href = "../servidor/pdf_subsidio_d_t_mes.php?cod="+i;
            var dados = $("#fomDados").serialize();
            $.post("../servidor/v_subsidio_d_terceiro_mes.php?data="+i,dados,function(retorna){
               $(".mR").html(retorna);
            });
        }
    /*========================== End Dinamismo da tabela ==============================*/

</script>