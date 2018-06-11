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
<div class="w3-bar w3-top w3-large bgcMenu" style="z-index:4; padding: 3px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right fwb w3-text-white">Business Manager System</span>
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Sidebar/menu -->
<?php include '../include/admin/menu.php'?>

<!-- !PAGE CONTENT! -->
<div class="w3-main pb40" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fas fa-tachometer-alt"></i> My Dashboard</b></h5>
    </header>

    <div class="w3-row-padding w3-margin-bottom">
        <a class="w3-quarter w3-btn w3-red" href="cliente">
            <div class="w3-container w3-red w3-padding-16 tac">
                <div class=""><i class="fas fa-users w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>Clientes</h4>
            </div>
        </a>
        <a class="w3-quarter w3-btn w3-blue" href="os">
            <div class="w3-container w3-blue w3-padding-16 tac">
                <div class=""><i class="fas fa-file-alt w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>OS</h4>
            </div>
        </a>
        <a class="w3-quarter w3-btn w3-teal" href="venda">
            <div class="w3-container w3-teal w3-padding-16 tac">
                <div class=""><i class="fas fa-shopping-basket w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>Vendas</h4>
            </div>
        </a>
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
                <div class="">
                    <div class="tac bbtsc1 w3-row pb05">
                        <div class="w3-half">
                            <h1 class="fs095e">Troco</h1>
                            <h1 class="fs10e fwb">R$ <?php echo $troco?></h1>
                        </div>
                        <div class="w3-half">
                            <h1 class="fs095e">Movimentção do Dia</h1>
                            <h1 class="fs10e fwb">R$ <?php echo number_format($valorDia, 2, ',', '.');?></h1>
                        </div>
                    </div>
                    <div class="h100 tac">
                        <table class="w3-table w3-striped w3-bordered w3-white">
                            <tr>
                                <td>Dinehiro</td>
                                <td>R$ <?php echo number_format($valorDin, 2, ',', '.');?></td>
                            </tr>
                            <tr>
                                <td>Crédito</td>
                                <td>R$ <?php echo number_format($valorCC, 2, ',', '.');?></td>
                            </tr>
                            <tr>
                                <td>Débito</td>
                                <td>R$ <?php echo number_format($valorCD, 2, ',', '.');?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="w3-twothird">
                <h5>Ordens de Serviço</h5>
                <table class="w3-table w3-striped w3-white">
                    <tr>
                        <td><i class="fas fa-paste w3-text-blue w3-large"></i></td>
                        <td>Abertas</td>
                        <td><i><?php echo $aberta?></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-clipboard-list w3-text-red w3-large"></i></td>
                        <td>Orçadas</td>
                        <td><i><?php echo $orcada?></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-clipboard w3-text-teal w3-large"></i></td>
                        <td>Aprovadas</td>
                        <td><i><?php echo $aprovada?></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-clipboard-check w3-text-red w3-large"></i></td>
                        <td>Concluídas</td>
                        <td><i><?php echo $concluida?></i></td>
                    </tr>
                    <tr>
                        <td><i class="fas fa-dollar-sign w3-text-green w3-large"></i></td>
                        <td>Finalizadas</td>
                        <td><i><?php echo $final?></i></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <hr>
    <div class="w3-container">
        <h5>Estatísticas Ordem de Serviço -  De <?php echo $dtIni?> até <?php echo $dtFim?></h5>
        <p>Em Andamento</p>
        <div class="w3-grey">
            <div class="w3-container w3-center w3-padding w3-orange w3-text-white" style="width:<?php echo $perAnd?>%">+<?php echo $perAnd?>%</div>
        </div>

        <p>Finalizadas</p>
        <div class="w3-grey">
            <div class="w3-container w3-center w3-padding w3-green" style="width:<?php echo $perFim?>%">+<?php echo $perFim?>%</div>
        </div>

        <p>Canceladas</p>
        <div class="w3-grey">
            <div class="w3-container w3-center w3-padding w3-red" style="width:<?php echo $perCan?>%">+<?php echo $perCan?>%</div>
        </div>
        <button class="w3-btn w3-blue-gray w3-round w3-text-white mt10"><i class="fas fa-plus"></i> Mais</button>
    </div>
    <hr>
    <div class="w3-row-padding w3-margin-bottom">
        <h5>Estatísticas do Sistema -  Cadastros</h5>
        <div class="w3-row-padding w3-margin-bottom">
            <div class="w3-third">
                <div class="w3-container w3-red w3-padding-16">
                    <div class="w3-left"><i class="fas fa-users w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3><?php echo $numCli?></h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Cliente</h4>
                </div>
            </div>
            <div class="w3-third">
                <div class="w3-container w3-blue w3-padding-16">
                    <div class="w3-left"><i class="fas fa-user w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3><?php echo $numUser?></h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Usuários</h4>
                </div>
            </div>
            <div class="w3-third">
                <div class="w3-container w3-teal w3-padding-16">
                    <div class="w3-left"><i class="fas fa-industry w3-xxxlarge"></i></div>
                    <div class="w3-right">
                        <h3><?php echo $numForne?></h3>
                    </div>
                    <div class="w3-clear"></div>
                    <h4>Fornecedores</h4>
                </div>
            </div>
        </div>
    </div>

</div>



</body>
</html>
