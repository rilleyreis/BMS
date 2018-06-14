<nav class="w3-sidebar w3-collapse fs095e" style="z-index:3;width:300px;" id="mySidebar">
    <div class="hfull wfull bgcMenu w3-text-white p5">
        <div class="w3-container tac">
            <div class="s4 dbl">
                <?php
                    $nivel = "../";
                    if(file_exists("../img/avatar2.png")) {
                        $nivel = "";
                        ?>
                        <img src="../img/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
                        <?php
                    }else{
                ?>
                        <img src="../../img/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
                <?php }?>
            </div>
            <div class="s8 w3-bar m0a wfull mt10">
                <span>Bem vindo, <strong><?php echo $_SESSION['nomeUser']." ".$_SESSION['snomeUser'];?></strong></span><br>
                <div class="m0a tac">
                    <a href="<?php echo $nivel?>users/dados.php?edt=<?php echo base64_encode($_SESSION['idUser'])?>" class="w3-button" title="MEUS DADOS"><i class="fas fa-id-card"></i></a>
                    <a href="<?php echo $nivel?>users/pass" class="w3-button" title="ALTERAR SENHA"><i class="fas fa-key"></i></a>
                    <a href="<?php echo $nivel?>../php/control/logout" class="w3-button" title="SAIR"><i class="fa fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <a href="<?php echo $nivel?>admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </div>
        <div class="w3-bar-block">
            <button class="w3-button w3-block w3-left-align w3-text-white wfull mt05" onclick="openMenu(1)"><i class="fas fa-users fa-fw mr03"></i> Clientes <i class="fa fa-caret-down"></i></button>
            <div id="menu1" class="w3-hide bgcMenu fs087e wfull">
                <a href="<?php echo $nivel?>cliente" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-users fa-fw mr03" ></i> Gerenciar</a>
                <a href="<?php echo $nivel?>cliente/dados" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-plus-square fa-fw mr03"></i> Adicionar</a>
            </div>
            <button class="w3-button w3-block w3-left-align w3-text-white wfull" onclick="openMenu(2)"><i class="fas fa-industry fa-fw mr03"></i> Fornecedor <i class="fa fa-caret-down"></i></button>
            <div id="menu2" class="w3-hide bgcMenu fs087e wfull">
                <a href="<?php echo $nivel?>fornecedor" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-industry fa-fw mr03" ></i> Gerenciar</a>
                <a href="<?php echo $nivel?>fornecedor/dados"class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-plus-square fa-fw mr03"></i> Adicionar</a>
            </div>
            <button class="w3-button w3-block w3-left-align w3-text-white wfull" onclick="openMenu(3)"><i class="fas fa-pallet fa-fw mr03"></i> Produtos <i class="fa fa-caret-down"></i></button>
            <div id="menu3" class="w3-hide bgcMenu fs087e wfull">
                <a href="<?php echo $nivel?>produto" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-pallet fa-fw mr03" ></i> Gerenciar</a>
                <a href="<?php echo $nivel?>produto/dados" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-plus-square fa-fw mr03"></i> Adicionar</a>
                <a href="" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-exchange-alt fa-fw mr03"></i> Troca</a>
            </div>
            <button class="w3-button w3-block w3-left-align w3-text-white wfull" onclick="openMenu(4)"><i class="fas fa-wrench fa-fw mr03"></i> Serviços <i class="fa fa-caret-down"></i></button>
            <div id="menu4" class="w3-hide bgcMenu fs087e wfull">
                <a href="<?php echo $nivel?>service" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-wrench fa-fw mr03" ></i> Gerenciar</a>
                <a href="<?php echo $nivel?>service/dados"class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-plus-square fa-fw mr03"></i> Adicionar</a>
            </div>
            <button class="w3-button w3-block w3-left-align w3-text-white wfull" onclick="openMenu(5)"><i class="fas fa-file-alt fa-fw mr03"></i> Ordem de Serviço <i class="fa fa-caret-down"></i></button>
            <div id="menu5" class="w3-hide bgcMenu fs087e wfull">
                <a href="<?php echo $nivel?>os" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-file-alt fa-fw mr03" ></i> Gerenciar</a>
                <a href="<?php echo $nivel?>os/dados"class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-plus-square fa-fw mr03"></i> Adicionar</a>
            </div>
            <button class="w3-button w3-block w3-left-align w3-text-white wfull" onclick="openMenu(6)"><i class="fas fa-user fa-fw mr03"></i> Usuários <i class="fa fa-caret-down"></i></button>
            <div id="menu6" class="w3-hide bgcMenu fs087e wfull">
                <a href="<?php echo $nivel?>users" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-user fa-fw mr03" ></i> Gerenciar</a>
                <a href="<?php echo $nivel?>users/dados"class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-plus-square fa-fw mr03"></i> Adicionar</a>
            </div>
            <button class="w3-button w3-block w3-left-align w3-text-white fs095e wfull" onclick="openMenu(7)"><i class="fas fa-donate fa-fw mr03"></i> Financeiro <i class="fa fa-caret-down"></i></button>
            <div id="menu7" class="w3-hide bgcMenu fs087e wfull">
                <a href="<?php echo $nivel?>venda" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-shopping-basket fa-fw mr03"></i> Venda</a>
                <a href="<?php echo $nivel?>venda/caixa" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-chart-line fa-fw mr03"></i> Caixa</a>
            </div>
            <button class="w3-button w3-block w3-left-align w3-text-white fs095e wfull" onclick="openMenu(9)"><i class="fas fa-file-medical-alt fa-fw mr03"></i> Relatórios <i class="fa fa-caret-down"></i></button>
            <div id="menu9" class="w3-hide bgcMenu fs087e wfull">
                <a href="<?php echo $nivel?>relatorios/logs" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-tasks fa-fw mr03"></i> Logs</a>
                <a href="<?php echo $nivel?>relatorios" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-chart-line fa-fw mr03"></i> Financeiro</a>
            </div>
            <button class="w3-button w3-block w3-left-align w3-text-white fs095e wfull" onclick="openMenu(8)"><i class="fas fa-cogs fa-fw mr03"></i> Configuração <i class="fa fa-caret-down"></i></button>
            <div id="menu8" class="w3-hide bgcMenu fs087e wfull">
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