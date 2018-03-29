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
    <p class="fs087e w3-text-gray "><a href="../admin.php" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home ></a><a href="../service" class="w3-hover-text-dark-gray ml10">Servicos ></a><a
            href="dados.php" class="w3-hover-text-dark-gray ml10"> Dados ></a></p>
</div>
<div class="w3-container" style="margin-left: 15%;">
    <div class="w3-card mt35">
        <header class="w3-gray fs095e w3-text-gray">
            <i class="fa fa-wrench p10" style="border-right-style: groove; border-right-color: gray"></i> Dados do Servico
        </header>
        <div class="p10">
            <div class="p8 w3-pale-blue mb15" id="msg">
                <p class="fs076e w3-text-blue">Todos os campos com (*) são obrigatórios!</p>
            </div>
            <form action="" method="post">
                <input type="text" name="id_serv" hidden="hidden" value="">
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Nome *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="nome_serv" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e letra" style="border-radius: 0 6px 6px 0;" maxlength="20" placeholder="Nome" value="" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Descrição *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="desc_serv" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Descrição" value="" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Técnico *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="tec_serv" id="tecnico" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Técnico" value="" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Preço *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="preco_serv" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 money fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Preço" value="" required>
                    </div>
                </div>
                <button name="adicionar" class="w3-btn w3-green w3-center fs087e bradius" type="submit"><i class="fa fa-save"></i> Adicionar</button>
                <button name="salvar" class="w3-btn w3-green w3-center fs087e bradius" type="submit"><i class="fa fa-save"></i> Salvar</button>
                <button class="w3-btn w3-blue-gray w3-center fs087e bradius" type="reset" ><i class="fa fa-eraser"></i> Limpar</button>
                <a class="w3-btn w3-deep-orange w3-center fs087e bradius" href="../service"><i class="fa fa-close"></i> Cancelar</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>