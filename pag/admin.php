<?php
    session_start();
    require '../util/config.php';
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="author" content="Rilley Reis">

<link rel="stylesheet" href="../app/css/style.css">
<link rel="stylesheet" href="../app/css/w3.css">

<script defer src="../app/js/fontawesome-all.min.js"></script>

<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php include "../php/control/adminHome.php"?>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu" style="z-index:4; padding: 1.5px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <a onclick="openMenu(3)" class="cp fs10e"><span class="w3-bar-item w3-text-white w3-right">Bem-Vindo, <strong><?php echo $_SESSION['nomeUser'];?></strong> <i class="fa fa-caret-down"></i></span></a>
<!--    <div id="menu3" class="w3-hide bgcMenu fs087e w3-right">-->
<!--        <a href="#" class="w3-bar-item w3-button fs11e" title="Meus Dados"><i class="fa fa-user"></i></a>-->
<!--        <a href="#" class="w3-bar-item w3-button" title="Logout"><i class="fa fa-sign-out"></i></a>-->
<!--    </div>-->
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Sidebar/menu -->
<?php include '../include/admin/menu.php'?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fas fa-tachometer-alt"></i> My Dashboard</b></h5>
    </header>

    <div class="w3-row-padding w3-margin-bottom">
        <button class="w3-quarter w3-btn w3-red">
            <div class="w3-container w3-red w3-padding-16 tac">
                <div class=""><i class="fas fa-users w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>Clientes</h4>
            </div>
        </button>
        <button class="w3-quarter w3-btn w3-blue">
            <div class="w3-container w3-blue w3-padding-16 tac">
                <div class=""><i class="fas fa-file-alt w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>OS</h4>
            </div>
        </button>
        <button class="w3-quarter w3-btn w3-teal">
            <div class="w3-container w3-teal w3-padding-16 tac">
                <div class=""><i class="fas fa-shopping-basket w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>Vendas</h4>
            </div>
        </button>
        <button class="w3-quarter w3-btn w3-orange">
            <div class="w3-container w3-orange w3-text-white w3-padding-16 tac">
                <div class=""><i class="fas fa-clipboard w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>Relatórios</h4>
            </div>
        </button>
    </div>

    <div class="w3-panel">
        <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-third">
                <h5>Caixa</h5>
                <div class="p5">
                    <div class="h100 p5 tac bbtsc1">
                        <h1 class="fs11e">Troco</h1>
                        <h1 class="fs20e">R$ <?php echo $troco?></h1>
                    </div>
                    <div class="h100 p5 tac">
                        <h1 class="fs11e">Em Caixa</h1>
                        <h1 class="fs20e">R$ <?php echo $troco?></h1>
                    </div>
                </div>
            </div>
            <div class="w3-twothird">
                <h5>Ordens de Serviço</h5>
                <table class="w3-table w3-striped w3-white">
                    <tr>
                        <td><i class="fas fa-file-alt w3-text-blue w3-large"></i></td>
                        <td>Abertas</td>
                        <td><i>10</i></td>
                    </tr>
                    <tr>
                        <td><i class="far fa-clipboard w3-text-red w3-large"></i></td>
                        <td>Orçadas</td>
                        <td><i>15</i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-clipboard-check w3-text-teal w3-large"></i></td>
                        <td>Aprovadas</td>
                        <td><i>17</i></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-files-o w3-text-red w3-large"></i></td>
                        <td>Realizadas</td>
                        <td><i>25</i></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-dollar w3-text-blue w3-large"></i></td>
                        <td>Retiradas</td>
                        <td><i>28</i></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <hr>

</div>



</body>
</html>
