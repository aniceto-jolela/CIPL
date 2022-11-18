<?php
    $h= date("H")+1;
    if($h<10){$h= "0".$h;}
    $data = date("Y-m-d $h-i-s");
    echo "$data";
?>

<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <h1>TESTE</h1>
        <input type="number" data-mask="$99" >
        <script>
            
            //FORMULAS
            
            var n = 50000;
            
            b = n.toFixed(2).replace(".",",");
            a = n.toLocaleString('pt',{style:'currency',currency:'AOA'});
            window.document.write(n+" ");
            window.document.write(" Brazil "+ b +" ");
            window.document.write(a);
            
        </script>
    </body>
</html>

