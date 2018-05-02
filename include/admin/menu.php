<nav class="w3-sidebar w3-collapse w3-animate-left" style="z-index:3;width:300px;" id="mySidebar">
    <div class="hfull wfull bgcMenu w3-text-white p5">
        <div class="w3-container tac">
            <div class="s4 dbl">
                <?php
                    $nivel = "../";
                    if(file_exists("../img/logo.png")) {
                        $nivel = "";
                        ?>
                        <img src="../img/logo.png" class="w100">
                        <?php
                    }else{
                ?>
                        <img src="../../img/logo.png" class="w100">
                <?php }?>
            </div>
            <div class="w3-bar dbl mt05">
                <span class="dbl">Business Manager System</span>
            </div>
            <div class="m0a">
                <a href="#" class="w3-bar-item w3-button fs11e" title="Meus Dados"><i class="fas fa-user"></i></a>
                <a href="#" class="w3-bar-item w3-button" title="Logout"><i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <a href="<?php echo $nivel?>admin"><h5><i class="fas fa-tachometer-alt"></i> Dashboard</h5></a>
        </div>
        <div class="w3-bar-block">
            <a class="w3-bar-item w3-hover-gray w3-block w3-left-align wfull w3-text-white fs095e" href="<?php echo $nivel?>cliente"><i class="fas fa-users fa-fw mr03"></i>  Clientes</a>
            <a class="w3-bar-item w3-hover-gray w3-block w3-left-align wfull w3-text-white fs095e" href="<?php echo $nivel?>fornecedor"><i class="fas fa-industry fa-fw mr03"></i> Fornecedores</a>
            <a class="w3-bar-item w3-hover-gray w3-block w3-left-align wfull w3-text-white fs095e" href="<?php echo $nivel?>produto"><i class="fas fa-pallet fa-fw mr03"></i> Produtos</a>
            <a class="w3-bar-item w3-hover-gray w3-block w3-left-align wfull w3-text-white fs095e" href="<?php echo $nivel?>service"><i class="fas fa-wrench fa-fw mr03"></i> Serviços</a>
            <a class="w3-bar-item w3-hover-gray w3-block w3-left-align wfull w3-text-white fs095e" href="<?php echo $nivel?>os"><i class="fas fa-file-alt fa-fw mr03"></i> OS</a>
            <a class="w3-bar-item w3-hover-gray w3-block w3-left-align wfull w3-text-white fs095e" href="<?php echo $nivel?>users"><i class="fas fa-user fa-fw mr03"></i> Usuário</a>
            <button class="w3-button w3-block w3-left-align w3-text-white fs095e wfull" onclick="openMenu(1)"><i class="fas fa-exchange-alt fa-fw mr03"></i> Financeiro <i class="fa fa-caret-down"></i></button>
            <div id="menu1" class="w3-hide bgcMenu fs087e wfull">
                <a href="" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-shopping-basket fa-fw mr03"></i> Venda</a>
                <a href="" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-chart-line fa-fw mr03"></i> Lançamento</a>
            </div>
            <button class="w3-button w3-block w3-left-align w3-text-white fs095e wfull" onclick="openMenu(2)"><i class="fas fa-cogs fa-fw mr03"></i> Configuração <i class="fa fa-caret-down"></i></button>
            <div id="menu2" class="w3-hide bgcMenu fs087e wfull">
                <a href="<?php echo $nivel?>empresa" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-building fa-fw mr03"></i> Empresa</a>
            </div>
        </div>
    </div>
</nav>


<script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
            overlayBg.style.display = "none";
        } else {
            mySidebar.style.display = 'block';
            overlayBg.style.display = "block";
        }
    }

    // Close the sidebar with the close button
    function w3_close() {
        mySidebar.style.display = "none";
        overlayBg.style.display = "none";
    }


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