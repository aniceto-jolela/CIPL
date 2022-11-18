<?php

echo "Teste <br>";

$DATA = date("Y-m-d H:i:s");

echo "Data = $DATA <br>";

$Hora = substr($DATA,10,3);

echo "Hora = $Hora";
?>

<html>
    <h1>FORMULÁRIO</h1>
    <form method="post" action="teste.php">
        <button name="bb" value="13" >Entrar</button>
        <button name="bb2" value="14">Sair</button>
    </form>
</html>

<?php

if(!empty($_POST['bb'])){
   echo "ENTRAR = ".$_POST['bb']."<br>"; 
}
if(isset($_POST['bb2'])){
    echo "SAIR = ".$_POST['bb2'];
}
?>
<script>
    function Mostra(){
        alert("Ola");
    }
</script>



