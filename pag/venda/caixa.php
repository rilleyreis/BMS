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
<?php include '../../php/control/venda/caixa.php'?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu no-print" style="z-index:4; padding: 3px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right fwb w3-text-white">Business Manager System</span>
</div>


<!-- Sidebar/menu -->
<div style="margin-top: 23px;">
    <?php include '../../include/'.$_SESSION['panelUser'].'/menu.php'?>
</div>

<div class="w3-main p15" style="margin-left: 300px; margin-top: 43px;">
    <div class="w3-row-padding w3-margin-bottom">
        <a class="w3-third w3-btn w3-teal" href="../venda">
            <div class="w3-container w3-teal w3-padding-16 tac">
                <div class=""><i class="fas fa-shopping-basket w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>Vendas</h4>
            </div>
        </a>
        <a class="w3-third w3-btn w3-red" onclick="document.getElementById('modal').style.display='block'">
            <div class="w3-container w3-red w3-padding-16 tac">
                <div class=""><i class="fas fa-money-bill-alt w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>Retirada</h4>
            </div>
        </a>
    </div>

    <div class="w3-row bbtsc1">
        <div class="w3-half pr05">
            <h5>Caixa</h5>
            <div class="pb05">
                <div class="tac bbtsc1 w3-row pb05">
                    <div class="w3-third">
                        <h1 class="fs095e">Troco</h1>
                        <h1 class="fs10e fwb">R$ <?php echo $troco?></h1>
                    </div>
                    <div class="w3-third">
                        <h1 class="fs095e">Movimentção do Dia</h1>
                        <h1 class="fs10e fwb w3-text-indigo">R$ <?php echo $valorDia?></h1>
                    </div>
                </div>
                <div class="tac">
                    <table class="w3-table w3-striped w3-bordered w3-white">
                        <tr>
                            <td style="width: 30%">Dinheiro</td>
                            <td style="width: 50%"></td>
                            <td style="20%">R$ <?php echo $valorDin;?></td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Crédito</td>
                            <td style="width: 50%"></td>
                            <td style="20%">R$ <?php echo $valorCC;?></td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Débito</td>
                            <td style="width: 50%"></td>
                            <td style="20%">R$ <?php echo $valorCD;?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="bl4sc1 w3-half pl05">
            <h5>Financeiro</h5>
            <div class="pb05">
                <div class="tac bbtsc1 w3-row pb05" style="height: 74px;">

                </div>
                <div class="tac">
                    <table class="w3-table w3-striped w3-bordered w3-white">
                        <tr>
                            <td style="width: 30%">Em Dinheiro</td>
                            <td style="width: 50%"></td>
                            <td style="20%">R$ <?php echo $valorDin + $troco;?></td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Retirada</td>
                            <td style="width: 50%"></td>
                            <td style="20%" class="w3-text-red">R$ <?php echo $valorRetirada;?></td>
                        </tr>
                        <tr>
                            <td style="width: 30%">Total</td>
                            <td style="width: 50%"></td>
                            <td style="20%">R$ <?php echo ($valorDin + $troco) - $valorRetirada;?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <a class="w3-btn w3-blue-gray w3-round w3-text-white mt10" href="fecharCx.php">Fechar Caixa</a>

    <h5>Detalhamento da Movimentação</h5>
    <table class="w3-table w3-striped fs087e mb35">
        <thead class="bgcTH fs095e">
        <th class="w3-border w3-border-gray w3-center" style="width: 10%">#</th>
        <th class="w3-border w3-border-gray" style="width: 25%">Tipo</th>
        <th class="w3-border w3-border-gray" style="width: 15%">Valor</th>
        <th class="w3-border w3-border-gray" style="width: 20%">Forma de Pagamento</th>
        <th class="w3-border w3-border-gray" style="width: 10%">Parcelas</th>
        <th class="w3-border w3-border-gray" style="width: 20%">Ações</th>
        <tbody class="fs087e">
        <?php if($num_mov > 0){
            foreach ($mov_exibir as $row) {?>
                <tr>
                    <td class="w3-border"><?php echo $row['id']?></td>
                    <td class="w3-border">
                        <?php switch ($row['tipo']){
                            case 1: echo "ORDEM DE SERVIÇO"; break;
                            case 2: echo "VENDA"; break;
                            case 3: echo "SANGRIA"; break;
                            case 4: echo "DESPESAS"; break;
                        }?>
                    </td>
                    <td class="w3-border"><?php echo $row['valor']?></td>
                    <td class="w3-border"><?php echo $row['forma'] != NULL ? $row['forma'] : " "?></td>
                    <td class="w3-border"><?php echo $row['parcela'] != NULL ? $row['parcela'] : " ";?></td>
                    <td class="w3-border"></td>
                </tr>
            <?php }}?>
        </tbody>
    </table>
    <?php
    if($num_mov > 0){
        if($total_pags > 1){?>
            <div class="w3-center mt10">
                <div class="w3-bar w3-border w3-round">
                    <?php for($i = 1; $i <= $total_pags; $i++){
                        if($i == $pag_atual){?>
                            <span class="w3-button w3-blue-gray"><?php echo $i;?></span>
                        <?php }else{?>
                            <a href="?pag=<?php echo $i;?>" class="w3-button w3-hover-blue-gray"><?php echo $i;?></a>
                        <?php }?>
                    <?php }?>
                </div>
            </div>
            <?php
        }
    }
    ?>

<div id="modal" class="w3-modal">
    <div class="w3-modal-content" style="width: 500px;">

        <header class="w3-container w3-gray tac">
            <span onclick="document.getElementById('modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
            <h3>Realizar Retirada</h3>
        </header>

        <div class="w3-container">
            <form action="" method="post" class="p8">
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 7.5px;">
                        <label for="funcUsuario" class="fs087e w3-text-white mt05">Tipo de Retirada *</label>
                    </div>
                    <div class="w3-rest">
                        <select name="tipo" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" required>
                            <option value="" disabled selected>Selecione um tipo</option>
                            <option value="3">SANGRIA</option>
                            <option value="4">DESPESA</option>
                        </select>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 7.5px;">
                        <label for="funcUsuario" class="fs087e w3-text-white mt05">Descrição da Retirada *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="descricao" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" placeholder="Descrição" value="" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 7.5px;">
                        <label for="funcUsuario" class="fs087e w3-text-white mt05">Valor da Retirada *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="valor" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 money fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Valor" value="" required>
                    </div>
                </div>
                <button class="w3-btn w3-green w3-round" type="submit" name="retirar">Finalizar</button>
                <a class="w3-btn w3-red w3-round" onclick="document.getElementById('modal').style.display='none'">Cancelar</a>
            </form>
        </div>

    </div>
</div>

</body>
</html>