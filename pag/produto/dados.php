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
    <link rel="stylesheet" href="../../app/css/jquery-ui.css">

    <script type="text/javascript" src="../../app/js/jquery-1.12.4.js"></script>
    <script type='text/javascript' src="../../app/js/jquery-ui.js"></script>
    <script type="text/javascript" src="../../app/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="../../app/js/jquery.maskMoney.js"></script>
    <script type="text/javascript" src="../../app/js/masks.js"></script>
    <script type="text/javascript" src="../../app/js/format.js"></script>

    <script>
        $(function () {
            $.getJSON("../../php/control/produto/forn_prod.php", function (dados) {
                var fornece = [];
                $(dados).each(function (key, value) {
                    fornece.push(value.cnpj_emp + "|" + value.fant_emp);
                });
                $("#forn_prod").autocomplete({
                    source: fornece
                });
            });
        });
    </script>

    <title>BMS - Administrador</title>
</head>
<body>
<?php include '../../php/control/produto/prod_dados.php';?>
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
                <a href="#" class="p10 w3-hover-text-white menusup" style="margin-left: -8px;"><i class="fa fa-sign-out mr10"></i>Sair do Sistema</a>
            </nav>
        </div>
    </div>
</div>
<div class="bgcC1 h40 pt10 pl20" style="margin-left: 15%">
    <p class="fs087e w3-text-gray "><a href="../admin.php" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home ></a><a href="../produto" class="w3-hover-text-dark-gray ml10">Produtos ></a><a
            href="dados.php" class="w3-hover-text-dark-gray ml10"> Dados ></a></p>
</div>
<div class="w3-container" style="margin-left: 15%;">
    <div class="w3-card mt35">
        <header class="w3-gray fs095e w3-text-gray">
            <i class="fa fa-barcode p10" style="border-right-style: groove; border-right-color: gray"></i> Dados do Produto
        </header>
        <div class="p10">
            <div class="p8 w3-pale-blue mb15" id="msg">
                <p class="fs076e w3-text-blue">Todos os campos com (*) são obrigatórios!</p>
            </div>
            <form action="" method="post">
                <input type="text" name="id_prod" hidden="hidden" value="<?php echo $id;?>">
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Nome *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="nome_prod" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Nome" value="<?php echo $nome;?>" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Descrição *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="desc_prod" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Descrição" value="<?php echo $desc;?>" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Fornecedor *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="forn_prod" id="forn_prod" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="20" placeholder="Fornecedor" value="<?php echo $forn;?>" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Valor de Compra *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="compra_prod" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 money fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Valor de Compra" value="<?php echo $compra;?>" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Valor de Venda *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="venda_prod" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 money fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Valor de Venda" value="<?php echo $venda;?>" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Quantidade *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="qtd_prod" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeypress="return onlynumber(event)" maxlength="4" style="border-radius: 0 6px 6px 0;" placeholder="Quantidade em Estoque" value="<?php echo $estoque;?>" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Estoque Mínimo *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="min_prod" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeypress="return onlynumber(event)" maxlength="4" style="border-radius: 0 6px 6px 0;" placeholder="Estoque Mínimo" value="<?php echo $minimo;?>" required>
                    </div>
                </div>



                <button name="adicionar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $add;?>><i class="fa fa-save"></i> Adicionar</button>
                <button name="salvar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $edt;?>><i class="fa fa-save"></i> Salvar</button>
                <button class="w3-btn w3-deep-orange w3-center fs087e bradius" type="reset" <?php echo $add;?>><i class="fa fa-eraser"></i> Limpar</button>
                <a class="w3-btn w3-blue-gray w3-center fs087e bradius" href="../produto"><i class="fa fa-close"></i> Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>