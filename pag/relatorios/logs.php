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
<link rel="stylesheet" href="../../app/css/print.css">

<script defer src="../../app/js/fontawesome-all.min.js"></script>
<script type="text/javascript" src="../../app/js/jquery-1.12.4.js"></script>

<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php include "../../php/control/relatorios/logs.php"?>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu no-print" style="z-index:4; padding: 3px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right fwb w3-text-white">Business Manager System</span>
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Sidebar/menu -->
<?php include '../../include/admin/menu.php'?>

<!-- !PAGE CONTENT! -->
<div class="w3-main pb40 pt40" style="margin-left:300px;margin-top:43px;">

    <div class="w3-container no-print">
        <header class="w3-gray w3-row">
            <div class="w3-col p8 tac" style="width: 5%; border-right-style: groove; border-right-color: gray;">
                <i class="fas fa-filter"></i>
            </div>
            <div class="w3-col p8" style="width: 90%">
                Filtros
            </div>
        </header>
        <div class="w3-border w3-border-gray p5">
            <form method="post" action="">
                <div class="w3-row">
                    <div class="w3-half pr05">
                        <div class="w3-third w3-border w3-border-gray w3-gray" style="border-radius: 6px 0 0 6px; padding: 9px;">
                            <label for="" class="fs087e w3-text-white" style="">Data Inical</label>
                        </div>
                        <div class="w3-twothird">
                            <input type="date" name="dtIni" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;"  value="<?php echo $dtIni;?>">
                        </div>
                    </div>
                    <div class="w3-half pl05">
                        <div class="w3-third w3-border w3-border-gray w3-gray" style="border-radius: 6px 0 0 6px; padding: 9px;">
                            <label for="" class="fs087e w3-text-white" style="">Data Final</label>
                        </div>
                        <div class="w3-twothird">
                            <input type="date" name="dtFim" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;"  value="<?php echo $dtFim;?>">
                        </div>
                    </div>
                </div>
                <button class="w3-btn w3-blue-gray mt05 w3-round" name="filtrar"><i class="fas fa-filter"></i> Filtrar</button>
                <button class="w3-btn w3-deep-orange w3-text-white mt05 w3-round" name="" <?php echo $disabled;?>><i class="fas fa-times"></i> Remover Filtro</button>
            </form>
        </div>
    </div>

    <div class="w3-container mt15 no-print">
        <header class="w3-gray w3-row">
            <div class="w3-col p8 tac" style="width: 5%; border-right-style: groove; border-right-color: gray;">
                <i class="fas fa-file-medical-alt"></i>
            </div>
            <div class="w3-col p8" style="width: 90%">
                Relatório de LOG's <?php echo $filtragem;?>
            </div>
        </header>
        <div class="w3-border w3-border-gray">
            <table class="w3-table w3-striped fs087e">
                <thead class="bgcTH fs095e">
                <th class="w3-border w3-border-gray" style="width: 5%">#</th>
                <th class="w3-border w3-border-gray" style="width: 20%">Usuário</th>
                <th class="w3-border w3-border-gray" style="width: 35%">Ação</th>
                <th class="w3-border w3-border-gray" style="width: 15%">Data</th>
                <th class="w3-border w3-border-gray" style="width: 15%">Hora</th>
                </thead>
                <tbody class="fs087e">
                    <?php if($num_logs > 0){
                    foreach ($log_exibir as $row) {?>
                        <tr>
                            <td class="w3-border"><?php echo $row['id']?></td>
                            <td class="w3-border"><?php echo $row['usuario']?></td>
                            <td class="w3-border"><?php echo $row['acao']?></td>
                            <td class="w3-border"><?php echo date('d/m/Y', strtotime($row['data']));?></td>
                            <td class="w3-border"><?php echo $row['hora']?></td>
                        </tr>
                    <?php }}?>
                </tbody>
            </table>
            <?php
            if($num_logs > 0){
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
        </div>
        <button id="print" class="w3-btn w3-blue-gray w3-round mt10 no-print"><i class="fas fa-print"></i> Imprimir</button>
    </div>

    <div class="dnn p5 print">
        <div class="p5 fs087e print">
            <?php foreach ($dadosEmp as $item) {?>
                <h3 class="titulo fwb w3-center"><?php echo $item['nome'];?></h3>
                <div class="w3-center bbtsc1 pb03">
                    <p class="texto"><?php echo "CNPJ ".$item['cpf_cnpj'];?></p>
                    <p class="texto"><?php echo "TELEFONE: ".$item['tel']." --- EMAIL: ".$item['email'];?></p>
                </div>
            <?php }?>

            <div class="w3-container mt15 print">
                <header class="w3-gray w3-row w3-border w3-border-gray">
                    <div class="w3-col p8 tac" style="width: 5%; border-right-style: groove; border-right-color: gray;">
                        <i class="fas fa-file-medical-alt"></i>
                    </div>
                    <div class="w3-col p8" style="width: 90%">
                        Relatório de LOG's
                    </div>
                </header>
                <div class="w3-border w3-border-gray">
                    <table class="w3-table w3-striped fs087e">
                        <thead class="bgcTH fs095e">
                        <th class="w3-border w3-border-gray" style="width: 5%">#</th>
                        <th class="w3-border w3-border-gray" style="width: 20%">Usuário</th>
                        <th class="w3-border w3-border-gray" style="width: 35%">Ação</th>
                        <th class="w3-border w3-border-gray" style="width: 15%">Data</th>
                        <th class="w3-border w3-border-gray" style="width: 15%">Hora</th>
                        </thead>
                        <tbody class="fs087e">
                        <?php if($num_logs > 0){
                            foreach ($log_print as $row) {?>
                                <tr>
                                    <td class="w3-border"><?php echo $row['id']?></td>
                                    <td class="w3-border"><?php echo $row['usuario']?></td>
                                    <td class="w3-border"><?php echo $row['acao']?></td>
                                    <td class="w3-border"><?php echo date('d/m/Y', strtotime($row['data']));?></td>
                                    <td class="w3-border"><?php echo $row['hora']?></td>
                                </tr>
                            <?php }}?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $('#print').click(function () {
        window.print(document);
    });
</script>


</body>
</html>
