<?php
session_start();
require '../../util/config.php';
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="author" content="Rilley Reis">

<link rel="stylesheet" href="../../app/css/style.css">
<link rel="stylesheet" href="../../app/css/w3.css">
<link rel="stylesheet" href="../../app/css/jquery-ui.css">
<!--<link rel="stylesheet" href="../../app/css/fa-svg-with-js.css">-->
<!--<link rel="stylesheet" href="../../app/css/font-awesome.css">-->

<script defer src="../../app/js/fontawesome-all.min.js"></script>
<script type="text/javascript" src="../../app/js/jquery-1.12.4.js"></script>
<script type='text/javascript' src="../../app/js/jquery-ui.js"></script>
<script type="text/javascript" src="../../app/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="../../app/js/jquery.maskMoney.js"></script>
<script type="text/javascript" src="../../app/js/masks.js"></script>
<script type="text/javascript" src="../../app/js/format.js"></script>
<script>
    $(function () {
        $.getJSON("../../php/control/users/users_data.php", function (dados) {
            var users = [];
            console.log(dados);
            $(dados).each(function (key, value) {
                users.push(value.id + "|" + value.fnome + " " + value.lnome);
            });
            $("#user").autocomplete({
                source: users
            });
        });
    });
</script>

<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php include '../../php/control/servico/serv_dados.php'?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu" style="z-index:4; padding: 1.5px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <a onclick="openMenu(3)" class="cp fs10e"><span class="w3-bar-item w3-text-white w3-right">Bem-Vindo, <strong><?php echo $_SESSION['nomeUser'];?></strong> <i class="fa fa-caret-down"></i></span></a>
    <!--    <div id="menu3" class="w3-hide bgcMenu fs087e w3-right">-->
    <!--        <a href="#" class="w3-bar-item w3-button fs11e" title="Meus Dados"><i class="fa fa-user"></i></a>-->
    <!--        <a href="#" class="w3-bar-item w3-button" title="Logout"><i class="fa fa-sign-out"></i></a>-->
    <!--    </div>-->
</div>


<!-- Sidebar/menu -->
<?php include '../../include/'.$_SESSION['panelUser'].'/menu.php'?>

<div class="w3-main p15" style="margin-left: 300px; margin-top: 43px;">
    <div class="w3-card mt35">
        <header class="w3-gray w3-text-gray">
            <div class="w3-row">
                <div class="w3-col tac p8" style="width: 5%; border-right-style: groove; border-right-color: gray;">
                    <i class="fas fa-wrench"></i>
                </div>
                <div class="w3-col p8" style="width: 65%;">
                    Serviços
                </div>
            </div>
        </header>
        <div class="p10">
            <div class="p8 w3-pale-blue mb15" id="msg">
                <p class="fs076e w3-text-blue">Todos os campos com (*) são obrigatórios!</p>
            </div>
            <form action="" method="post">
                <input type="text" name="id" hidden="hidden" value="<?php echo $id;?>">
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Nome *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="nome" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="20" placeholder="Nome" value="<?php echo $nome?>" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Descrição *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="descricao" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Descrição" value="<?php echo $descricao?>" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Técnico *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="user" id="user" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Técnico" value="<?php echo $user?>" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Preço *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="valor" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 money fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Preço" value="<?php echo $valor?>" required>
                    </div>
                </div>
                <button name="adicionar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $add;?>><i class="fas fa-save"></i> Adicionar</button>
                <button name="salvar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $edt;?>><i class="fas fa-edit"></i> Salvar</button>
                <button class="w3-btn w3-blue-gray w3-center fs087e bradius" type="reset" <?php echo $add;?>><i class="fas fa-eraser"></i> Limpar</button>
                <a class="w3-btn w3-deep-orange w3-center fs087e bradius" href="../service"><i class="fas fa-times"></i> Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>