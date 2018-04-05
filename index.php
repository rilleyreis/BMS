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

    <title>BMS</title>
</head>
<body>
    <?php include 'php/control/login.php';?>
    <div class="w3-container body" style="height: 100vh; width: 100vw;">
        <div class="w3-container bradius w500 h400 bgcba6 m0a mt130 mb110">
            <div class="<?php echo $color;?> mb05 bradius mt05" id="erroLogin" style="<?php echo $erro;?> padding: 3px;">
                <span class="fs087e <?php echo $colorText;?> w3-right cp" onclick="document.getElementById('erroLogin').style.display='none'">&times;</span>
                <p class="fs087e <?php echo $colorText;?>"><?php echo $msg;?></p>
            </div>
            <div class="w450 ml10 mr10 mt50">
                <fieldset>
                    <legend class="w100 h80 m0a tac p5" style="border: lightgray solid 1px; border-radius: 60px">
                        <img src="img/logo.png" alt="" class="hfull">
                    </legend>
                    <form action="" method="post">
                        <div class="w3-row w3-section">
                            <div class="w3-col w3-text-white tac w3-border w3-border-gray" style="width: 50px; border-radius: 6px 0 0 6px; padding: 6px;"><i class=" w3-xlarge fa fa-user-o"></i></div>
                            <div class="w3-rest">
                                <input type="text" class="w3-input w3-border" name="usuario" placeholder="Usuário" style="border-radius: 0 6px 6px 0;" autofocus>
                            </div>
                        </div>
                        <div class="w3-row w3-section">
                            <div class="w3-col w3-text-white tac w3-border w3-border-gray" style="width: 50px; border-radius: 6px 0 0 6px; padding: 6px;"><i class="w3-xlarge fa fa-lock"></i></div>
                            <div class="w3-rest">
                                <input type="password" class="w3-input w3-border" name="senha" placeholder="Senha" style="border-radius: 0 6px 6px 0;">
                            </div>
                        </div>
                        <div class="w3-row w3-section">
                            <div class="w3-col mr50" style="width: 230px;">
                                <input type="submit" class="w3-btn w3-green w230 bradius" name="logar" value="Entrar"></input>
                            </div>
                            <div class="w3-rest w3-text-white">
                                <a href="" class="fs087e">Esqueceu a Senha?</a>
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</body>
</html>