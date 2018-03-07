<?php //require 'checkin.php';?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Rilley Reis">

    <link rel="stylesheet" href="../app/css/style.css">
    <link rel="stylesheet" href="../app/css/font-awesome.css">
    <link rel="stylesheet" href="../app/css/w3.css">

    <title>BMS - Administrador</title>
</head>
<body>
    <?php include '../php/control/admin.php';?>
    <nav class="w3-sidebar hfull" style="width: 15%">
        <div class="wfull hfull bgcMenu">
            <div class="h115 w100 pt10 ml45 m0a">
                <a href="admin.php"><img src="../img/logo.png" alt="" class="wfull hfull"></a>
            </div>
            <h6 class="fs095e w3-text-white mt05 w3-center">Business Manager System</h6>
            <div class="w3-container bgcba mb10 mt10">
                <h6 class="fs087e w3-text-white">Menu</h6>
            </div>
            <div class="wfull">
                <a class="w3-button w3-block w3-left-align wfull w3-text-white fs095e" href="cliente">Clientes</a>
                <a class="w3-button w3-block w3-left-align wfull w3-text-white fs095e" href="fornecedor">Fornecedor</a>
                <a class="w3-button w3-block w3-left-align wfull w3-text-white fs095e" href="produto">Produtos</a>
                <a class="w3-button w3-block w3-left-align wfull w3-text-white fs095e" href="">Serviços</a>
                <a class="w3-button w3-block w3-left-align wfull w3-text-white fs095e" href="">OS</a>
                <button class="w3-button w3-block w3-left-align w3-text-white fs095e wfull" onclick="openMenu(1)">Financeiro <i class="fa fa-caret-down"></i></button>
                <div id="menu1" class="w3-hide bgcMenu w3-card fs087e wfull">
                    <a href="" class="w3-button w3-text-white wfull">Venda</a>
                    <a href="" class="w3-button w3-text-white wfull">Lançamento</a>
                </div>
                <button class="w3-button w3-block w3-left-align w3-text-white fs095e wfull" onclick="openMenu(2)">Configuração <i class="fa fa-caret-down"></i></button>
                <div id="menu2" class="w3-hide bgcMenu w3-card fs087e w3-left wfull">
                    <a href="users" class="w3-button w3-text-white wfull">Usuário</a>
                    <a href="empresa" class="w3-button w3-text-white wfull">Empresa</a>
                </div>
            </div>
        </div>
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
        <p class="fs087e w3-text-gray "><a href="../_admin" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home ></a></p>
    </div>
    <div class="w3-container" style="margin-left: 15%;">
        <button class="w3-btn w3-indigo w150 h65 mt25 w3-center ml30 w3-hover-grey" onclick="window.location='cliente/dados.php'">
            <p class="fs20e" style="margin-top: -5px;"><i class="fa fa-users"></i></p>
            <p class="fs12e" style="margin-top: -8px;">Clientes</p>
        </button>
        <button class="w3-btn w3-brown w150 h65 mt25 w3-center ml30 w3-hover-grey" onclick="window.location='fornecedor/dados.php'">
            <p class="fs20e" style="margin-top: -5px;"><i class="fa fa-industry"></i></p>
            <p class="fs12e" style="margin-top: -8px;">Fornecedores</p>
        </button>
        <button class="w3-btn w3-green w150 h65 mt25 w3-center ml30 w3-hover-grey" onclick="window.location='produto/dados.php'">
            <p class="fs20e" style="margin-top: -5px;"><i class="fa fa-barcode"></i></p>
            <p class="fs12e" style="margin-top: -8px;">Produtos</p>
        </button>
        <button class="w3-btn w3-blue-gray w150 h65 mt25 w3-center ml30 w3-hover-grey" onclick="window.location='venda'">
            <p class="fs20e" style="margin-top: -5px;"><i class="fa fa-shopping-cart"></i></p>
            <p class="fs12e" style="margin-top: -8px;">Vendas</p>
        </button>
        <button class="w3-btn w3-teal w150 h65 mt25 w3-center ml30 w3-hover-grey" onclick="window.location='os/dados.php'">
            <p class="fs20e" style="margin-top: -5px;"><i class="fa fa-file-text"></i></p>
            <p class="fs12e" style="margin-top: -8px;">OS's</p>
        </button>

        <div class="w3-card mt25">
            <header class="w3-gray w3-text-gray">
                <i class="fa fa-signal p10 mr05" style="border-right-style: groove; border-right-color: gray"></i>Produtos em Estoques
                <form action="" method="post" class="w3-right pl10 pr10 " style="border-left-style: groove; border-left-color: gray; height: 35px" id="formFilter">
                    <div class="w3-row">
                        <div class="w3-col" style="width: 35px;">
                            <div class="mt03 pt03 pb03 pr10 pl10 w3-border" style="border-radius:6px 0 0 6px"><i class="fa fa-filter"></i></div>
                        </div>
                        <div class="w3-rest" style="width: 200px">
                            <select name="filter" id="" class="w3-input w3-gray w3-border w3-hover-border-blue h30 mt03 w3-text-gray fs087e" style="padding: 5px;border-radius: 0 6px 6px 0" onchange="document.getElementById('formFilter').submit();">
                                <option value="az" <?php echo $filtro == "az" ? "selected" : ""?>>A-Z</option>
                                <option value="za" <?php echo $filtro == "za" ? "selected" : ""?>>Z-A</option>
                                <option value="mne" <?php echo $filtro == "mne" ? "selected" : ""?>>Menor Estoque</option>
                                <option value="mae" <?php echo $filtro == "mae" ? "selected" : ""?>>Maior Estoque</option>
                                <option value="mnv" <?php echo $filtro == "mnv" ? "selected" : ""?>>Menor Valor</option>
                                <option value="mav" <?php echo $filtro == "mav" ? "selected" : ""?>>Maior Valor</option>
                            </select>
                        </div>
                    </div>
                </form>
            </header>
            <div class="">
                <table class="w3-table w3-striped">
                    <thead class="bgcTH fs087e">
                        <th class="w3-border w3-border-gray w3-center" style="width: 5%">#</th>
                        <th class="w3-border w3-border-gray" style="width: 35%">Nome</th>
                        <th class="w3-border w3-border-gray" style="width: 20%">Preço</th>
                        <th class="w3-border w3-border-gray" style="width: 20%">Estoque</th>
                        <th class="w3-border w3-border-gray" style="width: 20%">Estoque Mínimo</th>
                    </thead>
                    <tbody class="fs087e">
                    <?php if($qtd_prod > 0){
                        foreach ($prod_exibir as $row){
                    ?>
                        <tr>
                            <td class="w3-border w3-center"><?php echo $row['id_prod']; ?></td>
                            <td class="w3-border"><?php echo $row['nome_prod']; ?></td>
                            <td class="w3-border"><?php echo "R$ " . $row['venda_prod']; ?></td>
                            <td class="w3-border"><?php echo $row['qtd_prod']; ?></td>
                            <td class="w3-border"><?php echo $row['min_prod']; ?></td>
                        </tr>
                    <?php }}?>
                    </tbody>
                </table>
                <p class="fs087e p5"><?php echo $msgTable;?></p>
                <!--                Inicio da paginação-->
                <?php
                if($qtd_prod > 0){
                    if($total_pags > 1){?>
                        <div class="w3-center mt10 fs087e">
                            <div class="w3-bar w3-border w3-round">
                                <?php for($i = 1; $i <= $total_pags; $i++){
                                    if($i == $pag_atual){?>
                                        <span class="w3-button w3-blue-gray"><?php echo $i;?></span>
                                    <?php }else{?>
                                        <a href="?pag=<?php echo $i;?>&flt=<?php echo $filtro;?>" class="w3-button w3-hover-blue-gray"><?php echo $i;?></a>
                                    <?php }?>
                                <?php }?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <!--                Final Paginação-->
            </div>
        </div>

        <div class="w3-card mt25">
            <header class="w3-gray w3-text-gray">
                <i class="fa fa-signal p5 mr05" style="border-right-style: groove; border-right-color: gray"></i>Ordens de Serviços
            </header>
            <div class="">

            </div>
        </div>
    </div>

    <script>
        function openMenu(id) {
            var x = document.getElementById("menu"+id);
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
                x.previousElementSibling.className += " w3-green";
            } else {
                x.className = x.className.replace(" w3-show", "");
                x.previousElementSibling.className =
                    x.previousElementSibling.className.replace(" w3-green", "");
            }
        }
    </script>
</body>
</html>