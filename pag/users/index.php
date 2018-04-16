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

<script defer src="../../app/js/fontawesome-all.min.js"></script>

<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php include '../../php/control/users/usr_index.php'?>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu" style="z-index:4; padding: 1.5px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <a onclick="openMenu(3)" class="cp fs10e"><span class="w3-bar-item w3-text-white w3-right">Bem-Vindo, <strong><?php echo $_SESSION['fnomeUser'];?></strong> <i class="fa fa-caret-down"></i></span></a>
    <!--    <div id="menu3" class="w3-hide bgcMenu fs087e w3-right">-->
    <!--        <a href="#" class="w3-bar-item w3-button fs11e" title="Meus Dados"><i class="fa fa-user"></i></a>-->
    <!--        <a href="#" class="w3-bar-item w3-button" title="Logout"><i class="fa fa-sign-out"></i></a>-->
    <!--    </div>-->
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Sidebar/menu -->
<?php include '../../include/'.$_SESSION['panelUser'].'/menu.php'?>

<div class="w3-main p15" style="margin-left: 300px; margin-top: 43px;">
    <div class="w3-row-padding w3-margin-bottom">
        <button class="w3-quarter w3-btn w3-green w3-round-large" onclick="window.location='dados.php'">
            <div class="w3-container w3-green w3-padding-small tac">
                <div class=""><i class="fas fa-plus w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>Adicionar Usuário</h4>
            </div>
        </button>
    </div>
    <div class="w3-card mt20">
        <header class="w3-gray w3-text-gray">
            <div class="w3-row">
                <div class="w3-col tac p8" style="width: 5%; border-right-style: groove; border-right-color: gray;">
                    <i class="fas fa-user"></i>
                </div>
                <div class="w3-col p8" style="width: 65%;">
                    Usuário
                </div>
                <div class="w3-col" style="width: 25%; border-left-style: groove; border-left-color: gray; padding: 2.5px 5px">
                    <form action="" method="post" class="" style="">
                        <div class="w3-row">
                            <div class="w3-col" style="width: 85%;">
                                <input name="buscar" type="text" class="w3-input w3-gray w3-border w3-hover-border-blue h30 mt03 w3-text-gray" style="border-radius: 6px 0 0 6px" placeholder="Buscar">
                            </div>
                            <div class="w3-col w3-text-white" style="width: 15%">
                                <button name="buscar" type="submit" class="mt03 h30 w3-btn w3-gray w3-border w3-text-gray" style="border-radius: 0 6px 6px 0;"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </header>
        <div class="pb05" style="overflow-x: auto;">
            <form action="" method="post" id="frm1">
                <table class="w3-table w3-striped fs087e">
                    <thead class="bgcTH fs095e">
                        <th class="w3-border w3-border-gray w3-center" style="width: 5%">#</th>
                        <th class="w3-border w3-border-gray" style="width: 20%">Nome</th>
                        <th class="w3-border w3-border-gray" style="width: 15%">Telefone</th>
                        <th class="w3-border w3-border-gray" style="width: 25%">Email</th>
                        <th class="w3-border w3-border-gray" style="width: 15%">Função</th>
                        <th class="w3-border w3-border-gray" style="width: 20%"></th>
                    </thead>
                    <tbody class="fs087e">
                            <?php
                            if ($num_usuario > 0){
                            $cont = 0;
                            foreach ($usr_exibir as $row) {?>
                            <tr>
                                <td class="w3-border"><?php echo $row['id'];?></td>
                                <td class="w3-border"><?php echo $row['fnome']." ".$row['lnome']?></td>
                                <td class="w3-border"><?php echo $row['cel'] != "" ? $row['cel'] : $row['tel'];?></td>
                                <td class="w3-border"><?php echo $row['email'];?></td>
                                <td class="w3-border"><?php echo $row['funcao'];?></td>
                                <td class="w3-border">
                                    <a onclick="document.getElementById('modal<?php echo $cont;?>').style.display='block'" class="w3-btn w3-blue-gray mr03" name="view" title="Visualizar"><i class="fa fa-eye"></i></a>
                                    <button class="w3-btn w3-green mr03" name="sel" value="<?php echo $row['id'];?>" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                                    <?php if($row['id'] != $_SESSION['idUser']){?>
                                        <label for="usrExcl<?php echo $cont;?>"><a class="w3-btn w3-red" name="excl" onclick="document.getElementById('modal').style.display='block'" title="Excluir"><i class="fa fa-trash"></i></a></label>
                                        <input type="radio" name="usrExcl" id="usrExcl<?php echo $cont;?>" value="<?php echo $row['id']?>" hidden>
                                    <?php }?>
                                </td>
                            </tr>
                            <div id="modal<?php echo $cont;?>" class="w3-modal">
                                <div class="w3-modal-content w3-animate-top w3-center w300">
                                    <header class="w3-container w3-gray">
                                        <span onclick="document.getElementById('modal<?php echo $cont;?>').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                        <h2>Dados do Usuário</h2>
                                    </header>
                                    <div class="w3-container">
                                        <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Código: <?php echo $row['id'];?></p>
                                        <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Nome: <?php echo $row['fnome'];?></p>
                                        <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Sobrenome: <?php echo $row['lnome'];?></p>
                                        <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">CPF: <?php echo $row['cpf'];?></p>
                                        <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Celular: <?php echo $row['cel'] == "" ? "Nada consta" : $row['cel'];?></p>
                                        <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Telefone: <?php echo $row['tel'] == "" ? "Nada consta" : $row['tel'];?></p>
                                        <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Email: <?php echo $row['email'];?></p>
                                        <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Usuário: <?php echo $row['usuario'];?></p>
                                        <p class="w3-left-align fs11e w3-border-bottom">Função: <?php echo $row['funcao'];?></p>
                                    </div>
                                </div>
                            </div>
                            <?php $cont++;}}?>
                    </tbody>
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