<?php
session_start();
require '../../util/config.php';
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="author" content="Rilley Reis">

<link rel="stylesheet" href="../../app/css/style.css">
<link rel="stylesheet" href="../../app/css/w3.css">
<!--<link rel="stylesheet" href="../../app/css/fa-svg-with-js.css">-->
<!--<link rel="stylesheet" href="../../app/css/font-awesome.css">-->
<link rel="stylesheet" href="../../app/css/print.css">

<script defer src="../../app/js/fontawesome-all.min.js"></script>
<script type="text/javascript" src="../../app/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="../../app/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="../../app/js/jquery.maskMoney.js"></script>
<script type="text/javascript" src="../../app/js/masks.js"></script>

<script>
    function pag(){
        var tipo = $('#frmpag').val();
        if(tipo == "CRÉDITO"){
            $("#cart").show();
            $("#din").hide();
            document.getElementById('fim').disabled=false;
        }
        else if(tipo == "DINHEIRO"){
            $("#cart").hide();
            $("#din").show();
            document.getElementById('fim').disabled=true;
        }
        else if(tipo == "DÉBITO"){
            $("#cart").hide();
            $("#din").hide();
            document.getElementById('fim').disabled=false;
        }
    }
    function calcTroco() {
        var vlrRecebido = $('#recb').val().replace("R$ ", "");
        vlrRecebido = vlrRecebido.replace(".", "");
        vlrRecebido = parseFloat(vlrRecebido.replace(",", "."));
        var total = $('#total').val().replace("R$ ", "");
        total = total.replace(".", "");
        total = parseFloat(total.replace(",", "."));
        if(vlrRecebido > total){
            var vlrTroco = (vlrRecebido - total).toFixed(2);
            $('#troc').val(vlrTroco);
            document.getElementById('fim').disabled=false;
        }else {
            $('#troc').val(0);
            document.getElementById('fim').disabled=true;
        }
    }
</script>

<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php include '../../php/control/os/os_view.php'?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu no-print" style="z-index:4; padding: 1.5px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right fwb w3-text-white">Business Manager System</span>
</div>


<!-- Sidebar/menu -->
<?php include '../../include/'.$_SESSION['panelUser'].'/menu.php'?>

<div class="w3-main p15" style="margin-left: 300px; margin-top: 43px;">
    <div class="w3-border w3-border-gray print p5 fs087e">
        <?php foreach ($dadosEmp as $item) {?>
            <h3 class="titulo fwb w3-center"><?php echo $item['nome'];?></h3>
            <div class="w3-center bbtsc1 pb03">
                <p class="texto"><?php echo "CNPJ ".$item['cpf_cnpj'];?></p>
                <p class="texto"><?php echo "TELEFONE: ".$item['tel']." --- EMAIL: ".$item['email'];?></p>
            </div>
        <?php $cidade = $item['cidade']; $nomeEmp = $item['nome'];}?>
        <h5 class="w3-right-align" style="margin-right: 75px;"><?php echo $protocolo;?></h5>
        <div class="bbtsc1 pb03">
            <h6 class="texto">DADOS CLIENTE</h6>
            <p class="texto">NOME: <?php echo $nomeCli;?></p>
            <p class="texto">CPF/CNPJ: <?php echo $cpfCnpjCli;?></p>
            <p class="texto">TELEFONE: <?php echo $telCli;?> --- EMIAL: <?php echo $emailCli;?></p>
            <div class="no-print">
                <h6 class="texto">DADOS TÉCNICO</h6>
                <p class="texto">NOME: <?php echo $nomeTec;?></p>
                <p class="texto">TELEFONE: <?php echo $telTec;?> --- EMIAL: <?php echo $emailTec;?></p>
            </div>
        </div>
        <br>
        <h6 class="" style="font-size: 1.2em">DADOS OS</h6>
        <table class="w3-table w3-striped w3-bordered w3-border w3-white mt05 fs095e">
            <tr>
                <td class="w3-border-right print-third">EQUIPAMENTO</td>
                <td><?php echo $equipamento;?></td>
            </tr>
            <tr>
                <td class="w3-border-right print-third">DEFEITO</td>
                <td><?php echo $defeito;?></td>
            </tr>
            <?php if($status > 2){?>
            <tr>
                <td class="w3-border-right print-third">LAUDO</td>
                <td><?php echo $laudo;?></td>
            </tr>
            <tr>
                <td class="w3-border-right print-third">SOLUÇÃO</td>
                <td><?php echo $solucao;?></td>
            </tr>
            <?php }?>
        </table>
        <?php if($status > 2){?>
            <div>
                <h6 class="fs011e">SERVIÇOS</h6>
                <table class="w3-table w3-striped w3-bordered w3-border w3-white">
                    <thead class="w3-gray">
                        <th class="w3-border-right">NOME</th>
                        <th>VALOR R$</th>
                    </thead>
                    <?php if($serv_num > 0){?>
                        <tbody>
                        <?php foreach ($servs as $serv) {?>
                            <tr>
                                <td class=""><?php echo $serv['nome'];?></td>
                                <td class=""><?php echo $serv['valor'];?></td>
                            </tr>
                        <?php $subServ +=  $serv['valor'];}?>
                        </tbody>
                    <?php }else{?>
                        <p class="w3-center">Não existe serviços associados a essa OS.</p>
                    <?php }?>
                </table>
                <table class="w3-table w3-striped w3-bordered w3-border mt05">
                        <td class="w3-twothird print-twothird">SUBTOTAL</td>
                        <td class="w3-third print-third">R$ <?php echo number_format($subServ, 2, ",", ".");?></td>
                </table>
                <h6 class="fs011e">PRODUTOS</h6>
                <table class="w3-table w3-striped w3-bordered w3-border w3-white">
                    <thead class="w3-gray">
                    <th class="w3-border-right">NOME</th>
                    <th class="w3-border-right">QUANTIDADE</th>
                    <th>VALOR R$</th>
                    </thead>
                    <?php if($prod_num > 0){?>
                    <tbody>
                    <?php foreach ($prods as $prod) {?>
                        <tr>
                            <td class=""><?php echo $prod['nome'];?></td>
                            <td class=""><?php echo $prod['qtd'];?></td>
                            <td class=""><?php echo $prod['valortot'];?></td>
                        </tr>
                    <?php $subProd += $prod['valortot']; }?>
                    </tbody>
                    <?php }else{?>
                    <p class="w3-center">Não existe produtos associados a essa OS.</p>
                    <?php }?>
                </table>
                <table class="w3-table w3-striped w3-bordered w3-border mt05">
                    <td class="w3-twothird print-twothird">SUBTOTAL</td>
                    <td class="w3-third print-third">R$ <?php echo number_format($subProd, 2, ",", ".");?></td>
                </table>
                <table class="w3-table w3-striped w3-bordered w3-border mt05 w3-gray">
                    <td class="w3-twothird print-twothird">TOTAL</td>
                    <td class="w3-third print-third fwb">R$ <?php echo number_format($subServ+$subProd, 2, ",", ".");?></td>
                </table>
            </div>
        <?php }?>
        <div class="dnn print">
            <div class="w3-borde w3-border-gray mt05">
                <h6 class="fs10e">Termo de Aceite</h6>
                <p class="fs087e">Decelaro estar ciente:</p>
                <p class="fs087e">Todos os objetos não retirados no prazo de 30 dias após o termino do serviço, será cobrada uma taxa de R$25,00 semanais.</p>
            </div>
            <h5 class="w3-right-align fs10e" style="margin-right: 75px;"><?php echo $cidade?>, <?php echo $dataHj?></h5>
            <div class="w3-row mt70">
                <div class="print-half w3-half pl10">
                    <p class="w3-border-top w3-center mr10"><?php echo $nomeEmp?></p>
                </div>
                <div class="print-half w3-half">
                    <p class="w3-border-top w3-center mr10 ml10"><?php echo $nomeCli?></p>
                </div>
            </div>
        </div>

    </div>
    <div class="no-print">
        <?php if($status == 5){?>
            <button id="" onclick="document.getElementById('modal').style.display='block'" class="w3-btn w3-green w3-round mt10 ml15"><i class="fas fa-dollar-sign"></i> Finalizar</button>
        <?php }?>
        <button id="print" class="w3-btn w3-blue-gray w3-round mt10"><i class="fas fa-print"></i> Imprimir</button>
    </div>
</div>

<div id="modal" class="w3-modal no-print">
    <div class="w3-modal-content w3-animate-top w3-center" style="width: 400px;">
        <header class="w3-container w3-gray">
            <span onclick="document.getElementById('modal').style.display='none'" class="w3-button w3-display-topright"><i class="fas fa-times"></i></span>
            <h2>PAGAMENTO</h2>
        </header>
        <div class="w3-container">
            <form action="" method="post" class="mt15">
                <input type="hidden" name="idOS" value="<?php echo $idOS;?>">
                <div class="w3-row">
                    <div class="w3-third w3-col w3-border w3-border-gray w3-gray" style="border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Total</label>
                    </div>
                    <div class="w3-twothird">
                        <input type="text" name="total" id="total" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" style="border-radius: 0 6px 6px 0;" value="R$ <?php echo number_format($subServ+$subProd, 2, ",", ".");?>" readonly="readonly">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-third w3-col w3-border w3-border-gray w3-gray" style="border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Forma Pagamento</label>
                    </div>
                    <div class="w3-twothird">
                        <select name="frmpag" id="frmpag" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" onchange="pag();">
                            <option value="" selected disabled>Selecione</option>
                            <option value="DINHEIRO">Dinheiro</option>
                            <option value="CRÉDITO">Crédito</option>
                            <option value="DÉBITO">Débito</option>
                        </select>
                    </div>
                </div>
                <div id="din" class="dnn">
                    <div class="w3-row">
                        <div class="w3-third w3-col w3-border w3-border-gray w3-gray" style="border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Recebido</label>
                        </div>
                        <div class="w3-twothird">
                            <input type="text" name="recebido" id="recb" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10 money" style="border-radius: 0 6px 6px 0;" onblur="calcTroco();">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-third w3-col w3-border w3-border-gray w3-gray" style="border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Troco</label>
                        </div>
                        <div class="w3-twothird">
                            <input type="text" name="troco" id="troc" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10 money" style="border-radius: 0 6px 6px 0;">
                        </div>
                    </div>
                </div>
                <div id="cart" class="dnn">
                    <div class="w3-row mt05">
                        <div class="w3-third w3-col w3-border w3-border-gray w3-gray" style="border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Parcela</label>
                        </div>
                        <div class="w3-twothird">
                            <input type="text" name="parc" id="parc" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" style="border-radius: 0 6px 6px 0;">
                        </div>
                    </div>
                </div>
                <button id="fim" name="fim" class="w3-btn w3-green w3-round mt05 w3-left mb05" disabled><i class="fas fa-dollar-sign"></i> Receber</button>
            </form>
        </div>
    </div>
</div>


<?php
    if (isset($_GET['print'])){
        echo "<script>window.print(document);</script>";
    }
?>
<script>
    $('#print').click(function () {
        window.print(document);
    });
</script>

</body>
</html>