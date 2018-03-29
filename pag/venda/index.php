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
    <p class="fs087e w3-text-gray "><a href="../admin.php" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home > </a><a href="" class="w3-hover-text-dark-gray ml10">Venda ></a></p>
</div>
<div class="w3-container" style="margin-left: 15%;">
    <div class="w3-right w3-green h80 w200 mt25 mr50 tac pt10 bradius w3-card">
        <div class="dbl w3-text-white fs095e">
            Valor em Caixa
        </div>
        <div class="dbl w3-text-white fs20e">
            R$ 00,00
        </div>
    </div>
    <button class="w3-btn w3-green mt50 w3-center fs087e" onclick="window.location='pdv.php'"><i class="fa fa-plus mr05"></i> Realizar Venda
    </button>
    <div class="w3-card mt50">
        <header class="w3-gray w3-text-gray">
            <i class="fa fa-user p10 tac" style="border-right-style: groove; border-right-color: gray; width: 3%"></i> Movimentação
        </header>
        <div class=" pb05">
            <table class="w3-table w3-striped">
                <thead class="bgcTH fs095e">
                <th class="w3-border w3-border-gray" style="width: 25%">Nome</th>
                <th class="w3-border w3-border-gray" style="width: 18%">CPF</th>
                <th class="w3-border w3-border-gray" style="width: 18%">Telefone</th>
                <th class="w3-border w3-border-gray" style="width: 25%">Email</th>
                <th class="w3-border w3-border-gray" style="width: 14%"></th>
                </thead>
            </table>
        </div>
    </div>
</div>
</body>
</html>