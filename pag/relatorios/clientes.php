<?php
session_start();
require '../../util/config.php';
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="author" content="Rilley Reis">

<link rel="stylesheet" href="../../app/css/style.css">
<link rel="stylesheet" href="../../app/css/w3.css">
<link rel="stylesheet" href="../../app/css/print.css">

<script defer src="../../app/js/fontawesome-all.min.js"></script>
<script type="text/javascript" src="../../app/js/jquery-1.12.4.js"></script>

<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php include "../../php/control/relatorios/rel_cli.php"?>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu no-print" style="z-index:4; padding: 3px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right fwb w3-text-white">Business Manager System</span>
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Sidebar/menu -->
<?php include '../../include/admin/menu.php'?>

<!-- !PAGE CONTENT! -->
<div class="w3-main pb40 pt40" style="margin-left:300px;margin-top:43px;">

    <div class="p5 print">
        <div class="p5 fs087e print dnn mb10">
            <?php foreach ($dadosEmp as $item) {?>
                <h3 class="titulo fwb w3-center"><?php echo $item['nome'];?></h3>
                <div class="w3-center bbtsc1 pb03">
                    <p class="texto"><?php echo "CNPJ ".$item['cpf_cnpj'];?></p>
                    <p class="texto"><?php echo "TELEFONE: ".$item['tel']." --- EMAIL: ".$item['email'];?></p>
                </div>
            <?php }?>
        </div>
        <div class="print">
            <header class="w3-gray w3-text-gray p8">
                Relatório Movimentação - Vendas / OS
            </header>
            <div class="p5 w3-border w3-border-gray">
                <table class="w3-table w3-striped w3-bordered w3-white">
                    <tr>
                        <th>Cliente</th>
                        <th>Data</th>
                        <th>Valor</th>
                    </tr>
                        <?php
                        $cli = "N";
                        foreach ($dadosRel as $item) {
                            ?>
                            <tr>
                            <?php if($cli != $item['cliente']){ $cli=$item['cliente'];?>
                            <td><?php echo $item['cliente'] == "" ? "CLIENTE NÃO CADASTRADO": $item['cliente']?></td>
                            <?php }else{?>
                            <td></td>
                            <?php }?>
                            <td><?php echo $item['data']?></td>
                            <td><?php echo "R$".number_format($item['valor'], 2, ',','.')?></td>
                            </tr>
                        <?php }?>
                </table>
            </div>
        </div>
    </div>
    <button id="print" class="w3-btn w3-blue-gray w3-round mt10 no-print ml10"><i class="fas fa-print"></i> Imprimir</button>
    <a class="w3-btn w3-red w3-round mt10 no-print" href="../relatorios"><i class="fas fa-arrow-left"></i> Voltar</a>

</div>

<script>
    $('#print').click(function () {
        window.print(document);
    });
</script>


</body>
</html>
