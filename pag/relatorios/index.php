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

<script defer src="../../app/js/fontawesome-all.min.js"></script>

<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php include "../../php/control/relatorios/rel_index.php"?>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu" style="z-index:4; padding: 3px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right fwb w3-text-white">Business Manager System</span>
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Sidebar/menu -->
<?php include '../../include/admin/menu.php'?>

<!-- !PAGE CONTENT! -->
<div class="w3-main pb40" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fas fa-file-medical-alt"></i> Relatórios</b></h5>
    </header>

    <div class="w3-row-padding w3-margin-bottom">
        <a class="w3-quarter w3-btn w3-red" onclick="openOption(1)">
            <div class="w3-container w3-red w3-padding-16 tac">
                <div class=""><i class="fas fa-chart-line w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>Movimentação</h4>
            </div>
        </a>
        <a class="w3-quarter w3-btn w3-blue" onclick="openOption(2)">
            <div class="w3-container w3-blue w3-padding-16 tac">
                <div class=""><i class="fas fa-file-alt w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>OS</h4>
            </div>
        </a>
        <a class="w3-quarter w3-btn w3-teal" onclick="openOption(3)">
            <div class="w3-container w3-teal w3-padding-16 tac">
                <div class=""><i class="fas fa-shopping-basket w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>Vendas</h4>
            </div>
        </a>
        <a class="w3-quarter w3-btn w3-orange" onclick="openOption(4)">
            <div class="w3-container w3-orange w3-text-white w3-padding-16 tac">
                <div class=""><i class="fas fa-pallet w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>Produtos</h4>
            </div>
        </a>
    </div>

    <div id="op1" class="w3-hide w3-container w3-border w3-border-gray ml10 mr10">
        <form action="" method="post" class="p15">
            <input type="radio" name="tipo" value="vxo" checked>Venda / OS
            <input type="radio" name="tipo" value="exs" class="ml15 mb15">Entrada / Saída
            <input type="radio" name="tipo" value="mov" class="ml15 mb15">Movimentação Total
            <select name="time" id="" class="w3-input w3-border w3-border-gray">
                <option value="1" selected>Última semana</option>
                <option value="2">15 últimos dias</option>
                <option value="3">Último mês</option>
                <option value="4">Último semestre</option>
                <option value="5">Último ano</option>
            </select>
            <button type="submit" class="w3-btn w3-green p8 w3-round mt15" name="mov">Gerar Relatório</button>
        </form>
    </div>

    <div id="op2" class="w3-hide w3-container w3-border w3-border-gray ml10 mr10">
        <form action="" method="post" class="p15">
            <input type="radio" name="tipo" value="fxc" checked>Finalizadas/Canceladas
            <input type="radio" name="tipo" value="ost" class="ml15 mb15">OS Total
            <select name="time" id="" class="w3-input w3-border w3-border-gray">
                <option value="1" selected>Última semana</option>
                <option value="2">15 últimos dias</option>
                <option value="3">Último mês</option>
                <option value="4">Último semestre</option>
                <option value="5">Último ano</option>
            </select>
            <button type="submit" class="w3-btn w3-green p8 w3-round mt15" name="os">Gerar Relatório</button>
        </form>
    </div>

    <div id="op3" class="w3-hide w3-container w3-border w3-border-gray ml10 mr10">
        <form action="" method="post" class="p15">
            <input type="radio" name="tipo" value="clientes" class="ml15 mb15" checked>Por Cliente
            <input type="radio" name="tipo" value="formas" class="ml15 mb15">Forma de Pagamento
            <select name="time" id="" class="w3-input w3-border w3-border-gray">
                <option value="1" selected>Última semana</option>
                <option value="2">15 últimos dias</option>
                <option value="3">Último mês</option>
                <option value="4">Último semestre</option>
                <option value="5">Último ano</option>
            </select>
            <button type="submit" class="w3-btn w3-green p8 w3-round mt15" name="venda">Gerar Relatório</button>
        </form>
    </div>

    <div id="op4" class="w3-hide w3-container w3-border w3-border-gray ml10 mr10">
        <form action="" method="post" class="p15">
            <input type="radio" name="tipo" value="prod" class="ml15 mb15" checked>5 + Vendidos
            <select name="time" id="" class="w3-input w3-border w3-border-gray">
                <option value="1" selected>Última semana</option>
                <option value="2">15 últimos dias</option>
                <option value="3">Último mês</option>
                <option value="4">Último semestre</option>
                <option value="5">Último ano</option>
            </select>
            <button type="submit" class="w3-btn w3-green p8 w3-round mt15" name="prod">Gerar Relatório</button>
        </form>
    </div>

</div>

<script>
    function openOption(id) {
        var x = document.getElementById("op"+id);
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
</script>

</body>
</html>


