<?php
session_start();
require '../../util/config.php';
date_default_timezone_set("America/Sao_Paulo");
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
<link rel="stylesheet" href="../../app/css/jquery-ui.css">
<!--<link rel="stylesheet" href="../../app/css/fa-svg-with-js.css">-->
<!--<link rel="stylesheet" href="../../app/css/font-awesome.css">-->

<script defer src="../../app/js/fontawesome-all.min.js"></script>
<script type="text/javascript" src="../../app/js/jquery-1.12.4.js"></script>
<script type='text/javascript' src="../../app/js/jquery-ui.js"></script>
<script type="text/javascript" src="../../app/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="../../app/js/jquery.maskMoney.js"></script>
<script type="text/javascript" src="../../app/js/masks.js"></script>
<script type="text/javascript" src="../../app/js/format.js"></script>

<script>
    $(function () {
        $.getJSON("../../php/control/produto/prods_data.php", function (dados) {
            var produtos = [];
            $(dados).each(function (key, value) {
                produtos.push(value.idPRODUTO + "|" + value.nomePRODUTO);
            });
            $("#prod").autocomplete({
                source: produtos
            });
        });
        $.getJSON("../../php/control/cliente/cli_data.php", function (dados2) {
            var clients = [];
            $(dados2).each(function (key, value) {
                if(value.cpfcnpjPESSOA.length == 14)
                    clients.push(value.idPESSOA + "|" + value.nomePESSOA + " " + value.snomePESSOA);
                else
                    clients.push(value.idPESSOA + "|" + value.nomePESSOA);
            });
            $("#cliente").autocomplete({
                source: clients
            });
        });
    });
</script>
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
<?php include '../../php/control/venda/pdv.php'?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu" style="z-index:4; padding: 1.5px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <a onclick="openMenu(3)" class="cp fs10e"><span class="w3-bar-item w3-text-white w3-right">Bem-Vindo, <strong><?php echo $_SESSION['nomeUser'];?></strong> <i class="fa fa-caret-down"></i></span></a>
    <!--    <div id="menu3" class="w3-hide bgcMenu fs087e w3-right">-->
    <!--        <a href="#" class="w3-bar-item w3-button fs11e" title="Meus Dados"><i class="fa fa-user"></i></a>-->
    <!--        <a href="#" class="w3-bar-item w3-button" title="Logout"><i class="fa fa-sign-out"></i></a>-->
    <!--    </div>-->
</div>


<!-- Sidebar/menu -->
<?php include '../../include/'.$_SESSION['panelUser'].'/menu.php'?>

<div class="w3-main p15" style="margin-left: 300px; margin-top: 43px;">
    <div class="w3-row">
        <div class="w3-half p10">
            <div class="w3-border w3-border-gray mt">
                <header class="w3-gray w3-text-gray">
                    <div class="w3-row">
                        <div class="w3-col tac p8" style="width: 10%; border-right-style: groove; border-right-color: gray;">
                            <i class="fas fa-barcode"></i>
                        </div>
                        <div class="w3-col p8" style="width: 65%;">
                            Adicionar Produto
                        </div>
                    </div>
                </header>
                <form action="" class="dib wfull" method="post">
                    <div class="p10 w3-border w3-border-gray">
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Produto</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" id="prod" name="produto" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Produto" value="" required>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Quantidade</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" name="qtd" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeypress="return onlynumber(event);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Quantidade" value="" required>
                            </div>
                        </div>
                        <button name="adicionar" class="w3-btn w3-green w3-center fs087e bradius mt10" type="submit"><i class="fa fa-plus"></i> Adicionar</button>
                    </div>
                    <div class="mt10 w3-border-gray w3-border">
                        <header class="w3-gray w3-text-gray">
                            <div class="w3-row">
                                <div class="w3-col tac p8" style="width: 10%; border-right-style: groove; border-right-color: gray;">
                                    <i class="fas fa-barcode"></i>
                                </div>
                                <div class="w3-col p8" style="width: 65%;">
                                    Dados da Compra
                                </div>
                            </div>
                        </header>
                        <div class="p10 w3-border w3-border-gray">
                            <div class="w3-row">
                                <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                    <label for="" class="fs087e w3-text-white" style="">Vendedor</label>
                                </div>
                                <div class="w3-rest">
                                    <input type="text" name="vendedor" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Vendedor" value="<?php echo $vendedor?>" readonly>
                                </div>
                            </div>
                            <div class="w3-row">
                                <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                    <label for="" class="fs087e w3-text-white" style="">Cliente</label>
                                </div>
                                <div class="w3-rest">
                                    <input type="text" id="cliente" name="cliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Cliente" value="<?php echo $cliente?>">
                                </div>
                            </div>
                            <div class="w3-row">
                                <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                    <label for="" class="fs087e w3-text-white" style="">Total Itens</label>
                                </div>
                                <div class="w3-rest">
                                    <input type="text" name="qtdItens" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10"  style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Quantidade Itens" value="<?php echo $totalItemVenda?>" readonly>
                                </div>
                            </div>
                            <div class="w3-row">
                                <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                    <label for="" class="fs087e w3-text-white" style="">Total</label>
                                </div>
                                <div class="w3-rest">
                                    <input type="text" name="total" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeypress="return onlynumber(event);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Valor Total" value="<?php echo $totalVenda?>" readonly>
                                </div>
                            </div>
                            <a name="finalizar" class="w3-btn w3-green w3-center fs087e bradius mt10" onclick="<?php echo $livre?>" ><i class="fa fa-dollar-sign"></i> Finalizar</a>
                            <button name="cancelar" class="w3-btn w3-red w3-center fs087e bradius mt10" type="submit"><i class="fa fa-times"></i> Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="w3-half p10">
            <header class="w3-gray w3-text-gray">
                <div class="w3-row">
                    <div class="w3-col tac p8" style="width: 10%; border-right-style: groove; border-right-color: gray;">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="w3-col p8" style="width: 65%;">
                        Carrinho
                    </div>
                </div>
            </header>
            <div class="w3-border w3-border-gray h450">
                <table class="w3-table w3-border w3-striped w3-white">
                    <thead class="w3-gray">
                        <th class="w3-border" style="width: 14%">Qtde</th>
                        <th class="w3-border" style="width: 50%">Produto</th>
                        <th class="w3-border" style="width: 18%">vlr Unit</th>
                        <th class="w3-border" style="width: 18%">Vlr Total</th>
                    </thead>
                    <?php if(!$first){?>
                        <tbody>
                            <?php foreach ($prods as $prod) {?>
                                <tr>
                                    <td><?php echo $prod['qtd']?></td>
                                    <td><?php echo $prod['produto']?></td>
                                    <td><?php echo $prod['unit']?></td>
                                    <td><?php echo $prod['total']?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    <?php }?>
                </table>
                <?php if($first){
                    echo "Nenhum produto adcionado ao carrinho.";
                }?>
            </div>
        </div>
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
                <input type="hidden" name="cliente" value="<?php echo $cliente?>">
                <div class="w3-row">
                    <div class="w3-third w3-col w3-border w3-border-gray w3-gray" style="border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Total</label>
                    </div>
                    <div class="w3-twothird">
                        <input type="text" name="total" id="total" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" style="border-radius: 0 6px 6px 0;" value="R$ <?php echo number_format($totalVenda, 2, ",", ".");?>" readonly="readonly">
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

</body>
</html>