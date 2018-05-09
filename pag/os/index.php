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
<?php include '../../php/control/os/os_index.php'?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu" style="z-index:4; padding: 1.5px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <a onclick="openMenu(3)" class="cp fs10e"><span class="w3-bar-item w3-text-white w3-right">Bem-Vindo, <strong><?php echo $_SESSION['nomeUser'];?></strong> <i class="fa fa-caret-down"></i></span></a>
    <!--    <div id="menu3" class="w3-hide bgcMenu fs087e w3-right">-->
    <!--        <a href="#" class="w3-bar-item w3-button fs11e" title="Meus Dados"><i class="fa fa-user"></i></a>-->
    <!--        <a href="#" class="w3-bar-item w3-button" title="Logout"><i class="fa fa-sign-out"></i></a>-->
    <!--    </div>-->
</div>


<!-- Sidebar/menu -->
<?php include '../../include/'.$_SESSION['panelUser'].'/menu.php'?>

<div class="w3-main p15" style="margin-left: 300px; margin-top: 43px;">
    <div class="w3-row-padding w3-margin-bottom">
        <button class="w3-quarter w3-btn w3-green w3-round-large" onclick="window.location='dados.php'">
            <div class="w3-container w3-green w3-padding-small tac">
                <div class=""><i class="fas fa-plus w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>Adicionar OS</h4>
            </div>
        </button>
    </div>
    <div class="w3-card mt20">
        <header class="w3-gray w3-text-gray">
            <div class="w3-row">
                <div class="w3-col tac p8" style="width: 5%; border-right-style: groove; border-right-color: gray;">
                    <i class="fas fa-file"></i>
                </div>
                <div class="w3-col p8" style="width: 65%;">
                    Ordem de Serviço
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
        <div class=" pb05">
            <form action="" method="post" id="frm1">
                <table class="w3-table w3-striped fs087e">
                    <thead class="bgcTH fs095e">
                        <th class="w3-border w3-border-gray w3-center" style="width: 10%">Protocolo</th>
                        <th class="w3-border w3-border-gray" style="width: 20%">Cliente</th>
                        <th class="w3-border w3-border-gray" style="width: 20%">Contato</th>
                        <th class="w3-border w3-border-gray" style="width: 12%">Status</th>
                        <th class="w3-border w3-border-gray" style="width: 20%">Técnico</th>
                        <th class="w3-border w3-border-gray" style="width: 18%">Ações</th>
                    </thead>
                    <tbody class="fs087e">
                    <?php
                    $cont = 0;
                    if($num_os > 0){
                        foreach ($os_exibir as $row) {?>
                            <tr>
                                <td class="w3-border"><?php echo $row['protocolo'];?></td>
                                <td class="w3-border"><?php echo $row['cliente'];?></td>
                                <td class="w3-border"><?php echo $row['telefone'];?></td>
                                <td class="w3-border"><?php echo $row['status'];?></td>
                                <td class="w3-border"><?php echo $row['tecnico']?></td>
                                <td class="w3-border">
                                    <div class="w3-row">
                                        <div class="w3-third">
                                            <button class="w3-btn w3-green mr03" name="sel" value="<?php echo $row['id'];?>" title="Editar"><i class="fas fa-edit"></i></button>
                                        </div>
                                        <div class="w3-third">
                                            <?php
                                            if($row['status'] != "cancel"){
                                                ?>
                                                <label for="cpfExcl<?php echo $cont;?>"><a class="w3-btn w3-red" name="excl" onclick="document.getElementById('modal').style.display='block'" title="Excluir"><i class="fa fa-trash"></i></a></label>
                                                <input type="radio" name="cpfExcl" id="cpfExcl<?php echo $cont;?>" value="<?php echo $row['id']?>" hidden>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $cont++;}}?>
                    </tbody>
                </table>
            </form>
            <!--                Inicio da paginação-->
            <?php
            if($num_os > 0){
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
            <!--                Final Paginação-->
            <p class="fs087e p10"><?php echo $msg;?></p>
        </div>
    </div>

</div>
</body>
</html>