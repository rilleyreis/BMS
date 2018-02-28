<?php require 'checkin.php';?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Rilley Reis">

    <link rel="stylesheet" href="../_css/style.css">
    <link rel="stylesheet" href="../_css/font-awesome.css">
    <link rel="stylesheet" href="../_css/w3.css">

    <title>BMS - Vendendor</title>
</head>
<body>
    <?php include 'admin_index.php';?>
    <nav class="w3-sidebar hfull" style="width: 15%">
        <div class="wfull hfull bgcMenu">
            <div class="h115 w100 pt10 ml15 m0a">
                <a href="index.php"><img src="../_img/logo.png" alt="" class="wfull hfull"></a>
            </div>
            <h6 class="fs095e w3-text-white mt05 w3-center">Gestor de Assitência Técnica</h6>
            <div class="w3-container bgcba mb10 mt10">
                <h6 class="fs087e w3-text-white">Menu</h6>
            </div>
            <div class="wfull">
                <a class="w3-button w3-block w3-left-align wfull w3-text-white fs095e" href="cliente">Clientes</a>
                <a class="w3-button w3-block w3-left-align wfull w3-text-white fs095e" href="">Produtos</a>
                <a class="w3-button w3-block w3-left-align wfull w3-text-white fs095e" href="">Serviços</a>
                <a class="w3-button w3-block w3-left-align wfull w3-text-white fs095e" href="">OS</a>
            </div>
        </div>
    </nav>
    <div class="bgcMenu h40 pt10" style="margin-left: 15%">
        <div class="hfull">
            <div class="fs087e">
                <nav class="w3-text-gray">
                    <a href="#" class="p10 w3-hover-text-white" style="boa er-style: none groove none groove; border-color: #00001F;"><i class="fa fa-gears mr10"></i> Meus Dados</a>
                    <a href="#" class="p10 w3-hover-text-white" style="margin-left: -8px; border-style: none groove none groove; border-color: #00001F"><i class="fa fa-sign-out mr10"></i> Sair do Sistema</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="bgcC1 h40 pt10 pl20" style="margin-left: 15%">
        <p class="fs087e w3-text-gray "><a href="../_admin" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home ></a></p>
    </div>
    <div class="w3-container" style="margin-left: 15%;">

    <script>
        function openMenu(id) {
            var x = document.getElementById("menu"+id);
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
                x.previousElementSibling.className += " w3-green";
            } else {
                x.className = x.className.replace(" w3-show", "");
                x.previousElementSibling.className =
                    x.previousElementSibling.className.replace(" w3-green", "");
            }
        }
    </script>
</body>
</html>