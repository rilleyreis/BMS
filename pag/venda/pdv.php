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

    <script type="text/javascript" src="../../app/js/format.js"></script>

    <title>BMS - Administrador</title>
</head>
<body>
<nav class="w3-sidebar hfull" style="width: 15%">
    <?php include '../../include/admin/menu.php';?>
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
    <p class="fs087e w3-text-gray "><a href="../admin.php" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home > </a><a href="index.php" class="w3-hover-text-dark-gray ml10">Vendas ></a><a href="index.php" class="w3-hover-text-dark-gray ml10"> Nova Venda ></a></p>
</div>
<div class="h450 wfull p15" style="margin-left: 15%">
    <div class="fright w650" style="margin-right: 200px">
        <header class="w3-gray w3-text-gray">
            <i class="fa fa-barcode p10 tac" style="border-right-style: groove; border-right-color: gray;"></i> Itens Selecionados
        </header>
        <div class="h450 w3-border w3-border-gray p10">
            Tabela com os produtos
        </div>
    </div>
    <div class="dib w450 w3-left">
        <header class="w3-gray w3-text-gray">
            <i class="fa fa-barcode p10 tac" style="border-right-style: groove; border-right-color: gray;"></i> Adicionar Produto
        </header>
        <div class="p10 w3-border w3-border-gray">
            <form action="" class="dib wfull">
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Produto</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="produto" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Produto" value="" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Quantidade</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="qtd" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeypress="return onlynumber(event);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Quantidade" value="" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Valor Unt</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="valorUnt" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Valor Unitário" value="" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Valor Total</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="valorTtl" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Valor Total" value="" required>
                    </div>
                </div>
                <button name="adicionar" class="w3-btn w3-green w3-center fs087e bradius mt10" type="submit"><i class="fa fa-plus"></i> Adicionar</button>
            </form>
        </div>
    </div>
    <div class="dib w450 w3-left" style="margin-top: 13px">
        <header class="w3-gray w3-text-gray">
            <i class="fa fa-barcode p10 tac" style="border-right-style: groove; border-right-color: gray;"></i> Dados Compra
        </header>
        <div class="p10 w3-border w3-border-gray">
            <div class="w3-row">
                <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                    <label for="" class="fs087e w3-text-white" style="">Total Itens</label>
                </div>
                <div class="w3-rest">
                    <input type="text" name="qtdItens" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeypress="return onlynumber(event);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Quantidade Itens" value="" required>
                </div>
            </div>
            <div class="w3-row">
                <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                    <label for="" class="fs087e w3-text-white" style="">Desconto %</label>
                </div>
                <div class="w3-rest">
                    <input type="text" name="desconto" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeypress="return onlynumber(event);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Desconto %" value="" required>
                </div>
            </div>
            <div class="w3-row">
                <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                    <label for="" class="fs087e w3-text-white" style="">Total</label>
                </div>
                <div class="w3-rest">
                    <input type="text" name="total" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeypress="return onlynumber(event);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Valor Total" value="" required>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>