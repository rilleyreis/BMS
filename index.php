<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Rilley Reis">

    <link rel="stylesheet" href="_css/style.css">
    <link rel="stylesheet" href="_css/font-awesome.css">
    <link rel="stylesheet" href="_css/w3.css">

    <title>BMS</title>
</head>
<body class="body">
<?php include 'login/login.php'; ?>
    <div class="w3-container bgcba8">
        <div class="w3-container bradius w500 h450 bgcba6 m0a mt115 mb110">
            <div class="m0a w225 h115 mt35">
                <img src="_img/logoFull.png" alt="" class="wfull hfull">
            </div>
            <div class="w450 h300 ml10 mr10 mt25">
                <h3 class="w3-text-white w3-center mb35">Efetuar Login</h3>
                <form action="" method="post">
                    <div class="w3-row w3-section">
                        <div class="w3-col w3-text-white" style="width: 50px;"><i class=" w3-xxlarge fa fa-user"></i></div>
                        <div class="w3-rest">
                            <input type="text" class="w3-input w3-border" name="usuario" placeholder="Usuário">
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-col w3-text-white" style="width: 50px;"><i class="w3-xxlarge fa fa-lock"></i></div>
                        <div class="w3-rest">
                            <input type="password" class="w3-input w3-border" name="senha" placeholder="Senha">
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-col mr50" style="width: 230px;">
                            <input type="submit" class="w3-btn w3-green w230 bradius" name="entrar" value="Entrar"></input>
                        </div>
                        <div class="w3-rest w3-text-white">
                            <a href="" class="fs087e">Esqueceu a Senha?</a>
                        </div>
                    </div>
                </form>
            </div>
            <p class="fs095e w3-text-red w3-center"><?php echo $msgErro; ?></p>
        </div>
    </div>
</body>
</html>