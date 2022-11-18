

<script>
    /* Mostra a data & hora do sistema */
    function relogio(){
        var data = new Date();
        var hor = data.getHours();
        var min = data.getMinutes();
        var seg = data.getSeconds();
        var diasem = data.getUTCDay();
        var dia = data.getUTCDate();
        var mes = data.getUTCMonth();
        var ano = data.getUTCFullYear();
        //Se a hora,min ou segundos forem inferiores a 10
        if(hor <10){hor="0"+hor;}
        if(min <10){min="0"+min;}
        if(seg <10){seg="0"+seg;}
        //End
        //Se o mes for inferior a 10
        if(dia <10){dia="0"+dia;}
        //End
        var meses = new Array("Janeiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");
        var semanas = new Array("Domingo","Segunda-Feira","Terça-Feira","Quarta-Feira","Quinta-Feira","Sexta-Feira","Sábado");

        var hora = hor+":"+min+":"+seg+" | "+semanas[diasem]+" , "+dia+" de "+meses[mes]+" de "+ano;
        document.getElementById("rel").innerHTML = hora;
    }
    var temp = setInterval(relogio,1000);
</script>