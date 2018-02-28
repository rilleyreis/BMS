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

    <title>BMS - Administrador</title>
</head>
<body>
<nav class="w3-sidebar hfull" style="width: 15%">
    <?php include '../menu.php';?>
</nav>
<?php include 'ven_index.php';?>
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
    <p class="fs087e w3-text-gray "><a href="../../_admin/index.php" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home > </a><a href="" class="w3-hover-text-dark-gray ml10">Venda ></a></p>
</div>
<div class="w3-container" style="margin-left: 15%;">
    <div class="w3-card mt20">
        <header class="w3-gray w3-text-gray">
            <i class="fa fa-money p10" style="border-right-style: groove; border-right-color: gray"></i> Caixa
        </header>
        <div class="p10">
            <?php if($openCaixa == 0){;?>
                <div class="p8 w3-pale-red mb15">
                    <p class="fs087e fcred">Caixa não foi aberto.</p>
                </div>
                <a onclick="document.getElementById('modal').style.display='block'" class="w3-btn w3-green w3-round" name="open" title="Abrir Caixa"><i class="fa fa-plus"></i> Abrir Caixa</a>

                <div id="modal" class="w3-modal" style="overflow: hidden;">
                    <div class="w3-modal-content w3-animate-top w3-center" style="margin-top: -30px;">
                        <header class="w3-container w3-gray mb05">
                            <span onclick="document.getElementById('modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h4>Abrir Caixa</h4>
                        </header>
                        <div class="w3-container h450" style="overflow: auto;">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="text" name="user_cx" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 cnpj" placeholder="Usuário" value="" required readonly>
                                <input type="text" name="valor_cx" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 money" placeholder="Valor Inicial" value="" required>
                                <input type="text" name="desc_cx" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10" placeholder="Descrição" value="" required>

                                <a class="w3-btn w3-blue-gray w3-center fs095e w3-round w3-left p8 mb15" onclick="document.getElementById('modal').style.display='none'">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>

            <?php }else{?>
<!--                Caso o caixa esteja aberto-->
            <?php }?>
        </div>
    </div>



</div>
</body>
</html>