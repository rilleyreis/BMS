<?php
require '../../util/config.php';
require '../../php/model/Session.php';
require '../../include/admin/checkin.php';
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Rilley Reis">

    <link rel="stylesheet" href="../../app/css/style.css">
    <link rel="stylesheet" href="../../app/css/font-awesome.css">
    <link rel="stylesheet" href="../../app/css/w3.css">

    <script type="text/javascript" src="../../app/js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="../../app/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="../../app/js/masks.js"></script>
    <script type="text/javascript" src="../../app/js/validaCNPJ.js"></script>
    <script type="text/javascript" src="../../app/js/format.js"></script>
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

    <title>BMS - Administrador</title>
</head>
<body>
<?php include '../../php/control/fornecedor/forn_dados.php';?>
<nav class="w3-sidebar hfull" style="width: 15%">
    <?php
    $session = new Session();
    $session->buscaDados($pdo);
    $path = "../../include/".$session->getPanel()."/menu.php";
    include $path;
    ?>
</nav>
<div class="bgcMenu h40 pt10" style="margin-left: 15%">
    <div class="hfull">
        <div class="fs087e">
            <nav class="w3-text-gray">
                <a href="#" class="p10 w3-hover-text-white menusup"><i class="fa fa-gears mr10"></i> Meus Dados</a>
                <a href="#" class="p10 w3-hover-text-white menusup" style="margin-left: -8px;"><i class="fa fa-sign-out mr10"></i> Sair do Sistema</a>
            </nav>
        </div>
    </div>
</div>
<div class="bgcC1 h40 pt10 pl20" style="margin-left: 15%">
    <p class="fs087e w3-text-gray "><a href="../admin.php" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home ></a><a href="../fornecedor" class="w3-hover-text-dark-gray ml10">Fornecedor ></a><a
            href="dados.php" class="w3-hover-text-dark-gray ml10"> Dados ></a></p>
</div>
<div class="w3-container" style="margin-left: 15%;">
    <div class="w3-card mt35">
        <header class="w3-gray fs095e w3-text-gray">
            <i class="fa fa-industry p10" style="border-right-style: groove; border-right-color: gray"></i> Dados do Fornecedor
        </header>
        <div class="p10">
            <div class="p8 w3-pale-blue mb15 bradius" id="msg">
                <p class="fs076e w3-text-blue">Todos os campos com (*) são obrigatórios!</p>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="w3-pale-red mb05 bradius" id="cnpjErro" style="display: none; padding: 3px;">
                    <span class="fs076e w3-text-red w3-right cp" onclick="document.getElementById('cnpjErro').style.display='none'">&times;</span>
                    <p class="fs076e w3-text-red">CNPJ Inválido!!</p>
                </div>
                <input type="text" hidden="hidden" value="<?php echo $idEndereco;?>" name="endereco">
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">CNPJ *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="cnpj_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 cnpj fs087e" style="border-radius: 0 6px 6px 0;" onblur="cnpj(this);" <?php echo $rdo;?> placeholder="CNPJ" value="<?php echo $cnpj_forn;?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Razão Social *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="raz_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Razão Social" value="<?php echo $raz_forn;?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Nome Fantasia *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="fant_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Nome Fantasia" value="<?php echo $raz_forn;?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Inscrição Estadual*</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="ie_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 ie fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Inscrição Estadual" value="<?php echo $ie_forn;?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Rua *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="rua_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="70" placeholder="Rua" value="<?php echo $rua_forn;?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Número *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="num_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeypress="return onlynumber(event)" style="border-radius: 0 6px 6px 0;" placeholder="Número" value="<?php echo $num_forn;?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Bairro *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="bairro_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="25" placeholder="Bairro" value="<?php echo $bairro_forn;?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Cidade *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="cid_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="25" placeholder="Cidade" value="<?php echo $cid_forn;?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Estado *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="est_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="2" placeholder="Estado" value="<?php echo $est_forn;?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">CEP *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="cep_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e cep" style="border-radius: 0 6px 6px 0;" placeholder="CEP" value="<?php echo $cep_forn;?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Telefone *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="tel_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 tel fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Telefone" value="<?php echo $tel_forn;?>" required="required">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Email *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="email" name="email_forn" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Email" value="<?php echo $email_forn;?>" required="required">
                    </div>
                </div>
                <button name="adicionar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $add;?>><i class="fa fa-save"></i> Adicionar</button>
                <button name="salvar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $edt;?>><i class="fa fa-save"></i> Salvar</button>
                <button class="w3-btn w3-deep-orange w3-center fs087e bradius" type="reset" <?php echo $add;?>><i class="fa fa-eraser"></i> Limpar</button>
                <a class="w3-btn w3-blue-gray w3-center fs087e bradius" href="../fornecedor"><i class="fa fa-close"></i> Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>