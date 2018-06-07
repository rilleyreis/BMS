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
<!--<link rel="stylesheet" href="../../app/css/fa-svg-with-js.css">-->
<!--<link rel="stylesheet" href="../../app/css/font-awesome.css">-->
<link rel="stylesheet" href="../../app/css/print.css">

<script defer src="../../app/js/fontawesome-all.min.js"></script>
<script type="text/javascript" src="../../app/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="../../app/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="../../app/js/jquery.maskMoney.js"></script>
<script type="text/javascript" src="../../app/js/masks.js"></script>

<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php include '../../php/control/venda/venda_view.php'?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu no-print" style="z-index:4; padding: 3px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right fwb w3-text-white">Business Manager System</span>
</div>


<!-- Sidebar/menu -->
<?php include '../../include/'.$_SESSION['panelUser'].'/menu.php'?>

<div class="w3-main p15" style="margin-left: 300px; margin-top: 43px;">
    <div class="w3-border w3-border-gray print p5 fs087e">
        <?php foreach ($dadosEmp as $item) {?>
            <h3 class="titulo fwb w3-center"><?php echo $item['nome'];?></h3>
            <div class="w3-center bbtsc1 pb03">
                <p class="texto"><?php echo "CNPJ ".$item['cpf_cnpj'];?></p>
                <p class="texto"><?php echo "TELEFONE: ".$item['tel']." --- EMAIL: ".$item['email'];?></p>
            </div>
            <?php }?>
        <table class="w3-table w3-striped w3-bordered w3-border mt05 w3-grey">
            <tr>
                <td class="texto w3-border-right" style="width: 45%">CUPOM NÃO FISCAL</td>
                <td class="texto w3-border-right" style="width: 15%"><?php echo str_pad($idVenda, 5, "0", STR_PAD_LEFT);;?></td>
                <td class="texto" style="width: 30%">DATA: <?php echo date('d / m / Y');?></td>
            </tr>
        </table>
        <h6 class="texto">DADOS CLIENTE</h6>
        <table class="w3-table w3-striped w3-bordered w3-border w3-border-black mt05">
            <tr class="w3-border-black">
                <td class="texto">NOME: <?php echo $nomeCli;?></td>
                <td></td>
                <td class="texto">TELEFONE: <?php echo $telCli;?></td>
            </tr>
            <tr class="w3-border-black">
                <td class="texto">ENDEREÇO: <?php echo $endereco;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="w3-border-black">
                <td class="texto">CIDADE: <?php echo $cidade;?></td>
                <td class="texto">UF: <?php echo $uf;?></td>
                <td class="texto">CEP: <?php echo $cep;?></td>
            </tr>
            <tr class="w3-border-black">
                <td class="texto">CPF/CNPJ: <?php echo $cpfCnpjCli;?></td>
                <td></td>
                <td></td>
            </tr>
            <tr class="w3-border-black">
                <td class="texto">EMIAL: <?php echo $emailCli;?></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <br>

        <table class="w3-table w3-striped w3-bordered w3-border w3-border-black mt05 w3-white">
            <thead class="w3-gray">
                <th class="w3-border-black">PRODUTO</th>
                <th class="w3-border-black">QTDE</th>
                <th class="w3-border-black">VLR UNIT</th>
                <th class="w3-border-black">TOTAL</th>
            </thead>
            <tbody>
            <?php foreach ($itensVendidos as $item) {?>
                <tr class="w3-border-black">
                    <td class="texto"><?php echo $item['produto'];?></td>
                    <td class="texto"><?php echo $item['qtd'];?></td>
                    <td class="texto"><?php echo "R$ ".$item['unit'];?></td>
                    <td class="texto"><?php echo "R$ ".$item['total'];?></td>
                </tr>
            <?php $vendaTotal += $item['total'];}?>
            <tr class="w3-border-black w3-gray fwb">
                <td class="texto"></td>
                <td class="texto"></td>
                <td class="texto">TOTAL</td>
                <td class="texto"><?php echo "R$ ".$vendaTotal;?></td>
            </tr>
            </tbody>
        </table>
    <button id="print" class="w3-btn w3-blue-gray w3-round mt10 no-print"><i class="fas fa-print"></i> Imprimir</button>
</div>




<?php
if (isset($_GET['print'])){
    echo "<script>window.print(document);</script>";
}
?>
<script>
    $('#print').click(function () {
        window.print(document);
    });
</script>

</body>
</html>