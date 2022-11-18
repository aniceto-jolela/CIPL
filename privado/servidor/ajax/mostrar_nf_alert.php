
<script>
   
    function nFSalarioAlert(){
        //var dados = $("#formNF").ajax();
        alert("B");
        $.post('../servidor/v_nfalert.php', function(data) {
            //$('.result').html(data);
            alert("etorno4");
          });
        alert("etorno4");
    }
    
    function nFFuncionarioAlert(){
        alert("Oi");
    }

</script>