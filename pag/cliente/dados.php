<?php
session_start();
require '../../util/config.php';
?>
<!DOCTYPE html>
<html>
<?php include '../../include/headDados.php';?>
<body class="w3-light-grey">
<?php include '../../php/control/cliente/cli_dados.php'?>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu" style="z-index:4; padding: 1.5px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <a onclick="openMenu(3)" class="cp fs10e"><span class="w3-bar-item w3-text-white w3-right">Bem-Vindo, <strong><?php echo $_SESSION['nomeUser'];?></strong> <i class="fa fa-caret-down"></i></span></a>
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
            <div class="p10">
                <div class="p8 w3-pale-blue mb15" id="msg">
                    <p class="fs076e w3-text-blue">Todos os campos com (*) são obrigatórios!</p>
                </div>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="idEnd" value="<?php echo $idEnd;?>">
                    <div class="w3-row">
                        <div class="p8 w3-pale-red mb15 dnn" id="msgErro">
                            <p class="fs076e w3-text-red">CPF/CNPJ incorreto <span class="ml15" onclick="document.getElementById('msgErro').style.display='none'"><i class="fas fa-times"></i></i></span></p>
                        </div>
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px">
                            <label for="" class="fs087e w3-text-white" style="">CPF/CNPJ *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" id="cpf_cnpj" name="cpfcnpj" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onfocus="unmask();" onblur="cliente(this);" onkeypress="mascara(this)" placeholder="CPF/CNPJ" value="<?php echo $cpfcnpj;?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px">
                            <label for="" id="nome" class="fs087e w3-text-white" style="">Nome *</label>
                            <label for="" id="fant" class="fs087e w3-text-white dnn" style="">Nome Fantasia *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" id="nome" name="nome" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e letra" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this)" placeholder="" value="<?php echo $nome;?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px">
                            <label for="" id="snome" class="fs087e w3-text-white" style="">Sobrenome *</label>
                            <label for="" id="raz" class="fs087e w3-text-white dnn" style="">Razão Social *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" id="snome" name="snome" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this)" placeholder="" value="<?php echo $snome;?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" id="rg" class="fs087e w3-text-white" style="">RG</label>
                            <label for="" id="ie" class="fs087e w3-text-white dnn" style="">IE</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="rgie" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" placeholder="" value="<?php echo $rgie;?>">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="nomeUsuario" class="fs087e w3-text-white" style="">Telefone</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="telefone" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 tel fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Telefone" value="<?php echo $tel;?>">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Email *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="email" name="email" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this)" maxlength="50" placeholder="Email" value="<?php echo $email;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">CEP *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" id="cep" name="cep" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" placeholder="CEP" value="<?php echo $cep?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Rua *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" id="rua" name="ruaCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this)" maxlength="50" placeholder="Rua" value="<?php echo $rua;?>" required>
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
                            <input type="text" id="bairro" name="bairroCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this)" maxlength="50" placeholder="Bairro" value="<?php echo $bairro;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Cidade *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" id="cidade" name="cidade" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="25" placeholder="Cidade" value="<?php echo $cidade?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Estado *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" id="uf" name="uf" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="2" placeholder="Estado" value="<?php echo $uf?>" required="required">
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