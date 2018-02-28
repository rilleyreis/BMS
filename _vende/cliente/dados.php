<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Rilley Reis">

    <link rel="stylesheet" href="../../_css/style.css">
    <link rel="stylesheet" href="../../_css/font-awesome.css">
    <link rel="stylesheet" href="../../_css/w3.css">

    <script type="text/javascript" src="../../_js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="../../_js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="../../_js/jquery.maskMoney.js"></script>
    <script type="text/javascript" src="../../_js/masks.js"></script>
    <script type="text/javascript" src="../../_js/validacao.js"></script>
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
<?php include 'cli_dados.php';?>
    <nav class="w3-sidebar hfull" style="width: 15%">
        <?php include '../menu.php';?>
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
        <p class="fs087e w3-text-gray "><a href="../../_vende" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home ></a><a href="../cliente" class="w3-hover-text-dark-gray ml10">Clientes ></a><a
                href="dados.php" class="w3-hover-text-dark-gray ml10"> Dados ></a></p>
    </div>
    <div class="w3-container" style="margin-left: 15%;">
        <div class="w3-card mt35">
            <header class="w3-gray fs095e w3-text-gray">
                <i class="fa fa-user p10" style="border-right-style: groove; border-right-color: gray"></i> Dados do Cliente
            </header>
            <div class="p10">
                <form action="" method="post">
                    <input type="text" name="nomeCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10" placeholder="Nome Completo" value="<?php echo $nome;?>" required>
                    <p class="w3-text-red fs065e dnn" id="cpfErro">CPF Inválido</p>
                    <input type="text" name="cpfCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 cpf" onblur="cpf(this);" placeholder="CPF" value="<?php echo $cpf;?>" required>
                    <input type="text" name="telefoneCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 tel" placeholder="Telefone" value="<?php echo $tel;?>" required>
                    <input type="text" name="celularCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 cel" placeholder="Celular" value="<?php echo $cel;?>" required>
                    <input type="email" name="emailCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10" placeholder="Email" value="<?php echo $email;?>" required>
                    <input type="text" name="ruaCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10" placeholder="Rua" value="<?php echo $rua;?>" required>
                    <input type="text" name="numeroCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 num" placeholder="Numero" value="<?php echo $num;?>" required>
                    <input type="text" name="bairroCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10" placeholder="Bairro" value="<?php echo $bairro;?>" required>
                    <button name="adicionar" class="w3-btn w3-green w3-center fs087e" type="submit" <?php echo $add;?>>Adicionar</button>
                    <button name="salvar" class="w3-btn w3-green w3-center fs087e" type="submit" <?php echo $edt;?>>Salvar</button>
                    <button class="w3-btn w3-deep-orange w3-center fs087e" type="reset" <?php echo $add;?>>Limpar</button>
                    <a class="w3-btn w3-blue-gray w3-center fs087e" href="../cliente">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>