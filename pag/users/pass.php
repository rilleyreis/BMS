<?php
session_start();
require '../../util/config.php';
?>
<!DOCTYPE html>
<html>
<?php include '../../include/headDados.php';?>
<script>
    function checkPass() {
        NSenha = document.TrocaSenha.newPass.value;
        CSenha = document.TrocaSenha.newSenha.value;
        if(NSenha != CSenha)
            document.getElementById('passErro').style.display='block';
        else
            document.TrocaSenha.submit();
    }
</script>
<body class="w3-light-grey">
<?php include '../../php/control/users/usr_pass.php';?>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu" style="z-index:4; padding: 3px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right w3-text-white fwb">Business Manager System</span>
</div>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Sidebar/menu -->
<div style="margin-top: 43px">
    <?php include '../../include/'.$_SESSION['panelUser'].'/menu.php'?>
</div>


<div class="w3-main" style="margin-left: 300px; margin-top: 43px; padding: 1px 15px">
    <div class="w3-card mt35">
        <header class="w3-gray fs087e w3-text-gray">
            <div class="w3-row">
                <div class="w3-col tac p8" style="width: 5%; border-right-style: groove; border-right-color: gray;">
                    <i class="fas fa-key"></i>
                </div>
                <div class="w3-rest p8">
                    Alterar Senha
                </div>
            </div>
        </header>
        <div class="p10">
            <form action="" method="post" id="TrocaSenha" name="TrocaSenha">
                <div class="w3-pale-red mb05 bradius w3-left wfull" id="pass" style="<?php echo $dis;?> padding: 3px;">
                    <p class="fs076e w3-text-red w3-left mr10 ml30">Senha Atual Inválida!</p>
                    <span class="fs076e w3-text-red w3-left cp" onclick="document.getElementById('pass').style.display='none'">&times;</span>
                </div>
                <input type="hidden" value="<?php echo $senha;?>" name="senha" id="oldPass">
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="nomeUsuario" class="fs087e w3-text-white" style="">Senha Atual</label>
                    </div>
                    <div class="w3-rest">
                        <input type="password" id="oldSenha" name="oldSenha" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;"  required>
                    </div>
                </div>
                <div class="w3-pale-red mb05 bradius w3-left wfull" id="passErro" style="display: none; padding: 3px;">
                    <p class="fs076e w3-text-red w3-left mr10 ml30">Senhas Diferentes!</p>
                    <span class="fs076e w3-text-red w3-left cp" onclick="document.getElementById('passErro').style.display='none'">&times;</span>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="snomeUsuario" class="fs087e w3-text-white mt05">Nova Senha</label>
                    </div>
                    <div class="w3-rest">
                        <input type="password" id="newPass" name="newPass" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;"  required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="cpfUsuario" class="fs087e w3-text-white mt05">Confirmar Senha</label>
                    </div>
                    <div class="w3-rest">
                        <input type="password" id="newSenha" name="newSenha" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;"  required>
                    </div>
                </div>
                <button name="save" class="w3-btn w3-green w3-center fs087e bradius" type="button" onclick="checkPass();"><i class="fas fa-save mr03"></i>Salvar</button>
                <a class="w3-btn w3-deep-orange w3-center fs087e bradius" href="../users"><i class="fas fa-times mr03"></i>Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>