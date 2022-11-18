
<script>
   
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
               url:"../servidor/e_notificacao_pessoal.php?codigo=0&id="+id,
               dataType:"json",
               data:dados,
               success:function(i){
                   if(i.numero === '0'){mVisto();nFPessoalAlert();}
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
                    url:"../servidor/e_notificacao_pessoal.php",
                    dataType:"json",
                    data:dados,
                    success:function(i){
                        if(i.numero === '1'){mVisto();nFPessoalAlert();}
                    },
                    error:function(){
                        alert("Surgiu um erro");
                    }
                });
           /*--------------------------- End do AJAX ----------------------------------*/
        }
    }
    /*=============================== Mostrar Tabelas ==================================================*/
        mVisto();
        function mVisto(){
            var dados = $("#fNF").serialize();
            $.post("../servidor/v_notificacao_pessoal.php",dados,function(retorno){
                $("#nf").html(retorno);
            });
        }
         function mVistoIndex(i,id){
            var dados = $("#fNF").serialize();
            $.post("../servidor/e_notificacao_pessoal.php?cod="+id,dados,function(retorno){
                if(retorno == "sucesso"){
                    //Põe visto na notificação selecionada
                   document.getElementsByClassName("fundo")[i].style="";
                   //Actualiza a o total de notificações
                   nFPessoalAlert();
                }else{alert("Surgiu um erro.");}
            });
        }
    /*=============================== End Tabelas ==================================================*/
    /*********************************************************************************************************/
    /*=============================== Mostrar o alert (número) da notificação ===============================*/
       nFPessoalAlert();
        function nFPessoalAlert(){
            var dados = $("#fNF").serialize();
            $.post("../servidor/v_nfalert_pessoal.php",dados,function(retorno){
                $("#notifica").html(retorno);
                if(retorno>=99){$("#notifica").html(99);}
            });
        }
    /*=============================== End alert ==================================================*/
    /*=============================== Pesquisa a notificação ==========================================*/
    function pesquisa(i){
        var dados = $("#fNF").serialize();
        if(i!=""){
            $.post("../servidor/vp_notificacao_pessoal.php?pn="+i,dados,function(retorno){
                $("#nf").html(retorno);
            });
        }else{
             $.post("../servidor/v_notificacao_pessoal.php",dados,function(retorno2){
                $("#nf").html(retorno2);
            });
        }
    }
</script>