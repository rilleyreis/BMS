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
<!--<link rel="stylesheet" href="../../app/css/fa-svg-with-js.css">-->
<!--<link rel="stylesheet" href="../../app/css/font-awesome.css">-->

<script defer src="../../app/js/fontawesome-all.min.js"></script>
<script defer src="../../app/js/jquery-1.12.4.js"></script>
<script defer src="../../app/js/jquery.maskedinput.js"></script>
<script defer src="../../app/js/jquery.maskMoney.js"></script>
<script defer src="../../app/js/masks.js"></script>
<script defer src="../../app/js/format.js"></script>

<script>
    function cnpj(object) {
        var stringCnpj = object.value.replace(/[^\d]+/g,'');
        var valido = validarCNPJ(stringCnpj);
        if(valido){
            document.getElementById('cnpjErro').style.display = 'none';
        }else{
            object.value = "";
            document.getElementById('cnpjErro').style.display = 'block';
        }
    }
</script>

<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php include '../../php/control/fornecedor/forn_dados.php'?>

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
<?php include '../../include/'.$_SESSION['panelUser'].'/menu.php'?>

<div class="w3-main p15" style="margin-left: 300px; margin-top: 43px;">
    <div class="w3-card mt35">
        <header class="w3-gray w3-text-gray">
            <div class="w3-row">
                <div class="w3-col tac p8" style="width: 5%; border-right-style: groove; border-right-color: gray;">
                    <i class="fas fa-industry"></i>
                </div>
                <div class="w3-rest p8" style="width: 65%;">
                    Dados Fornecedor
                </div>
            </div>
        </header>
        <div class="p10">
            <div class="p8 w3-pale-blue mb15 bradius" id="msg">
                <p class="fs076e w3-text-blue">Todos os campos com (*) são obrigatórios!</p>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="w3-pale-red mb05 bradius" id="cnpjErro" style="display: none; padding: 3px;">
                    <span class="fs076e w3-text-red w3-right cp" onclick="document.getElementById('cnpjErro').style.display='none'">&times;</span>
                    <p class="fs076e w3-text-red">CNPJ Inválido!!</p>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="idPJ" value="<?php echo $idPJ;?>">
                    <input type="hidden" name="idEnd" value="<?php echo $idEnd;?>">
                </div>
                <input type="text" hidden="hidden" value="" name="endereco">
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">CNPJ *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="cnpj_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 cnpj fs087e" style="border-radius: 0 6px 6px 0;" onblur="cnpj(this);" placeholder="CNPJ" value="<?php echo $cnpj_forn?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Razão Social *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="raz_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Razão Social" value="<?php echo $raz_forn?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Nome Fantasia *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="fant_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Nome Fantasia" value="<?php echo $fant_forn?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Inscrição Estadual*</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="ie_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 ie fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Inscrição Estadual" value="<?php echo $ie_forn?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Telefone *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="tel_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 tel fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Telefone" value="<?php echo $tel_forn?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Email *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="email" name="email_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Email" value="<?php echo $email_forn?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Rua *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="rua_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="70" placeholder="Rua" value="<?php echo $rua_forn?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Número *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="num_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeypress="return onlynumber(event)" style="border-radius: 0 6px 6px 0;" placeholder="Número" value="<?php echo $num_forn?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Bairro *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="bairro_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="25" placeholder="Bairro" value="<?php echo $bairro_forn?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Cidade *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="cid_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="25" placeholder="Cidade" value="<?php echo $cid_forn?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Estado *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="est_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="2" placeholder="Estado" value="<?php echo $est_forn?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">CEP *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="cep_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e cep" style="border-radius: 0 6px 6px 0;" placeholder="CEP" value="<?php echo $cep_forn?>" required="required">
                    </div>
                </div>
                <button name="adicionar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $add;?>><i class="fas fa-save"></i> Adicionar</button>
                <button name="editar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $edt;?>><i class="fas fa-edit"></i> Editar</button>
                <button class="w3-btn w3-deep-orange w3-center fs087e bradius" type="reset" <?php echo $add;?>><i class="fas fa-eraser"></i> Limpar</button>
                <a class="w3-btn w3-blue-gray w3-center fs087e bradius" href="../fornecedor"><i class="fas fa-times"></i> Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>