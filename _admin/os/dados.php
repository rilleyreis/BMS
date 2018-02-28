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
    <link rel="stylesheet" href="../../_css/jquery-ui.css">

    <script type="text/javascript" src="../../_js/jquery-1.12.4.js"></script>
    <script type='text/javascript' src="../../_js/jquery-ui.js"></script>
    <script type="text/javascript" src="../../_js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="../../_js/jquery.maskMoney.js"></script>
    <script type="text/javascript" src="../../_js/masks.js"></script>

    <script>
        $(function () {
            $.getJSON("cli_os.php", function (dados) {
                var clientes = [];
                $(dados).each(function (key, value) {
                    clientes.push(value.cpf_cli + "|" + value.nome_cli);
                });
                $("#cli_os").autocomplete({
                    source: clientes
                });
            });
        });
        $(function () {
            $.getJSON("tec_os.php", function (dados1) {
                var tecnicos = [];
                $(dados1).each(function (key, value) {
                    tecnicos.push(value.id_user + "|" + value.nome_user);
                });
                $("#tec_os").autocomplete({
                    source: tecnicos
                });
            });
        });
        $(function () {
            $.getJSON("prod_os.php", function (dados2) {
                var produtos = [];
                $(dados2).each(function (key, value) {
                    produtos.push(value.id_prod + "|" + value.nome_prod + "|" + value.venda_prod + "|" + value.qtd_prod);
                });
                $("#prod_os").autocomplete({
                    source: produtos
                });
            });
        });
        $(function () {
            $.getJSON("serv_os.php", function (dados3) {
                var servicos = [];
                $(dados3).each(function (key, value) {
                    servicos.push(value.id_serv + "|" + value.nome_serv + "|" + value.preco_serv);
                });
                $("#serv_os").autocomplete({
                    source: servicos
                });
            });
        });
    </script>

    <title>BMS - Administrador</title>
</head>
<body>
<?php include 'os_dados.php';?>
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
    <p class="fs087e w3-text-gray "><a href="../../_admin/index.php" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home ></a><a href="../os" class="w3-hover-text-dark-gray ml10">OS ></a><a
            href="dados.php" class="w3-hover-text-dark-gray ml10"> Dados ></a></p>
</div>
<div class="w3-container" style="margin-left: 15%;">
    <div class="w3-card mt35">
        <header class="w3-gray fs095e w3-text-gray">
            <i class="fa fa-file-text p10" style="border-right-style: groove; border-right-color: gray"></i><?php echo $edt != "" ? " Cadastro de OS" : " Detalhes de OS";?>
            <p class="fwb w3-right p5 mr10" <?php echo $prot;?>>PROTOCOLO: <?php echo $protocolo;?></p>
        </header>
        <div class="p10">
            <div class="p8 w3-pale-green mb15" <?php echo $cad;?> id="msg">
                <span class="fs087e w3-text-light-green w3-right cp" onclick="document.getElementById('msg').style.display='none'">&times;</span>
                <p class="fs087e w3-text-light-green">OS cadastrada com sucesso, agora você pode adicionar Produtos/Serviços a ela.</p>
            </div>
            <div class="w3-bar w3-gray fs087e">
                <button id="dados_btn" class="w3-bar-item w3-button btn" onclick="openTab('dados');" style="background-color: gray; color: white;">Detalhes</button>
                <button id="product_btn" class="w3-bar-item w3-button btn" <?php echo $edt;?> onclick="openTab('product');" style="color: gray;">Produtos</button>
                <button id="service_btn" class="w3-bar-item w3-button btn" <?php echo $edt;?> onclick="openTab('service');" style="color: gray;">Serviços</button>
            </div>
            <div id="dados" class="w3-container tab w3-border w3-border-gray p10">
                <div class="p8 w3-pale-blue mt05 mb05" id="msg">
                    <p class="fs076e w3-text-blue">Todos os campos com (*) são obrigatórios!</p>
                </div>
                <form action="" method="post" class="p10">
                    <input type="text" hidden="hidden" name="id_os" id="id_os" value="<?php echo $id_os;?>">
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Cliente *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="cli_os" id="cli_os" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Cliente" value="<?php echo $cpf_cli;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Técnico *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="tec_os" id="tec_os" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Técnico" value="<?php echo $id_user;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Status *</label>
                        </div>
                        <div class="w3-rest">
                            <select name="status_os" id="" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" required>
                                <option value="" disabled selected>Selecione um Status</option>
                                <option value="orcamento" <?php echo $status_os == "orcamento" ? "selected" : "";?>>Orçamento</option>
                                <option value="aberto" <?php echo $status_os == "aberto" ? "selected" : "";?>>Aberto</option>
                                <option value="andamento" <?php echo $status_os == "andamento" ? "selected" : "";?>>Andamento</option>
                                <option value="finalizado" <?php echo $status_os == "finalizado" ? "selected" : "";?>>Finalizado</option>
                            </select>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Data Inicial *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="date" name="dtIni_os" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0; padding: 7px;" placeholder="Data Inicial" value="<?php echo $dtIni_os;?>" min="<?php date('Y-m-d')?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Data Final *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="date" name="dtFim_os" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0; padding: 7px;" placeholder="Data Final" value="<?php echo $dtFim_os;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Garantia *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="gar_os" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Garantia" value="<?php echo $gar_os;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Descrição *</label>
                        </div>
                        <div class="w3-rest">
                            <textarea rows="4" cols="150" name="desc_os" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Descrição" maxlength="300" required><?php echo $desc_os;?></textarea>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Defeito *</label>
                        </div>
                        <div class="w3-rest">
                            <textarea rows="4" cols="150" name="def_os" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Defeito" maxlength="300" required><?php echo $def_os;?></textarea>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Defeito *</label>
                        </div>
                        <div class="w3-rest">
                            <textarea rows="4" cols="150" name="obs_os" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Observações" maxlength="300" required><?php echo $obs_os;?></textarea>
                        </div>
                    </div>
                    <button class="w3-btn w3-green fleft p8 bradius mb10 mr10" name="continuar" <?php echo $add;?>><i class="fa fa-share"></i> Continuar</button>
                    <button class="w3-btn w3-green fleft p8 bradius mb10 mr10" name="salvar" <?php echo $edt;?>><i class="fa fa-edit"></i> Editar</button>
                    <a class="w3-btn w3-orange fleft p8 bradius mb10 w3-text-white mr10" href="../os"><i class="fa fa-times"></i> Cancelar</a>
                    <a class="w3-btn w3-teal fleft p8 bradius mb10 w3-right" name="print" <?php echo $edt;?> target="_blank" href="gerarPDF.php?print=<?php echo base64_encode($id_os);?>"><i class="fa fa-print"></i> Imprimir</a>
                    <button class="w3-btn w3-blue fleft p8 bradius mb10" name="fin" <?php echo $edt;?>><i class="fa fa-money"></i> Finalizar</button>
                </form>
            </div>

            <div id="product" class="w3-container tab w3-border w3-border-gray p10" style="display: none">
                <form action="" method="post" class="p10">
                    <input type="text" hidden="hidden" name="id_os" id="id_os" value="<?php echo $id_os;?>">
                    <div class="w3-row w3-left">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Produto *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="prod_os" id="prod_os" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fleft mr10 fs087e" style="border-radius: 0 6px 6px 0; width: 440px" placeholder="Produto">
                        </div>
                    </div>
                    <button class="w3-btn w3-green bradius fs087e mb10 w3-right ml10" style="padding: 8px;" name="addProd" id="addProd"><i class="fa fa-plus"></i> Adicionar</button>
                    <div class="w3-row w3-right">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Quantidade *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="qtd_os" id="qtd_os" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fleft mr10 num fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Quantidade">
                        </div>
                    </div>

                    <table class="w3-table w3-striped mb15">
                        <thead class="bgcTH fs087e">
                        <th class="w3-border w3-border-gray" style="width: 20%">Produto</th>
                        <th class="w3-border w3-border-gray" style="width: 10%">Quantidade</th>
                        <th class="w3-border w3-border-gray" style="width: 10%">Ação</th>
                        <th class="w3-border w3-border-gray" style="width: 15%">Sub-Total</th>
                        </thead>
                        <tbody class="fs087e">
                        <?php
                        $total = 0;
                        if($num_prodOS > 0) {
                            $cont = 0;
                            foreach ($prods_exibir as $row) { ?>
                                <tr>
                                    <td class="w3-border"><?php echo $row['prod_os']; ?></td>
                                    <td class="w3-border"><?php echo $row['qtd_os']; ?></td>
                                    <td class="w3-border">
                                        <button class="w3-btn w3-red mr03" name="excl" value="<?php echo $row['id_os']."|".$row['qtd_os']."|".$row['id_prod']; ?>" title="Remover"><i class="fa fa-remove"></i></button>
                                    </td>
                                    <td class="w3-border"><?php echo $row['subvalor_os']; ?></td>
                                </tr>
                                <?php $cont++; $total += $row['subvalor_os'];}}?>
                        </tbody>
                    </table>
                    <div class="w3-border w3-border-gray w3-light-gray w3-right w285 p8 mb15 fs087e" style="border-bottom-right-radius: 6px; border-top-right-radius: 6px;">
                        <p class="fwb fs095e w3-right">R$ <?php echo number_format($total, 2, ",", ".");?></p>
                    </div>
                    <div class="w3-border w3-border-gray w3-light-gray w3-left w770 p8 fs087e" style="border-bottom-left-radius: 6px; border-top-left-radius: 6px;">
                        <p class="fwb fs095e">TOTAL</p>
                    </div>
                </form>
            </div>

            <div id="service" class="w3-container tab w3-border w3-border-gray p10" style="display: none">
                <form action="" method="post" class="p10">
                    <input type="text" hidden="hidden" name="id_os" id="id_os" value="<?php echo $id_os;?>">
                    <div class="w3-row w3-left">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Serviço *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="serv_os" id="serv_os" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fleft mr10 fs087e" style="border-radius: 0 6px 6px 0; width: 730px;" placeholder="Serviço">
                        </div>
                    </div>

                    <button class="w3-btn w3-green fleft p8 bradius" style="width: 15%; height: 38px;" name="addServ">Adicionar</button>

                    <table class="w3-table w3-striped mb15">
                        <thead class="bgcTH fs095e">
                        <th class="w3-border w3-border-gray" style="width: 20%">Produto</th>
                        <th class="w3-border w3-border-gray" style="width: 10%">Ação</th>
                        <th class="w3-border w3-border-gray" style="width: 15%">Sub-Total</th>
                        </thead>
                        <tbody class="fs087e">
                        <?php
                        $total = 0;
                        if($num_servOS > 0) {
                            $cont = 0;
                            foreach ($servs_exibir as $row) { ?>
                                <tr>
                                    <td class="w3-border"><?php echo $row['serv_os']; ?></td>
                                    <td class="w3-border">
                                        <button class="w3-btn w3-red mr03" name="exclServ" value="<?php echo $row['id_os']; ?>" title="Remover"><i class="fa fa-remove"></i></button>
                                    </td>
                                    <td class="w3-border"><?php echo $row['preco_os']; ?></td>
                                </tr>
                                <?php $cont++; $total += $row['preco_os'];}}?>
                        </tbody>
                    </table>
                    <div class="w3-border w3-border-gray w3-light-gray w3-right w285 p8 mb15" style="border-bottom-right-radius: 6px; border-top-right-radius: 6px;">
                        <p class="fwb fs095e w3-right">R$ <?php echo number_format($total, 2, ",", ".");?></p>
                    </div>
                    <div class="w3-border w3-border-gray w3-light-gray w3-left w770 p8" style="border-bottom-left-radius: 6px; border-top-left-radius: 6px;">
                        <p class="fwb fs095e">TOTAL</p>
                    </div>
                </form>

        </div>
    </div>
</div>

<script>
    function openTab(tab) {
        var i;
        var x = document.getElementsByClassName("tab");
        var b = document.getElementsByClassName("btn");
        for (i = 0; i < x.length; i++){
            x[i].style.display = "none";
            b[i].style.backgroundColor = "#bbb";
            b[i].style.color = "gray";
        }
        document.getElementById(tab).style.display = "block";
        document.getElementById(tab+"_btn").style.backgroundColor = "gray";
        document.getElementById(tab+"_btn").style.color = "white";
    }
</script>

</body>
</html>