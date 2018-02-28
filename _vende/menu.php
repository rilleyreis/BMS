<?php require 'checkin.php';?>
<div class="wfull hfull bgcMenu">
    <div class="h115 w100 pt10 ml15">
        <a href="index.php"><img src="../_img/logo.png" alt="" class="wfull hfull"></a>
    </div>
    <h6 class="fs095e w3-text-white mt05 w3-center">Business Manager System</h6>
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
