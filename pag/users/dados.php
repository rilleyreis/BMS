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

<script src="../../app/js/jquery-1.12.4.js"></script>
<script src="../../app/js/jquery.maskedinput.js"></script>
<script src="../../app/js/jquery.maskMoney.js"></script>
<script defer src="../../app/js/fontawesome-all.min.js"></script>
<script src="../../app/js/masks.js"></script>
<script src="../../app/js/format.js"></script>

<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php include '../../php/control/users/usr_dados.php';?>

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
<div style="margin-top: 43px">
    <?php include '../../include/'.$_SESSION['panelUser'].'/menu.php'?>
</div>


<div class="w3-main" style="margin-left: 300px; margin-top: 43px; padding: 1px 15px">
    <div class="w3-card mt35">
        <header class="w3-gray fs087e w3-text-gray">
            <div class="w3-row">
                <div class="w3-col tac p8" style="width: 5%; border-right-style: groove; border-right-color: gray;">
                    <i class="fas fa-user"></i>
                </div>
                <div class="w3-rest p8">
                    Usuário
                </div>
            </div>
        </header>
        <div class="p10">
            <div class="p8 w3-pale-blue mb15" id="msg">
                <p class="fs076e w3-text-blue">Todos os campos com (*) são obrigatórios!</p>
                <input type="hidden" value="<?php echo $id;?>" name="idUser">
                <input type="hidden" value="<?php echo $idPF;?>" name="idPF">
            </div>
            <form action="" method="post">
                <div class="w3-pale-red mb05 bradius w3-left wfull" id="cpfErro" style="display: none; padding: 3px;">
                    <p class="fs076e w3-text-red w3-left mr10 ml30">CPF Inválido!!</p>
                    <span class="fs076e w3-text-red w3-left cp" onclick="document.getElementById('cpfErro').style.display='none'">&times;</span>
                </div>
                <input type="text" name="idUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10" value="" style="display: none;">
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="nomeUsuario" class="fs087e w3-text-white" style="">Nome *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="nomeUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="15" onkeypress="return onlyletter(event)" onkeyup="letter(this);" placeholder="Primeiro Nome" value="<?php echo $nome;?>" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="snomeUsuario" class="fs087e w3-text-white mt05">Sobrenome *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="snomeUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="15" onkeypress="return onlyletter(event)" onkeyup="letter(this);" placeholder="Sobrenome" value="<?php echo $snome;?>" required>
                    </div>
                </div>

                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="cpfUsuario" class="fs087e w3-text-white mt05">CPF *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="cpfUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e cpf" onblur="cpf(this);" style="border-radius: 0 6px 6px 0;" placeholder="CPF" value="<?php echo $cpf;?>" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="telefoneUsuario" class="fs087e w3-text-white mt05">Telefone</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="telefoneUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e tel" style="border-radius: 0 6px 6px 0;" placeholder="Telefone" value="<?php echo $tel;?>">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="celularUsuario" class="fs087e w3-text-white mt05">Celular</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="celularUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e cel" style="border-radius: 0 6px 6px 0;" placeholder="Celular" value="<?php echo $cel;?>">
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="emailUsuario" class="fs087e w3-text-white mt05">Email *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="email" name="emailUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" onkeyup="letter(this);" placeholder="Email" value="<?php echo $email;?>" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="funcUsuario" class="fs087e w3-text-white mt05">Função *</label>
                    </div>
                    <div class="w3-rest">
                        <select name="funcUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" required>
                            <option value="" disabled selected>Selecione uma função</option>
                            <option <?php echo $panel == "admin" ? "selected" : "";?> value="admin">ADMINISTRADOR</option>
                            <option <?php echo $panel == "vende" ? "selected" : "";?> value="vende">VENDEDOR</option>
                            <option <?php echo $panel == "tecno" ? "selected" : "";?> value="tecno">TÉCNICO</option>
                        </select>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="userUsuario" class="fs087e w3-text-white">Nome de Usuário *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="userUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="10" placeholder="Nome de Usuário" value="<?php echo $user;?>" required>
                    </div>
                </div>
                <div class="w3-row" <?php echo $add;?>>
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="senhaUsuario" class="fs087e w3-text-white mt05">Senha *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="password" name="senhaUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="16" placeholder="Senha" value="" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="statusUsuario" class="fs087e w3-text-white mt05">Situação *</label>
                    </div>
                    <div class="w3-rest">
                        <select name="status" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" required>
                            <option value="" disabled selected>Selecione um status</option>
                            <option <?php echo $ativo == 1 ? "selected" : "";?> value="1">ATIVADO</option>
                            <option <?php echo $ativo == 0 ? "selected" : "";?> value="0">DESATIVADO</option>
                        </select>
                    </div>
                </div>
                <button name="adicionar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $add;?>><i class="fas fa-save mr03"></i>Adicionar</button>
                <button name="editar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $edt;?>><i class="fas fa-edit mr03"></i>Editar</button>
                <button class="w3-btn w3-blue-gray w3-center fs087e bradius" type="reset" <?php echo $add;?>><i class="fas fa-eraser mr03"></i>Limpar</button>
                <a class="w3-btn w3-deep-orange w3-center fs087e bradius" href="../users"><i class="fas fa-times mr03"></i>Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>