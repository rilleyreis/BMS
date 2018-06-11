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
                    <a href="#" class="w3-button"><i class="fa fa-user"></i></a>
                    <a href="#" class="w3-button"><i class="fa fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="w3-container">
            <a href="<?php echo $nivel?>admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </div>
        <div class="w3-bar-block">
            <button class="w3-button w3-block w3-left-align w3-text-white wfull" onclick="openMenu(4)"><i class="fas fa-wrench fa-fw mr03"></i> Serviços <i class="fa fa-caret-down"></i></button>
            <div id="menu4" class="w3-hide bgcMenu fs087e wfull">
                <a href="<?php echo $nivel?>service" class="w3-bar-item w3-hover-gray w3-text-white wfull ml10"><i class="fas fa-wrench fa-fw mr03" ></i> Gerenciar</a>
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