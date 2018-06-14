<?php
session_start();
require '../../util/config.php';
date_default_timezone_set("America/Sao_Paulo");
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
<script type="text/javascript" src="../../app/js/format.js"></script>

<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php include '../../php/control/venda/caixa_fechar.php'?>

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
    <div class="w3-border w3-border-gray print p5">
        <div class="p5 fs087e print dnn mb10">
            <?php foreach ($dadosEmp as $item) {?>
                <h3 class="titulo fwb w3-center"><?php echo $item['nome'];?></h3>
                <div class="w3-center bbtsc1 pb03">
                    <p class="texto"><?php echo "CNPJ ".$item['cpf_cnpj'];?></p>
                    <p class="texto"><?php echo "TELEFONE: ".$item['tel']." --- EMAIL: ".$item['email'];?></p>
                </div>
            <?php }?>
        </div>
        <table class="w3-table w3-striped w3-bordered w3-white">
            <tr>
                <td colspan="4" class="w3-center"><?php echo date('d/m/Y')?></td>
            </tr>
            <tr>
                <td colspan="2" class="w3-center" style="width: 45%">Abertura</td>
                <td colspan="2" class="w3-center" style="width: 45%">Fechamento</td>
            </tr>
            <tr>
                <td class="" style="width: 22%"><?php echo $userA;?></td>
                <td class="" style="width: 22%"><?php echo $horaA;?></td>
                <td class="" style="width: 22%"><?php echo $userF;?></td>
                <td class="" style="width: 22%"><?php echo $horaF;?></td>
            </tr>
        </table>
        <hr>
        <h5>Valores do Caixa</h5>
        <table class="w3-table w3-striped w3-bordered w3-white">
            <tr>
                <td style="width: 30%">Cartão</td>
                <td style="width: 50%"></td>
                <td style="20%">R$ <?php echo $cartao;?></td>
            </tr>
            <tr>
                <td style="width: 30%">Dinheiro</td>
                <td style="width: 50%"></td>
                <td style="20%">R$ <?php echo $dinheiro + $troco;?></td>
            </tr>
            <tr>
                <td style="width: 30%">Retirada</td>
                <td style="width: 50%"></td>
                <td style="20%" class="w3-text-red">R$ <?php echo $valorRetirada;?></td>
            </tr>
            <tr>
                <td style="width: 30%">No Caixa</td>
                <td style="width: 50%"></td>
                <td style="20%">R$ <?php echo ($dinheiro + $troco) - $valorRetirada;?></td>
            </tr>
        </table>
        <hr>
        <form action="fecharCx.php?print" method="post">
            <input type="hidden" class="no-print" value="<?php echo $horaF?>" name="horaF">
            <input type="hidden" class="no-print" value="<?php echo $_SESSION['idUser']?>" name="userF">
            <input type="hidden" class="no-print" value="<?php echo $dinheiro?>" name="dinheiro">
            <input type="hidden" class="no-print" value="<?php echo $cartao?>" name="cartao">
            <input type="hidden" class="no-print" value="<?php echo $valorRetirada?>" name="retirada">
            <input type="text" class="no-print" value="<?php echo $cx?>" name="idcaixa" hidden>
            <div class="w3-row no-print">
                <div class="w3-col w3-border w3-border-gray w3-gray w3-third" style="border-radius: 6px 0 0 6px; padding: 6.5px;">
                    <label for="" class="fs087e w3-text-white" style="">Em Caixa</label>
                </div>
                <div class="w3-twothird">
                    <input type="text" name="emcaixa" id="recb" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10 money" style="border-radius: 0 6px 6px 0;" value="<?php echo $emcaixa?>">
                </div>
            </div>
            <button id="fim" name="fechar" class="w3-btn w3-green w3-round mt05 no-print mb05"> Fechar</button>
        </form>
        <table class="w3-table w3-striped w3-bordered w3-white print dnn">
            <tr>
                <td style="width: 30%">Em Caixa</td>
                <td style="width: 50%"></td>
                <td style="20%">R$ <?php echo $emcaixa;?></td>
            </tr>
        </table>
    </div>
</div>

<?php
if (isset($_GET['print'])){
    echo "<script>window.print(document); </script>";
}
?>

</body>
</html>