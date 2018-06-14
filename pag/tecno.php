<?php
session_start();
require '../util/config.php';
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="author" content="Rilley Reis">

<link rel="stylesheet" href="../app/css/style.css">
<link rel="stylesheet" href="../app/css/w3.css">
<!--<link rel="stylesheet" href="../../app/css/fa-svg-with-js.css">-->
<!--<link rel="stylesheet" href="../../app/css/font-awesome.css">-->

<script defer src="../app/js/fontawesome-all.min.js"></script>

<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php include '../php/control/os/os_index.php'?>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu" style="z-index:4; padding: 3px 0px;">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <span class="w3-bar-item w3-right fwb w3-text-white">Business Manager System</span>
</div>


<!-- Sidebar/menu -->
<div style="margin-top: 26px">
    <?php include '../include/'.$_SESSION['panelUser'].'/menu.php'?>
</div>

<div class="w3-main p15" style="margin-left: 300px; margin-top: 43px;">
    <div class="w3-card mt20">
        <header class="w3-gray w3-text-gray">
            <div class="w3-row">
                <div class="w3-col tac p8" style="width: 5%; border-right-style: groove; border-right-color: gray;">
                    <i class="fas fa-file"></i>
                </div>
                <div class="w3-col p8" style="width: 65%;">
                    Ordem de Serviço
                </div>
            </div>
        </header>
        <div class=" pb05">
            <form action="" method="post" id="frm1">
                <table class="w3-table w3-striped fs087e">
                    <thead class="bgcTH fs095e">
                    <th class="w3-border w3-border-gray w3-center" style="width: 10%">Protocolo</th>
                    <th class="w3-border w3-border-gray" style="width: 20%">Cliente</th>
                    <th class="w3-border w3-border-gray" style="width: 10%">Contato</th>
                    <th class="w3-border w3-border-gray" style="width: 12%">Status</th>
                    <th class="w3-border w3-border-gray" style="width: 10%">Valor R$</th>
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
                                <td class="w3-border">
                                    <?php
                                    switch ($row['status']){
                                        case 2: echo "ABERTO"; break;
                                        case 3: echo "ORÇADO"; break;
                                        case 4: echo "APROVADO"; break;
                                        case 5: echo "CONCLUÍDO"; break;
                                        case 6: echo "FINALIZADO"; break;
                                        case 7: echo "CANCELADO"; break;
                                    }
                                    ?>
                                </td>
                                <td class="w3-border"><?php echo $row['valor']?></td>
                                <td class="w3-border">
                                    <div class="w3-row">
                                        <div class="w3-quarter">
                                            <a class="w3-btn w3-blue" href="os/view.php?id=<?php echo base64_encode($row['id']);?>" title="Visualizar"><i class="fas fa-eye"></i></a>
                                        </div>
                                        <?php if($row['status'] < 6){ ?>
                                            <div class="w3-quarter">
                                                <button class="w3-btn w3-green" name="sel" value="<?php echo $row['id'];?>" title="Editar"><i class="fas fa-edit"></i></button>
                                            </div>
                                        <?php } ?>
                                        <div class="w3-quarter">
                                            <a class="w3-btn w3-blue-gray" name="print" href="os/view.php?id=<?php echo base64_encode($row['id']);?>&print" title="Imprimir"><i class="fas fa-print"></i></a>
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