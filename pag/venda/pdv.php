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
    });
</script>


<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php include '../../php/control/os/os_dados.php'?>

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
                <div class="p10 w3-border w3-border-gray">
                    <form action="" class="dib wfull">
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
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Valor Unt</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" name="valorUnt" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Valor Unitário" value="" required>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Valor Total</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" name="valorTtl" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Valor Total" value="" required>
                            </div>
                        </div>
                        <button name="adicionar" class="w3-btn w3-green w3-center fs087e bradius mt10" type="submit"><i class="fa fa-plus"></i> Adicionar</button>
                    </form>
                </div>
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
                            <label for="" class="fs087e w3-text-white" style="">Total Itens</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="qtdItens" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeypress="return onlynumber(event);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Quantidade Itens" value="" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Desconto %</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="desconto" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeypress="return onlynumber(event);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Desconto %" value="" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Total</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="total" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeypress="return onlynumber(event);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Valor Total" value="" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w3-half p10">
            <header class="w3-gray w3-text-gray">
                <div class="w3-row">
                    <div class="w3-col tac p8" style="width: 10%; border-right-style: groove; border-right-color: gray;">
                        <i class="fas fa-barcode"></i>
                    </div>
                    <div class="w3-col p8" style="width: 65%;">
                        Itens Selecionado
                    </div>
                </div>
            </header>
        </div>
    </div>
</div>

</body>
</html>