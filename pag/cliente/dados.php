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
    function cpf(object) {
        var stringCPF = object.value.replace(/[\.-]/g, "");
        var valido = validarCPF(stringCPF);
        if(valido){
            document.getElementById('cpfErro').style.display = 'none';
        }else{
            object.value = "";
            document.getElementById('cpfErro').style.display = 'block';
        }
    }

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

    function cliente(object) {
        var tipo = object.value;
        if(tipo == "pf"){
            document.getElementById('pf').style.display = "block";
            document.getElementById('pj').style.display = "none";
            document.getElementById('nome').setAttribute('required', 'required');
            document.getElementById('snome').setAttribute('required', 'required');
            document.getElementById('cpf').setAttribute('required', 'required');
            document.getElementById('cnpj').removeAttribute('required');
            document.getElementById('razsoc').removeAttribute('required');
            document.getElementById('fant').removeAttribute('required');
        }else{
            document.getElementById('pf').style.display = "none";
            document.getElementById('pj').style.display = "block";
            document.getElementById('cnpj').setAttribute('required', 'required');
            document.getElementById('razsoc').setAttribute('required', 'required');
            document.getElementById('fant').setAttribute('required', 'required');
            document.getElementById('nome').removeAttribute('required');
            document.getElementById('snome').removeAttribute('required');
            document.getElementById('cpf').removeAttribute('required');
        }
    }
</script>

<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php include '../../php/control/cliente/cli_dados.php'?>

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
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="w3-col p8" style="width: 65%;">
                        Clientes
                    </div>
                </div>
            </header>
            <div class="w3-row p15">
                <div class="w3-col w3-border w3-border-gray w3-gray p8" style="width: 145px; border-radius: 6px 0 0 6px;">
                    <label for="" class="fs087e w3-text-white pf dbl" style="">Tipo de Cliente</label>
                </div>
                <div class="w3-rest">
                    <select name="status" id="" class="w3-input-25 w3-border w3-border-gray w3-hover-border-blue fs087e" style="border-radius: 0 6px 6px 0;" onchange="cliente(this);">
                        <option value="pf" <?php echo $tipo == "pj" ? "disabled" : ""?>>PESSOA FÍSICA</option>
                        <option value="pj" <?php echo $tipo == "pf" ? "disabled" : ""?>>PESSOA JURíDICA</option>
                    </select>
                </div>
            </div>

            <div class="p10">
                <div class="p8 w3-pale-blue mb15" id="msg">
                    <p class="fs076e w3-text-blue">Todos os campos com (*) são obrigatórios!</p>
                </div>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <div id="pf" <?php echo $pf;?>>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px">
                                <label for="" class="fs087e w3-text-white" style="">Nome *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" id="nome" name="nomeCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e letra" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this)" maxlength="11" placeholder="Primeiro Nome" value="<?php echo $nome;?>" <?php echo $pfreq;?>>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px">
                                <label for="" class="fs087e w3-text-white" style="">Sobrenome *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" id="snome" name="snomeCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this)" maxlength="50" placeholder="Sobrenome" value="<?php echo $snome;?>" <?php echo $pfreq;?>>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px">
                                <label for="" class="fs087e w3-text-white" style="">CPF *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" id="cpf" name="cpfCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 cpf fs087e" style="border-radius: 0 6px 6px 0;" onblur="cpf(this);" placeholder="CPF" value="<?php echo $cpf;?>" <?php echo $pfreq;?>>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Celular</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" name="celularCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 cel fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Celular" value="<?php echo $cel;?>">
                            </div>
                        </div>
                    </div>
                    <div id="pj" <?php echo $pj;?>>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">CNPJ *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" id="cnpj" name="cnpj" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 cnpj fs087e" style="border-radius: 0 6px 6px 0;" onblur="cnpj(this);" placeholder="CNPJ" value="<?php echo $cnpj?>" <?php echo $pjreq;?>>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Razão Social *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" id="razsoc" name="razsoc" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Razão Social" value="<?php echo $razsoc?>" <?php echo $pjreq;?>>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Nome Fantasia *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" id="fant" name="fant" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Nome Fantasia" value="<?php echo $fant?>" <?php echo $pjreq;?>>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Inscrição Estadual*</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" name="ie" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 ie fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Inscrição Estadual" value="<?php echo $ie?>">
                            </div>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="nomeUsuario" class="fs087e w3-text-white" style="">Telefone</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="telefoneCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 tel fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Telefone" value="<?php echo $tel;?>">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Email *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="email" name="emailCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this)" maxlength="50" placeholder="Email" value="<?php echo $email;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Rua *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="ruaCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this)" maxlength="50" placeholder="Rua" value="<?php echo $rua;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Número *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="numeroCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeyup="return onlynumber(event);" placeholder="Numero" value="<?php echo $num;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Bairro *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="bairroCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this)" maxlength="50" placeholder="Bairro" value="<?php echo $bairro;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Cidade *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="cidade" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="25" placeholder="Cidade" value="<?php echo $cidade?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Estado *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="uf" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="2" placeholder="Estado" value="<?php echo $uf?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">CEP *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="cep" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e cep" style="border-radius: 0 6px 6px 0;" placeholder="CEP" value="<?php echo $cep?>" required="required">
                        </div>
                    </div>
                    <button name="adicionar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $add;?>><i class="fas fa-save mr03"></i> Adicionar</button>
                    <button name="editar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $edt;?>><i class="fas fa-save mr03"></i> Salvar</button>
                    <button class="w3-btn w3-blue-gray w3-center fs087e bradius" type="reset" <?php echo $add;?>><i class="fas fa-eraser mr03"></i> Limpar</button>
                    <a class="w3-btn w3-deep-orange w3-center fs087e bradius" href="../cliente"><i class="fas fa-times mr03"></i> Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>