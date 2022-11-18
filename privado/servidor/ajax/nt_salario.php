
<script>
    mVisto();
    function visto(i,id){
       //Põe o visto no icon
       //pega a class da tag <i>
       var v = document.getElementsByTagName("i")[i].className;
       //verifica se a class da tag <i> é diferente com o icon visto
       if(v != "fa fa-eye-slash"){
           /*--------------------------- Area do AJAX ----------------------------------*/
           var dados = $("#fNF").serialize();
           $.ajax({
               type:"GET",
               url:"../servidor/e_notificacao_salario.php?cod=0&id="+id,
               dataType:"json",
               data:dados,
               success:function(i){
                   if(i.numero === '0'){mVisto();nFSalarioAlert();}
               },
               error:function(){
                   alert("Surgiu um erro");
               }
           });
           /*--------------------------- End do AJAX ----------------------------------*/
       }
    }
    /*=========================================== Visualizar todas ==================================================*/
    function vTodos(){
        //Põe visto em todos , pega a tag <i>
        var v =  document.getElementsByTagName("i");
        var v = v.length-1;
        var pega = 0;
        //i=5 para a tag i começar do primeiro icon da tabela
        for(var i=5;v>i;i++){
            var v1 = document.getElementsByTagName("i")[i].className;
            //Verifica se ainda tem notificação não vista
            if(v1 != "fa fa-eye-slash"){pega=1;}
        }
        
        if(pega==1){
            /*--------------------------- Area do AJAX ----------------------------------*/
                var dados = $("#fNF").serialize();
                $.ajax({
                    type:"POST",
                    url:"../servidor/e_notificacao_salario.php",
                    dataType:"json",
                    data:dados,
                    success:function(i){
                        if(i.numero === '1'){mVisto();nFSalarioAlert();}
                    },
                    error:function(){
                        alert("Surgiu um erro");
                    }
                });
           /*--------------------------- End do AJAX ----------------------------------*/
        }
    }
    /*=============================== Mostrar Tabelas ==================================================*/
        function mVisto(){
            var dados = $("#fNF").serialize();
            $.post("../servidor/v_notificacao_salario.php",dados,function(retorno){
                $("#nf").html(retorno);
            });
        }
    /*=============================== End Tabelas ==================================================*/
    /*********************************************************************************************************/
    /*=============================== Mostrar o alert (número) da notificação ===============================*/
        nFSalarioAlert();
        function nFSalarioAlert(){
            var dados = $("#fNF").serialize();
            $.post("../servidor/v_nfalert.php",dados,function(retorno){
                $("#notifica").html(retorno);
                if(retorno>=99){$("#notifica").html(99);}
            });
        }
    /*=============================== End alert ==================================================*/
    /*=============================== Pesquisa a notificação ==========================================*/
    function pesquisa(i){
        var dados = $("#fNF").serialize();
        if(i!=""){
            $.post("../servidor/vp_notificacao_salario.php?pn="+i,dados,function(retorno){
                $("#nf").html(retorno);
            });
        }else{
             $.post("../servidor/v_notificacao_salario.php",dados,function(retorno){
                $("#nf").html(retorno);
            });
        }
    }
</script>