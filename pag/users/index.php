<?php
    require '../../util/config.php';
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

    <title>BMS - Administrador</title>
</head>
<body>
<nav class="w3-sidebar hfull" style="width: 15%">
    <?php
        $path = "../../include/admin/menu.php";
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
        <p class="fs087e w3-text-gray "><a href="../../_admin/index.php" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home > </a><a href="" class="w3-hover-text-dark-gray ml10">Usuários ></a></p>
    </div>
    <div class="w3-container" style="margin-left: 15%;">
        <button class="w3-btn w3-green mt50 w3-center fs087e" onclick="window.location='dados.php'"><i class="fa fa-plus"></i>Adicionar Usuário
        </button>
        <div class="w3-card mt20">
            <header class="w3-gray w3-text-gray">
                <i class="fa fa-user p10" style="border-right-style: groove; border-right-color: gray"></i> Usuários
                <form action="" method="post" class="w3-right pl10 pr10 " style="border-left-style: groove; border-left-color: gray; height: 35px">
                    <div class="w3-row">
                        <div class="w3-col" style="width: 200px;">
                            <input name="buscar" type="text" class="w3-input w3-gray w3-border w3-hover-border-blue h30 mt03 w3-text-gray" style="border-radius: 6px 0 0 6px" placeholder="Buscar">
                        </div>
                        <div class="w3-rest w3-text-white">
                            <button name="buscar" type="submit" class="mt03 h30 w3-btn w3-gray w3-border w3-text-gray" style="border-radius: 0 6px 6px 0;"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </header>
            <div class=" pb05">
                <form action="" method="post" id="frm1">
                    <table class="w3-table w3-striped">
                        <thead class="bgcTH fs095e">
                            <th class="w3-border w3-border-gray w3-center" style="width: 5%">#</th>
                            <th class="w3-border w3-border-gray" style="width: 25%">Nome</th>
                            <th class="w3-border w3-border-gray" style="width: 15%">Telefone</th>
                            <th class="w3-border w3-border-gray" style="width: 25%">Email</th>
                            <th class="w3-border w3-border-gray" style="width: 15%">Função</th>
                            <th class="w3-border w3-border-gray" style="width: 15%"></th>
                        </thead>
                    </table>
                    <div id="modal" class="w3-modal">
                        <div class="w3-modal-content w3-animate-top w3-center">
                            <header class="w3-container w3-blue-gray">
                                <span onclick="document.getElementById('modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                <h2>Excluir Usuário</h2>
                            </header>
                            <div class="w3-container">
                                <p class="w3-center fs11e">Deseja realmente excluir este usuário?</p>
                                <a class="w3-btn w3-teal mt15 w150 mb15" onclick="document.getElementById('frm1').submit();" name="excluir">Sim</a>
                                <a class="w3-btn w3-red mt15 w150 mb15" onclick="document.getElementById('modal').style.display='none'">Não</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>
</html>