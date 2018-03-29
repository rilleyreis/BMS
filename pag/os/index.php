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
    <p class="fs087e w3-text-gray "><a href="../admin.php" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home > </a><a href="" class="w3-hover-text-dark-gray ml10">OS ></a></p>
</div>
<div class="w3-container" style="margin-left: 15%;">
    <button class="w3-btn w3-green mt50 w3-center fs087e" onclick="window.location='dados.php'"><i class="fa fa-plus"></i> Adicionar OS
    </button>
    <div class="w3-card mt20">
        <header class="w3-gray w3-text-gray">
            <i class="fa fa-file-text p10 tac" style="border-right-style: groove; border-right-color: gray; width: 3%"></i> Ordem de Serivço
            <form action="" method="post" class="w3-right pl10 pr10 " style="border-left-style: groove; border-left-color: gray; height: 35px">
                <div class="w3-row">
                    <div class="w3-col" style="width: 200px;">
                        <input name="buscar" type="text" class="w3-input w3-gray w3-border w3-hover-border-blue h30 mt03 w3-text-gray" style="border-radius: 6px 0 0 6px" placeholder="Buscar">
                    </div>
                    <div class="w3-rest w3-text-white">
                        <button name="buscar" type="submit" class="mt03 h30 w3-btn w3-gray w3-border w3-text-gray" style="border-radius: 0 6px 6px 0 "><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </header>
        <div class=" pb05">
            <form action="" method="post" id="frm1">
                <table class="w3-table w3-striped">
                    <thead class="bgcTH fs095e">
                    <th class="w3-border w3-border-gray w3-center" style="width: 10%">Protocolo</th>
                    <th class="w3-border w3-border-gray" style="width: 20%">Cliente</th>
                    <th class="w3-border w3-border-gray" style="width: 10%">Data Inicial</th>
                    <th class="w3-border w3-border-gray" style="width: 10%">Data Final</th>
                    <th class="w3-border w3-border-gray" style="width: 12%">Status</th>
                    <th class="w3-border w3-border-gray" style="width: 20%">Responsável</th>
                    <th class="w3-border w3-border-gray" style="width: 18%"></th>
                    </thead>
                </table>
            </form>
        </div>
    </div>

</div>
</body>
</html>