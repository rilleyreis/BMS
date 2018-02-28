<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Rilley Reis">

    <link rel="stylesheet" href="../../_css/style.css">
    <link rel="stylesheet" href="../../_css/font-awesome.css">
    <link rel="stylesheet" href="../../_css/w3.css">

    <title>BMS - Administrador</title>
</head>
<body>
<?php include 'os_view.php';?>
<nav class="w3-sidebar hfull" style="width: 15%">
    <?php include '../menu.php';?>
</nav>
<div class="bgcMenu h40 pt10" style="margin-left: 15%">
    <div class="hfull">
        <div class="fs087e">
            <nav class="w3-text-gray">
                <a href="#" class="p10 w3-hover-text-white" style="border-style: none groove none groove; border-color: #00001F;"><i class="fa fa-gears mr10"></i> Meus Dados</a>
                <a href="#" class="p10 w3-hover-text-white" style="margin-left: -8px; border-style: none groove none groove; border-color: #00001F"><i class="fa fa-sign-out mr10"></i> Sair do Sistema</a>
            </nav>
        </div>
    </div>
</div>
<div class="bgcC1 h40 pt10 pl20" style="margin-left: 15%">
    <p class="fs087e w3-text-gray "><a href="../../_admin/index.php" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home > </a><a href="../os" class="w3-hover-text-dark-gray ml10 mr10">OS ></a>Visualizar ></p>
</div>
<div class="w3-container" style="margin-left: 15%;">
    <div class="w3-card mt20 pb05">
        <header class="w3-gray w3-text-gray mb05">
            <i class="fa fa-file-text p10" style="border-right-style: groove; border-right-color: gray"></i> Ordem de Serivço
        </header>
        <!-- Inicio da div com os dados da OS -->
        <div class="p5 w3-border w3-border-gray mt10 mr10 mb10 ml10">
            <?php if($temEmp == 1){?>
            <div class="w3-row h150" style="border-bottom: lightgray solid 1px">
                <div class="pr10 pl10 pt40 pb40 w3-col h150" style="width: 20%; border-right: lightgray solid 1px;">
                    <div class="h80"><img src="<?php echo $logo_emp;?>" alt="" class="wfull hfull"></div>
                </div>
                <div class="pl10 pr10 pb10 w3-rest h150 mb15">
                    <div class="w3-left">
                        <h1 class="w3-left fwb fs14e"><?php echo $fant_emp?></h1>
                        <p class="mr50 fs065e">CNPJ: <?php echo $cnpj_emp?></p>
                        <p class="fs065e">Razão Social: <?php echo $raz_emp?></p>
                        <p class="fs065e">Rua: <?php echo $rua_emp?>, No. <?php echo $num_emp?> - <?php echo $bairro_emp?></p>
                        <p class="fs065e"><?php echo $cid_emp?> - <?php echo $est_emp?></p>
                        <p class="fs065e">Telefone: <?php echo $tel_emp?><br>Email: <?php echo $email_emp?></p><br>
                    </div>
                </div>
            </div>
            <?php }?>
            <div class="w3-border-bottom w3-border-gray w3-row">
                <div class="w3-col" style="width: 75%">
                    <h1 class="fwb fs14e">Protocolo: <?php echo $protocolo?></h1>
                </div>
                <div class="w3-rest">
                    <p class="mr50 fs065e mt15">Data de Emissão: <?php echo $data_os?></p>
                </div>
            </div>
            <div class="fs087e" style="border-bottom: lightgray solid 1px">
                <div class="w3-col p10" style="width: 50%; border-right: 1px solid lightgray">
                    <h1 class="fwb fs11e">Dados Cliente</h1>
                    <p class="mr50">Nome: <?php echo $nomeCli;?></p>
                    <p class="mr50">Contato: <?php echo $contatoCli?></p>
                    <p class="mr50">Email: <?php echo $emailCli;?></p>
                </div>
                <div class="p10 w3-rest" style="border-bottom: gray">
                    <h1 class="fwb fs11e">Dados do Técnico</h1>
                    <p class="mr50">Nome: <?php echo $nomeTec;?></p>
                    <p class="mr50">Contato: <?php echo $contatoTec?></p>
                    <p class="mr50">Email: <?php echo $emailTec;?></p>
                </div>
            </div>
            <div class="fs087e p10" style="border-bottom: lightgray solid 1px">
                <h1 class="fwb fs11e">Descrição</h1>
                <p><?php echo $desc_os;?></p>
            </div>
            <div class="fs087e p10" style="border-bottom: lightgray solid 1px">
                <h1 class="fwb fs11e">Defeito</h1>
                <p><?php echo $def_os;?></p>
            </div>
            <div class="fs087e p10" style="border-bottom: lightgray solid 1px">
                <h1 class="fwb fs11e">Observação</h1>
                <p><?php echo $obs_os;?></p>
            </div>
            <?php
            $totalProd = 0;
            if($qtdProd > 0) {?>
            <div class="fs087e p10" style="border-bottom: lightgray solid 1px">
                <table class="w3-table w3-striped mb15">
                    <thead class="bgcTH fs095e">
                    <th class="w3-border w3-border-gray" style="width: 20%">Produto</th>
                    <th class="w3-border w3-border-gray" style="width: 10%">Quantidade</th>
                    <th class="w3-border w3-border-gray" style="width: 15%">Sub-Total</th>
                    </thead>
                    <tbody class="fs087e">
                    <?php
                    $cont = 0;
                    foreach ($prods_exibir as $row) { ?>
                        <tr>
                            <td class="w3-border"><?php echo $row['prod_os']; ?></td>
                            <td class="w3-border"><?php echo $row['qtd_os']; ?></td>
                            <td class="w3-border"><?php echo $row['subvalor_os']; ?></td>
                        </tr>
                        <?php $cont++; $totalProd += $row['subvalor_os'];}?>
                    </tbody>
                </table>
            </div>
            <?php }
            $totalServ = 0;
            if($qtdServ > 0) {?>
            <div class="fs087e p10" style="border-bottom: lightgray solid 1px">
                <table class="w3-table w3-striped mb15">
                    <thead class="bgcTH fs095e">
                    <th class="w3-border w3-border-gray" style="width: 20%">Serviço</th>
                    <th class="w3-border w3-border-gray" style="width: 15%">Sub-Total</th>
                    </thead>
                    <tbody class="fs087e">
                    <?php
                    $cont = 0;
                    foreach ($servs_exibir as $row) { ?>
                    <tr>
                        <td class="w3-border"><?php echo $row['serv_os']; ?></td>
                        <td class="w3-border"><?php echo $row['preco_os']; ?></td>
                    </tr>
                    <?php $cont++; $totalServ += $row['preco_os'];}?>
                    </tbody>
                </table>
            </div>
            <?php }?>

            <div class="fs087e p10" style="border-bottom: lightgray solid 1px">
                <h1 class="fwb fs14e">Total..................................... R$ <?php echo number_format($totalServ + $totalProd, "2", ",", ".");?></h1>
            </div>
        </div>
        <!-- Final da div da OS -->
        <form action="" method="post">
            <button class="w3-btn w3-green p8 bradius mb10 mr10 ml10" name="editar" value="<?php echo $id_os;?>" type="submit"><i class="fa fa-edit"></i> Editar</button>
            <a class="w3-btn w3-teal fleft p8 bradius mb10 w3-right" name="print" target="_blank" href="gerarPDF.php?print=<?php echo base64_encode($id_os);?>"><i class="fa fa-print"></i> Imprimir</a>
        </form>
    </div>

</div>
</body>
</html>