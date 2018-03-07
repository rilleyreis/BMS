<?php require 'checkin.php';?>
<div class="wfull hfull bgcMenu">
    <div class="h115 w100 pt10 ml45">
        <a href="../admin"><img src="../../img/logo.png" alt="" class="wfull hfull"></a>
    </div>
    <h6 class="fs095e w3-text-white mt05 w3-center">Business Manager System</h6>
    <div class="w3-container bgcba mb10 mt10">
        <h6 class="fs087e w3-text-white">Menu</h6>
    </div>
    <div class="wfull">
        <a class="w3-button w3-block w3-left-align wfull w3-text-white fs095e" href="../cliente">Clientes</a>
        <a class="w3-button w3-block w3-left-align wfull w3-text-white fs095e" href="../fornecedor">Fornecedor</a>
        <a class="w3-button w3-block w3-left-align wfull w3-text-white fs095e" href="../produto">Produtos</a>
        <a class="w3-button w3-block w3-left-align wfull w3-text-white fs095e" href="">Serviços</a>
        <a class="w3-button w3-block w3-left-align wfull w3-text-white fs095e" href="">OS</a>
        <button class="w3-button w3-block w3-left-align w3-text-white fs095e wfull" onclick="openMenu(1)">Financeiro <i class="fa fa-caret-down"></i></button>
        <div id="menu1" class="w3-hide bgcMenu w3-card fs087e">
            <a href="" class="w3-button w3-text-white wfull" style="margin-left: -45px;">Venda</a>
            <a href="" class="w3-button w3-text-white wfull" style="margin-left: -42px;">Lançamento</a>
        </div>
        <button class="w3-button w3-block w3-left-align w3-text-white fs095e wfull" onclick="openMenu(2)">Configuração <i class="fa fa-caret-down"></i></button>
        <div id="menu2" class="w3-hide bgcMenu w3-card fs087e">
            <a href="../users" class="w3-button w3-text-white wfull" style="margin-left: -45px;">Usuário</a>
            <a href="../empresa" class="w3-button w3-text-white wfull" style="margin-left: -42px;">Empresa</a>
        </div>
    </div>
</div>


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
