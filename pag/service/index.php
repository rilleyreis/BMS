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
<?php include '../../php/control/servico/serv_index.php'?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu" style="z-index:4; padding: 1.5px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <a onclick="openMenu(3)" class="cp fs10e"><span class="w3-bar-item w3-text-white w3-right">Bem-Vindo, <strong><?php echo $_SESSION['fnomeUser'];?></strong> <i class="fa fa-caret-down"></i></span></a>
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
                <h4>Adicionar Serviço</h4>
            </div>
        </button>
    </div>
    <div class="w3-card mt20">
        <header class="w3-gray w3-text-gray">
            <div class="w3-row">
                <div class="w3-col tac p8" style="width: 5%; border-right-style: groove; border-right-color: gray;">
                    <i class="fas fa-wrench"></i>
                </div>
                <div class="w3-col p8" style="width: 65%;">
                    Serviços
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
                    <th class="w3-border w3-border-gray w3-center" style="width: 5%">#</th>
                    <th class="w3-border w3-border-gray" style="width: 20%">Nome</th>
                    <th class="w3-border w3-border-gray" style="width: 25%">Descrição</th>
                    <th class="w3-border w3-border-gray" style="width: 15%">Técnico</th>
                    <th class="w3-border w3-border-gray" style="width: 10%">Preço</th>
                    <th class="w3-border w3-border-gray" style="width: 10%">Status</th>
                    <th class="w3-border w3-border-gray" style="width: 15%">Ações</th>
                    </thead>
                    <tbody class="fs087e">
                    <?php
                    if($num_servs > 0) {
                        $cont = 0;
                        foreach ($serv_exibir as $row) { ?>
                            <tr>
                                <td class="w3-border w3-center"><?php echo $row['idSERVICO']; ?></td>
                                <td class="w3-border"><?php echo $row['nomeSERVICO']; ?></td>
                                <td class="w3-border"><?php echo $row['descricaoSERVICO']; ?></td>
                                <td class="w3-border"><?php echo $row['userSERVICO']; ?></td>
                                <td class="w3-border"><?php echo "R$ " . $row['valorSERVICO']; ?></td>
                                <td class="w3-border"><?php echo $row['ativoSERVICO'] == 1 ? "Ativado" : "Desativado"; ?></td>
                                <td class="w3-border">
                                    <div class="w3-row">
                                        <div class="w3-third">
                                            <button class="w3-btn w3-green mr03" name="sel" value="<?php echo $row['idSERVICO']; ?>" title="Editar"><i class="fas fa-edit"></i></button>
                                        </div>
                                        <div class="w3-third">
                                            <?php
                                                if($row['ativoSERVICO'] == 1){
                                            ?>
                                                    <label for="servExcl<?php echo $cont; ?>"><a class="w3-btn w3-red" name="excl" onclick="document.getElementById('modal').style.display='block'"title="Excluir"><i class="fas fa-trash"></i></a></label>
                                                    <input type="radio" name="servExcl" id="servExcl<?php echo $cont; ?>"value="<?php echo $row['idSERVICO'] ?>" hidden>
                                            <?php } else {?>
                                                    <button class="w3-btn w3-teal mr03" name="servAtiv" value="<?php echo $row['idSERVICO']; ?>" title="Ativar"><i class="fas fa-play-circle"></i></button>
                                            <?php }?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php $cont++;}}?>
                    </tbody>
                </table>
<!--                modal Excluir-->
                <div id="modal" class="w3-modal">
                    <div class="w3-modal-content w3-animate-top w3-center">
                        <header class="w3-container w3-blue-gray">
                            <span onclick="document.getElementById('modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2>Excluir Serviço</h2>
                        </header>
                        <div class="w3-container">
                            <p class="w3-center fs11e">Deseja realmente excluir este serviço?</p>
                            <a class="w3-btn w3-teal mt15 w150 mb15" onclick="document.getElementById('frm1').submit();" name="excluir">Sim</a>
                            <a class="w3-btn w3-red mt15 w150 mb15" onclick="document.getElementById('modal').style.display='none'">Não</a>
                        </div>
                    </div>
                </div>
            </form>
            <!--                Inicio da paginação-->
            <?php
            if($num_servs > 0){
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
            <p class="fs087e p10"><?php echo $msgTable;?></p>
        </div>
    </div>

</div>
</body>
</html>