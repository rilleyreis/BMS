<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Rilley Reis">

    <link rel="stylesheet" href="../../app/css/style.css">
    <link rel="stylesheet" href="../../app/css/font-awesome.css">
    <link rel="stylesheet" href="../../app/css/w3.css">

    <title>BMS - Administrador</title>
</head>
<body>
<?php include '../../php/control/produto/prod_index.php';?>
<nav class="w3-sidebar hfull" style="width: 15%">
    <?php include '../../include/admin/menu.php';?>
</nav>
<div class="bgcMenu h40 pt10" style="margin-left: 15%">
    <div class="hfull">
        <div class="fs087e">
            <nav class="w3-text-gray">
                <a href="#" class="p10 w3-hover-text-white menusup"><i class="fa fa-gears mr10"></i> Meus Dados</a>
                <a href="#" class="p10 w3-hover-text-white menusup" style="margin-left: -8px;"><i class="fa fa-sign-out mr10"></i> Sair do Sistema</a>
            </nav>
        </div>
    </div>
</div>
<div class="bgcC1 h40 pt10 pl20" style="margin-left: 15%">
    <p class="fs087e w3-text-gray "><a href="../admin.php" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home > </a><a href="" class="w3-hover-text-dark-gray ml10">Produtos ></a></p>
</div>
<div class="w3-container" style="margin-left: 15%;">
    <button class="w3-btn w3-green mt50 w3-center fs087e" onclick="window.location='dados.php'"><i class="fa fa-plus"></i>Adicionar Produto
    </button>
    <div class="w3-card mt20">
        <header class="w3-gray w3-text-gray">
            <i class="fa fa-barcode p10" style="border-right-style: groove; border-right-color: gray"></i> Produtos
            <form action="" method="post" class="w3-right pl10 pr10 " style="border-left-style: groove; border-left-color: gray; height: 35px">
                <div class="w3-row">
                    <div class="w3-col" style="width: 200px;">
                        <input name="buscar" type="text" class="w3-input w3-gray w3-border w3-hover-border-blue h30 mt03 w3-text-gray" style="border-radius: 6px 0 0 6px" placeholder="Buscar">
                    </div>
                    <div class="w3-rest w3-text-white">
                        <button name="buscar" type="submit" class="mt03 h30 w3-btn w3-gray w3-border w3-text-gray" style="border-radius: 0 6px 6px 0 "><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </header>
        <div class=" pb05">
            <form action="" method="post" id="frm1">
                <table class="w3-table w3-striped">
                    <thead class="bgcTH fs095e">
                    <th class="w3-border w3-border-gray w3-center" style="width: 5%">#</th>
                    <th class="w3-border w3-border-gray" style="width: 20%">Nome</th>
                    <th class="w3-border w3-border-gray" style="width: 30%">Descrição</th>
                    <th class="w3-border w3-border-gray" style="width: 10%">Estoque</th>
                    <th class="w3-border w3-border-gray" style="width: 15%">Preço</th>
                    <th class="w3-border w3-border-gray" style="width: 20%"></th>
                    </thead>
                    <tbody class="fs087e">
                    <?php
                    if($qtd_prod > 0) {
                    $cont = 0;
                    foreach ($prod_exibir as $row) { ?>
                        <tr>
                            <td class="w3-border w3-center"><?php echo $row['id_prod']; ?></td>
                            <td class="w3-border"><?php echo $row['nome_prod']; ?></td>
                            <td class="w3-border"><?php echo $row['desc_prod']; ?></td>
                            <td class="w3-border"><?php echo $row['qtd_prod']; ?></td>
                            <td class="w3-border"><?php echo "R$ " . $row['venda_prod']; ?></td>
                            <td class="w3-border">
                                <a onclick="document.getElementById('modal<?php echo $cont; ?>').style.display='block'" class="w3-btn w3-blue-gray mr03" name="view" title="Visualizar"><i class="fa fa-eye"></i></a>
                                <button class="w3-btn w3-green mr03" name="sel" value="<?php echo $row['id_prod']; ?>" title="Editar"><i class="fa fa-pencil"></i></button>
                                <label for="prodExcl<?php echo $cont; ?>"><a class="w3-btn w3-red" name="excl" onclick="document.getElementById('modal').style.display='block'"title="Excluir"><i class="fa fa-trash"></i></a></label>
                                <input type="radio" name="prodExcl" id="prodExcl<?php echo $cont; ?>"value="<?php echo $row['id_prod'] ?>" hidden>
                                <label for="prodAdd<?php echo $cont; ?>"><a class="w3-btn w3-indigo" name="add" onclick="document.getElementById('modalAdd').style.display='block'"title="Adicionar"><i class="fa fa-plus"></i></a></label>
                                <input type="radio" name="prodAdd" id="prodAdd<?php echo $cont; ?>"value="<?php echo $row['id_prod'] ?>" hidden>
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
                                    <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">ID: <?php echo $row['id_prod']; ?></p>
                                    <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Nome: <?php echo $row['nome_prod']; ?></p>
                                    <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Descrição: <?php echo $row['desc_prod']; ?></p>
                                    <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Estoque: <?php echo $row['qtd_prod']; ?></p>
                                    <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Estoque Minimo: <?php echo $row['min_prod']; ?></p>
                                    <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Valor de Compra: R$<?php echo $row['compra_prod']; ?></p>
                                    <p class="w3-left-align fs11e w3-border-bottom w3-border-gray">Valor de Venda: R$<?php echo $row['venda_prod']; ?></p>
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