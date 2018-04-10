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
    <a onclick="openMenu(3)" class="cp fs10e"><span class="w3-bar-item w3-text-white w3-right">Bem-Vindo, <strong><?php echo $_SESSION['fnomeUser'];?></strong> <i class="fa fa-caret-down"></i></span></a>
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
    <div class="w3-container">
        <h5>Estatísticas do Sistema</h5>
        <p>New Visitors</p>
        <div class="w3-grey">
            <div class="w3-container w3-center w3-padding w3-green" style="width:25%">+25%</div>
        </div>

        <p>New Users</p>
        <div class="w3-grey">
            <div class="w3-container w3-center w3-padding w3-orange" style="width:50%">50%</div>
        </div>

        <p>Bounce Rate</p>
        <div class="w3-grey">
            <div class="w3-container w3-center w3-padding w3-red" style="width:75%">75%</div>
        </div>
    </div>
    <hr>

    <div class="w3-container">
        <h5>Countries</h5>
        <table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white">
            <tr>
                <td>United States</td>
                <td>65%</td>
            </tr>
            <tr>
                <td>UK</td>
                <td>15.7%</td>
            </tr>
            <tr>
                <td>Russia</td>
                <td>5.6%</td>
            </tr>
            <tr>
                <td>Spain</td>
                <td>2.1%</td>
            </tr>
            <tr>
                <td>India</td>
                <td>1.9%</td>
            </tr>
            <tr>
                <td>France</td>
                <td>1.5%</td>
            </tr>
        </table><br>
        <button class="w3-button w3-dark-grey">More Countries  <i class="fa fa-arrow-right"></i></button>
    </div>
    <hr>
    <div class="w3-container">
        <h5>Recent Users</h5>
        <ul class="w3-ul w3-card-4 w3-white">
            <li class="w3-padding-16">
                <img src="/w3images/avatar2.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
                <span class="w3-xlarge">Mike</span><br>
            </li>
            <li class="w3-padding-16">
                <img src="/w3images/avatar5.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
                <span class="w3-xlarge">Jill</span><br>
            </li>
            <li class="w3-padding-16">
                <img src="/w3images/avatar6.png" class="w3-left w3-circle w3-margin-right" style="width:35px">
                <span class="w3-xlarge">Jane</span><br>
            </li>
        </ul>
    </div>
    <hr>

    <div class="w3-container">
        <h5>Recent Comments</h5>
        <div class="w3-row">
            <div class="w3-col m2 text-center">
                <img class="w3-circle" src="/w3images/avatar3.png" style="width:96px;height:96px">
            </div>
            <div class="w3-col m10 w3-container">
                <h4>John <span class="w3-opacity w3-medium">Sep 29, 2014, 9:12 PM</span></h4>
                <p>Keep up the GREAT work! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
            </div>
        </div>

        <div class="w3-row">
            <div class="w3-col m2 text-center">
                <img class="w3-circle" src="/w3images/avatar1.png" style="width:96px;height:96px">
            </div>
            <div class="w3-col m10 w3-container">
                <h4>Bo <span class="w3-opacity w3-medium">Sep 28, 2014, 10:15 PM</span></h4>
                <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
            </div>
        </div>
    </div>
    <br>
    <div class="w3-container w3-dark-grey w3-padding-32">
        <div class="w3-row">
            <div class="w3-container w3-third">
                <h5 class="w3-bottombar w3-border-green">Demographic</h5>
                <p>Language</p>
                <p>Country</p>
                <p>City</p>
            </div>
            <div class="w3-container w3-third">
                <h5 class="w3-bottombar w3-border-red">System</h5>
                <p>Browser</p>
                <p>OS</p>
                <p>More</p>
            </div>
            <div class="w3-container w3-third">
                <h5 class="w3-bottombar w3-border-orange">Target</h5>
                <p>Users</p>
                <p>Active</p>
                <p>Geo</p>
                <p>Interests</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-16 w3-light-grey">
        <h4>FOOTER</h4>
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer>

    <!-- End page content -->
</div>



</body>
</html>
