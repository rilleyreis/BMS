<?php
    date_default_timezone_set("America/Sao_Paulo");
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Rilley Reis">

    <link rel="stylesheet" href="app/css/style.css">
    <link rel="stylesheet" href="app/css/font-awesome.css">
    <link rel="stylesheet" href="app/css/w3.css">

    <script type="text/javascript" src="app/js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="app/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="app/js/jquery.maskMoney.js"></script>
    <script type="text/javascript" src="app/js/masks.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#form').submit(function () {
                $('#abrir').attr("value", "Abrindo...");
            });
        });
    </script>

    <title>BMS</title>
</head>
<body>
<?php include "php/control/abrirCaixa.php";?>
<div class="w3-container body" style="height: 100vh; width: 100vw;">
    <div class="w3-container bradius w500 h450 bgcba m0a mt120 mb110">
        <div class="<?php echo $color;?> mb05 bradius mt05" id="erroLogin" style="<?php echo $erro;?> padding: 3px;">
            <span class="fs087e <?php echo $colorText;?> w3-right cp" onclick="document.getElementById('erroLogin').style.display='none'">&times;</span>
            <p class="fs087e <?php echo $colorText;?>"><?php echo $msg;?></p>
        </div>
        <div class="w450 ml10 mr10 mt15">
            <fieldset>
                <legend class="w100 h80 m0a tac p15" style="border: lightgray solid 1px; border-radius: 60px">
                    <i class="fa fa-money w3-xxxlarge w3-text-white"></i>
                </legend>
                <div class="p8 w3-pale-blue mb15" id="msg">
                    <p class="fs076e w3-text-blue">O caixa ainda não foi aberto, você deve abri-lo</p>
                </div>
                <form action="" method="post" id="form">
                    <div class="w3-row w3-section">
                        <div class="w3-col w3-text-white tac w3-border w3-border-gray" style="width: 50px; border-radius: 6px 0 0 6px; padding: 6px;"><i class=" w3-xlarge fa fa-user-o"></i></div>
                        <div class="w3-rest">
                            <input type="text" class="w3-input w3-border" name="usuario" value="<?php echo $nome;?>" style="border-radius: 0 6px 6px 0;" readonly>
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-col w3-text-white tac w3-border w3-border-gray" style="width: 50px; border-radius: 6px 0 0 6px; padding: 6px;" style="width: 50px;"><i class="w3-xlarge fa fa-calendar-o"></i></div>
                        <div class="w3-rest">
                            <input type="date" class="w3-input w3-border" name="data" value="<?php echo date("Y-m-d");?>" style="border-radius: 0 6px 6px 0;" readonly>
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-col w3-text-white tac w3-border w3-border-gray" style="width: 50px; border-radius: 6px 0 0 6px; padding: 6px;" style="width: 50px;"><i class="w3-xlarge fa fa-clock-o"></i></div>
                        <div class="w3-rest">
                            <input type="text" class="w3-input w3-border" name="hora" value="<?php echo date("H:i");?>" style="border-radius: 0 6px 6px 0;" readonly>
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-col w3-text-white tac w3-border w3-border-gray" style="width: 50px; border-radius: 6px 0 0 6px; padding: 6px;" style="width: 50px;"><i class="w3-xlarge fa fa-dollar"></i></div>
                        <div class="w3-rest">
                            <input type="text" class="w3-input w3-border money" name="troco" style="border-radius: 0 6px 6px 0;" autofocus>
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-col mr50" style="width: 100%">
                            <input type="submit" class="w3-btn w3-green wfull bradius" name="abrir" id="abrir" value="Abrir"></input>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>
</body>
</html>