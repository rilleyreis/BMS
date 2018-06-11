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

<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php //include '../../php/control/venda/venda_view.php'?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu no-print" style="z-index:4; padding: 3px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right fwb w3-text-white">Business Manager System</span>
</div>


<!-- Sidebar/menu -->
<?php include '../../include/'.$_SESSION['panelUser'].'/menu.php'?>

<div class="w3-main p15" style="margin-left: 300px; margin-top: 43px;">
    <div class="w3-row-padding w3-margin-bottom">
        <a class="w3-third w3-btn w3-teal" href="../venda">
            <div class="w3-container w3-teal w3-padding-16 tac">
                <div class=""><i class="fas fa-shopping-basket w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>Vendas</h4>
            </div>
        </a>
        <a class="w3-third w3-btn w3-red" href="">
            <div class="w3-container w3-red w3-padding-16 tac">
                <div class=""><i class="fas fa-money-bill-alt w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>Retirada</h4>
            </div>
        </a>
        <a class="w3-third w3-btn w3-blue" href="os">
            <div class="w3-container w3-blue w3-padding-16 tac">
                <div class=""><i class="fas fa-file-alt w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>OS</h4>
            </div>
        </a>
    </div>

    <div>
        <h5>Caixa</h5>
        <div class="bbtsc1 mb35 pb05">
            <div class="tac bbtsc1 w3-row pb05">
                <div class="w3-half">
                    <h1 class="fs095e">Troco</h1>
                    <h1 class="fs10e fwb">R$ </h1>
                </div>
                <div class="w3-half">
                    <h1 class="fs095e">Movimentção do Dia</h1>
                    <h1 class="fs10e fwb">R$ </h1>
                </div>
            </div>
            <div class="tac mb10">
                <table class="w3-table w3-striped w3-bordered w3-white">
                    <tr>
                        <td>Dinehiro</td>
                        <td>R$ </td>
                    </tr>
                    <tr>
                        <td>Crédito</td>
                        <td>R$ </td>
                    </tr>
                    <tr>
                        <td>Débito</td>
                        <td>R$ </td>
                    </tr>
                </table>
            </div>
            <button class="w3-btn w3-blue-gray w3-round w3-text-white mt10">Fechar Caixa</button>
        </div>
    </div>

    <h5>Detalhamento da Movimentação</h5>
    <table class="w3-table w3-striped fs087e">
        <thead class="bgcTH fs095e">
        <th class="w3-border w3-border-gray w3-center" style="width: 10%">#</th>
        <th class="w3-border w3-border-gray" style="width: 25%">Tipo</th>
        <th class="w3-border w3-border-gray" style="width: 15%">Valor</th>
        <th class="w3-border w3-border-gray" style="width: 20%">Forma de Pagamento</th>
        <th class="w3-border w3-border-gray" style="width: 10%">Parcelas</th>
        <th class="w3-border w3-border-gray" style="width: 20%">Ações</th>
        </thead>
        <tbody class="fs087e">
        </tbody>
    </table>
</div>

</body>
</html>