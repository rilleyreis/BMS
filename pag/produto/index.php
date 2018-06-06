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
<?php include '../../php/control/produto/prod_index.php'?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu" style="z-index:4; padding: 3px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right w3-text-white fwb">Business Manager System</span>
</div>


<!-- Sidebar/menu -->
<?php include '../../include/'.$_SESSION['panelUser'].'/menu.php'?>

<div class="w3-main p15" style="margin-left: 300px; margin-top: 43px;">
    <div class="w3-row-padding w3-margin-bottom">
        <button class="w3-quarter w3-btn w3-green w3-round-large" onclick="window.location='dados.php'">
            <div class="w3-container w3-green w3-padding-small tac">
                <div class=""><i class="fas fa-plus w3-xxxlarge"></i></div>
                <div class="w3-clear"></div>
                <h4>Adicionar Produto</h4>
            </div>
        </button>
    </div>
    <div class="w3-card mt20">
        <header class="w3-gray w3-text-gray">
            <div class="w3-row">
                <div class="w3-col tac p8" style="width: 5%; border-right-style: groove; border-right-color: gray;">
                    <i class="fas fa-pallet"></i>
                </div>
                <div class="w3-col p8" style="width: 65%;">
                    Produtos
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
                    <th class="w3-border w3-border-gray" style="width: 10%">Estoque</th>
                    <th class="w3-border w3-border-gray" style="width: 10%">Preço</th>
                    <th class="w3-border w3-border-gray" style="width: 10%">Status</th>
                    <th class="w3-border w3-border-gray" style="width: 20%">Ações</th>
                    <tbody class="fs087e">
                    <?php
                    if($qtd_prod > 0) {
                        $cont = 0;
                        foreach ($prod_exibir as $row) { ?>
                            <tr>
                                <td class="w3-border w3-center"><?php echo $row['idPRODUTO']; ?></td>
                                <td class="w3-border"><?php echo $row['nomePRODUTO']; ?></td>
                                <td class="w3-border"><?php echo $row['descricaoPRODUTO']; ?></td>
                                <td class="w3-border"><?php echo $row['estoquePRODUTO']; ?></td>
                                <td class="w3-border"><?php echo "R$ " . $row['vendaPRODUTO']; ?></td>
                                <td class="w3-border"><?php echo $row['ativoPRODUTO'] == 1 ? "Ativado" : "Desativado"; ?></td>
                                <td class="w3-border">
                                    <div class="w3-row">
                                        <div class="w3-quarter">
                                            <a onclick="document.getElementById('modal<?php echo $cont; ?>').style.display='block'" class="w3-btn w3-blue-gray mr03" name="view" title="Visualizar"><i class="fas fa-eye"></i></a>
                                        </div>
                                        <div class="w3-quarter">
                                            <button class="w3-btn w3-green mr03" name="sel" value="<?php echo $row['idPRODUTO']; ?>" title="Editar"><i class="fas fa-edit"></i></button>
                                        </div>
                                        <div class="w3-quarter">

                                            <?php
                                            if($row['ativoPRODUTO'] == 0){
                                                ?>
                                                <button class="w3-btn w3-teal mr03" name="prodAtiv" value="<?php echo $row['idPRODUTO'];?>" title="Ativar"><i class="fas fa-play-circle"></i></button>
                                            <?php } else{?>
                                                <label for="prodExcl<?php echo $cont;?>"><a class="w3-btn w3-red" name="excl" onclick="document.getElementById('modal').style.display='block'" title="Excluir"><i class="fa fa-trash"></i></a></label>
                                                <input type="radio" name="prodExcl" id="prodExcl<?php echo $cont;?>" value="<?php echo $row['idPRODUTO']?>" hidden>
                                            <?php }?>
                                        </div>
                                        <div class="w3-quarter">
                                            <label for="prodAdd<?php echo $cont; ?>"><a class="w3-btn w3-indigo" name="add" onclick="document.getElementById('modalAdd').style.display='block'"title="Adicionar"><i class="fas fa-plus"></i></a></label>
                                            <input type="radio" name="prodAdd" id="prodAdd<?php echo $cont; ?>" value="<?php echo $row['idPRODUTO'] ?>" hidden>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <div id="modal<?php echo $cont; ?>" class="w3-modal">
                                <div class="w3-modal-content w3-animate-top w3-center w300">
                                    <header class="w3-container w3-gray">
                                    <span
                                            onclick="document.getElementById('modal<?php echo $cont; ?>').style.display='none'"
                                            class="w3-button w3-display-topright">&times;</span>
                                        <h2>Dados do Produto</h2>
                                    </header>
                                    <div class="w3-container">
                                        <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">ID: <?php echo $row['idPRODUTO']; ?></p>
                                        <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Nome: <?php echo $row['nomePRODUTO']; ?></p>
                                        <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Descrição: <?php echo $row['descricaoPRODUTO']; ?></p>
                                        <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Estoque: <?php echo $row['estoquePRODUTO']; ?></p>
                                        <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Estoque Minimo: <?php echo $row['minimoPRODUTO']; ?></p>
                                        <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Valor de Compra: R$<?php echo $row['compraPRODUTO']; ?></p>
                                        <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Valor de Venda: R$<?php echo $row['vendaPRODUTO']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php $cont++;}}?>
                    </tbody>
                </table>
<!--                modal Excluir-->
                <div id="modal" class="w3-modal">
                    <div class="w3-modal-content w3-animate-top w3-center">
                        <header class="w3-container w3-blue-gray">
                            <span onclick="document.getElementById('modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2>Excluir Produto</h2>
                        </header>
                        <div class="w3-container">
                            <p class="w3-center fs11e">Deseja realmente excluir este produto?</p>
                            <a class="w3-btn w3-teal mt15 w150 mb15" onclick="document.getElementById('frm1').submit();" name="excluir">Sim</a>
                            <a class="w3-btn w3-red mt15 w150 mb15" onclick="document.getElementById('modal').style.display='none'">Não</a>
                        </div>
                    </div>
                </div>

<!--                modal Add Estoque-->
                <div id="modalAdd" class="w3-modal">
                    <div class="w3-modal-content w3-animate-top w3-center">
                        <header class="w3-container w3-blue-gray">
                            <span onclick="document.getElementById('modalAdd').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                            <h2>Adicionar Estoque</h2>
                        </header>
                        <div class="w3-container">
                            <p class="w3-center fs11e mb10">Qual a quantidade que deseja adicionar, ao estoque, dete produto?</p>
                            <input type="text" name="qtdAdd" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius m0a" style="width: 50%">
                            <a class="w3-btn w3-teal mt15 w150 mb15" onclick="document.getElementById('frm1').submit();" name="excluir">Adicionar</a>
                            <a class="w3-btn w3-red mt15 w150 mb15" onclick="document.getElementById('modalAdd').style.display='none'">Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>

            <!--                Inicio da paginação-->
            <?php
            if($qtd_prod > 0){
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