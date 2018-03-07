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
    <script type="text/javascript" src="../../app/js/jquery.maskMoney.js"></script>
    <script type="text/javascript" src="../../app/js/masks.js"></script>
    <script type="text/javascript" src="../../app/js/validacao.js"></script>
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
    </script>

    <title>BMS - Administrador</title>
</head>
<body>
<?php include '../../php/control/cliente/cli_dados.php';?>
    <nav class="w3-sidebar hfull" style="width: 15%">
        <?php include '../../include/admin/menu.php';?>
    </nav>
    <div class="bgcMenu h40 pt10" style="margin-left: 15%">
        <div class="hfull">
            <div class="fs087e">
                <nav class="w3-text-gray">
                    <a href="#" class="p10 w3-hover-text-white" style="border-style: none groove none groove; border-color: #00001F;"><i class="fa fa-gears mr10"></i> Meus Dados</a>
                    <a href="#" class="p10 w3-hover-text-white" style="margin-left: -8px; border-style: none groove none groove; border-color: #00001F"><i class="fa fa-sign-out mr10"></i> Sair do Sistema</a>
                </nav>
            </div>
        </div>
    </div>
    <div class="bgcC1 h40 pt10 pl20" style="margin-left: 15%">
        <p class="fs087e w3-text-gray "><a href="../admin.php" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home ></a><a href="../cliente" class="w3-hover-text-dark-gray ml10">Clientes ></a><a
                href="dados.php" class="w3-hover-text-dark-gray ml10"> Dados ></a></p>
    </div>
    <div class="w3-container" style="margin-left: 15%;">
        <div class="w3-card mt35">
            <header class="w3-gray fs087e w3-text-gray">
                <i class="fa fa-user p8" style="border-right-style: groove; border-right-color: gray"></i> Dados do Cliente
            </header>
            <div class="p10">
                <div class="p8 w3-pale-blue mb15" id="msg">
                    <p class="fs076e w3-text-blue">Todos os campos com (*) são obrigatórios!</p>
                </div>
                <form action="" method="post">
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Nome *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="nomeCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e letra" style="border-radius: 0 6px 6px 0;" maxlength="11" placeholder="Primeiro Nome" value="<?php echo $nome;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Sobrenome *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="snomeCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Sobrenome" value="<?php echo $snome;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">CPF *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="cpfCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 cpf fs087e" style="border-radius: 0 6px 6px 0;" onblur="cpf(this);" placeholder="CPF" value="<?php echo $cpf;?>" required>
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
                            <label for="" class="fs087e w3-text-white" style="">Celular</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="celularCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 cel fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Celular" value="<?php echo $cel;?>">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Email *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="email" name="emailCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Email" value="<?php echo $email;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Rua *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="ruaCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Rua" value="<?php echo $rua;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Número *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="numeroCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Numero" value="<?php echo $num;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Bairro *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="bairroCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Bairro" value="<?php echo $bairro;?>" required>
                        </div>
                    </div>
                    <button name="adicionar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $add;?>><i class="fa fa-save mr03"></i> Adicionar</button>
                    <button name="salvar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $edt;?>><i class="fa fa-save mr03"></i> Salvar</button>
                    <button class="w3-btn w3-blue-gray w3-center fs087e bradius" type="reset" <?php echo $add;?>><i class="fa fa-eraser mr03"></i> Limpar</button>
                    <a class="w3-btn w3-deep-orange w3-center fs087e bradius" href="../cliente"><i class="fa fa-close mr03"></i> Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>