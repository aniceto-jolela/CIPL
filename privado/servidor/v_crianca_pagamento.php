<?php
    include_once 'conectar.php';
?>

     <!-- Tabela -->
    <table border="1px">
        <thead>
            <tr>
                <th data-field="id">Nº</th>
                <th data-field="name">Nome</th>
                <th data-field="mes">Mês</th>
                <th data-field="usuario" >Selecionar | Todas <input type="checkbox" id="totos" class="lk" onclick="sTodas()"></th>
            </tr>
        </thead>
        <tbody>
            <?php
             //Ver as crianças
                $meses = array("JANEIRO","FEVEREIRO","MARÇO","ABRIL","MAIO","JUNHO","JULHO","AGOSTO","SETEMBRO","OUTUBRO","NOVEMBRO","DEZEMBRO");
                $query = "SELECT * FROM crianca ORDER BY nome";
                $ver = Crianca::findBySql(con(), $query);
                $uniao = Uniao::findBySql(con(), "SELECT * FROM uniao");
                $pagamento = Pagamento::findBySql(con(), "SELECT * FROM pagamento");
                //id - conta o index do criança
                $id = 0; $encarregado = $_GET['cod'];$data = date("Y-m");$pago="";
                foreach ($ver as $i):
                    $pega = 0;$pega2 = 0;$pCrianca = 0;$cont = 0;
                    //Verifica se a criança está activa
                    if($i->getEstado() == 0){
                    //Ciclo da União  
                    foreach ($uniao as $i2) {
                        if($encarregado == $i2->getEncarregadoId()){
                            if($i->getId() == $i2->getCriancaId()){
                                $pega2=1;
                            }
                        }
                        //Faz o controlo da criança que já foi paga e possui 2 encarregados (filtra os dados da criança...)
                        if($i->getId() == $i2->getCriancaId()){
                            ++$cont;if($cont == 2){$pCrianca = $i->getId();}
                        }
                    }
                    //Ciclo do Pagamento
                    foreach ($pagamento as $i1){
                        $resultadoDT=0;
                        //Verifica se o encarregado da BD é igual a Encarregado selecionado
                        $dtAM = $i1->getDataEmissao();
                        //Pega o mês e o ano
                        $datEM = substr($dtAM,0,7);
                        //Pega o ano
                        $ano = substr($dtAM,0,4);
                        //Verifica se a criança já foi paga a propina no outro encarregado (se tiver 2 encarregado)
                        //Filtra os dados para evitar que o outro encarregado pague duas vezes
                        if($pCrianca == $i1->getCriancaId()){
                            $pega = 1;
                        }
                        if($i1->getEncarregadoId() == $encarregado){
                            //Verifica se a criança da BD do Pagm é igual a criaça da BD da criança
                            if($i1->getCriancaId() == $i->getId()){
                                //Verifica o modo de pagamento (praso) pega só o mês
                                $mesC = $i1->getMes();
                                //Faz a soma do mês da emissão com o modo do pagamento
                                $pago=$meses[$mesC-1];
                            }
                        }
                    }
                    //Verifica (pega se a data da BD dor menor ou igual a data correte) 
                    //(pega2 responsavel por filtrar os dados das crianças, com o seu devido encarregado)
                    if($pega2 == 1){
                    $id++;
            ?>       
                <tr>
                    <td><?php echo $i->getId() ?></td>
                    <td><?php echo $i->getNome() ?></td>
                    <td><?php echo $pago ?></td>
                    <td><input type="checkbox" value="<?php echo $i->getId() ?>" name="s_crianca[]" class="s_crianca lk" ></td>
                </tr>
                <?php }
                } endforeach; ?>
        </tbody>
    </table>

     