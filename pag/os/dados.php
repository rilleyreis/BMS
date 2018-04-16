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
<link rel="stylesheet" href="../../app/css/jquery-ui.css">
<!--<link rel="stylesheet" href="../../app/css/fa-svg-with-js.css">-->
<!--<link rel="stylesheet" href="../../app/css/font-awesome.css">-->

<script defer src="../../app/js/fontawesome-all.min.js"></script>
<script type="text/javascript" src="../../app/js/jquery-1.12.4.js"></script>
<script type='text/javascript' src="../../app/js/jquery-ui.js"></script>
<script type="text/javascript" src="../../app/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="../../app/js/jquery.maskMoney.js"></script>
<script type="text/javascript" src="../../app/js/masks.js"></script>

<script>
    $(document).ready(function () {
        $("#up").hide();
        $("#down").click(function () {
            $("#status").slideDown("slow");
            $("#down").hide();
            $("#up").show();
        });
        $("#up").click(function () {
            $("#status").slideUp("slow");
            $("#down").show();
            $("#up").hide();
        });
    });
</script>

<title>BMS - Business Manager System</title>

<body class="w3-light-grey">
<?php //include '../../php/control/produto/prod_index.php'?>

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
    <div class="w3-card mt35">
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
        <div class="p10">
            <div>
                <div class="w3-row">
                    <div class="w3-half">
                        <div class="w3-row">
                            <div class="w3-third w3-col w3-border w3-border-gray w3-gray" style="border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Protocolo</label>
                            </div>
                            <div class="w3-twothird">
                                <input type="text" name="protocolo" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Protocolo" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="w3-half">
                        <div class="w3-row">
                            <div class="w3-third w3-col w3-border w3-border-gray w3-gray" style="border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Vendedor</label>
                            </div>
                            <div class="w3-twothird">
                                <input type="text" name="vendedor" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Vendedor" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb10">
                    <header class="w3-gray w3-text-gray fs095e">
                        <div class="w3-row">
                            <div class="w3-col tac p8" style="width:5%; border-right-style: groove; border-right-color: gray;">
                                <i class="fas fa-file"></i>
                            </div>
                            <div class="w3-col p8" style="width: 90%;">
                                Status da OS
                            </div>
                            <div class="w3-col tac p8" style="width: 5%;border-left-style: groove; border-left-color: gray;">
                                <i id="down" class="fas fa-angle-double-down cp fs095e"></i>
                                <i id="up" class="fas fa-angle-double-up cp fs095e"></i>
                            </div>
                        </div>
                    </header>
                   <div class="w3-border w3-border-gray p10 dnn" id="status">
                       <div class="w3-row mt10">
                           <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 300px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                               <label for="" class="fs087e w3-text-white" style="">Orçado</label>
                           </div>
                           <div class="w3-col" style="width: 450px; border-radius: 6px 0 0 6px;">
                               <input type="text" name="dataO" class="w3-input w3-border w3-border-gray w3-hover-border-blue fs087e mb10" onkeyup="letter(this);" maxlength="30" placeholder="Data" value="" readonly>
                           </div>
                           <div class="w3-rest">
                               <input type="text" name="horaO" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Hora" value="" readonly>
                           </div>
                       </div>
                       <div class="w3-row">
                           <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 300px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                               <label for="" class="fs087e w3-text-white" style="">Aprovado</label>
                           </div>
                           <div class="w3-col w450" style="width: 450px;">
                               <input type="text" name="dataAp" class="w3-input w3-border w3-border-gray w3-hover-border-blue fs087e mb10" onkeyup="letter(this);" maxlength="30" placeholder="Data" value="" readonly>
                           </div>
                           <div class="w3-rest">
                               <input type="text" name="horaAp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Hora" value="" readonly>
                           </div>
                       </div>
                       <div class="w3-row">
                           <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 300px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                               <label for="" class="fs087e w3-text-white" style="">Realizado</label>
                           </div>
                           <div class="w3-col w450" style="width: 450px;">
                               <input type="text" name="dataRz" class="w3-input w3-border w3-border-gray w3-hover-border-blue fs087e mb10" onkeyup="letter(this);" maxlength="30" placeholder="Data" value="" readonly>
                           </div>
                           <div class="w3-rest">
                               <input type="text" name="horaRz" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Hora" value="" readonly>
                           </div>
                       </div>
                       <div class="w3-row">
                           <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 300px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                               <label for="" class="fs087e w3-text-white" style="">Retirado</label>
                           </div>
                           <div class="w3-col w450" style="width: 450px;">
                               <input type="text" name="dataRt" class="w3-input w3-border w3-border-gray w3-hover-border-blue fs087e mb10" onkeyup="letter(this);" maxlength="30" placeholder="Data" value="" readonly>
                           </div>
                           <div class="w3-rest">
                               <input type="text" name="horaRt" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Hora" value="" readonly>
                           </div>
                       </div>
                   </div>
                </div>


                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px">
                        <label for="" class="fs087e w3-text-white" style="">Cliente *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="cliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Cliente" value="" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px">
                        <label for="" class="fs087e w3-text-white" style="">Telefone *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="telCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Telefone" value="" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px">
                        <label for="" class="fs087e w3-text-white" style="">Técnico *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="tecnico" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Técnico" value="" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px">
                        <label for="" class="fs087e w3-text-white" style="">Responsável</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="responsavel" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Responsável" value="" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px">
                        <label for="" class="fs087e w3-text-white" style="">Objeto Recebido *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="objeto" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Objeto Recebido" value="" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px">
                        <label for="" class="fs087e w3-text-white" style="">Itens Deixados</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="itens" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Itens Deixados" value="" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px">
                        <label for="" class="fs087e w3-text-white" style="">Defeitos Listados *</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="defeitos" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Defeitos Listados" value="" required>
                    </div>
                </div>
                <div class="w3-row">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px">
                        <label for="" class="fs087e w3-text-white" style="">Status *</label>
                    </div>
                    <div class="w3-rest">
                        <select name="status" id="" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;">
                            <option value="aberto">ABERTO</option>
                            <option value="orcado">ORÇAMENTO</option>
                            <option value="aprova">APROVADO</option>
                            <option value="realiza">REALIZADO</option>
                            <option value="retira">RETIRADO</option>
                        </select>
                    </div>
                </div>
<!--                Serviço-->
                <div class="mb10">
                    <header class="w3-gray w3-text-gray">
                        <div class="w3-row">
                            <div class="w3-col tac p8" style="width: 5%; border-right-style: groove; border-right-color: gray;">
                                <i class="fas fa-file"></i>
                            </div>
                            <div class="w3-col p8" style="width: 65%;">
                                Serviço a Fazer
                            </div>
                        </div>
                    </header>
                    <div class="w3-border w3-border-gray p10" id="service">
                        <div class="w3-row mt10 wfull">
                            <div class="w3-quarter w3-border w3-border-gray w3-gray" style="border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white">Serviço </label>
                            </div>
                            <div class="w3-half">
                                <input type="text" name="servicoOS" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this);" maxlength="30" placeholder="Produto" value="" readonly>
                            </div>
                            <div class="w3-quarter">
                                <button name="adicionarS" class="w3-btn w3-green fs087e bradius" style="padding: 8px;" type="submit"><i class="fa fa-plus"></i> Adicionar</button>
                            </div>
                        </div>
                    </div>
                </div>

<!--                Produto-->
                <div class="mb10">
                    <header class="w3-gray w3-text-gray">
                        <div class="w3-row">
                            <div class="w3-col tac p8" style="width: 5%; border-right-style: groove; border-right-color: gray;">
                                <i class="fas fa-file"></i>
                            </div>
                            <div class="w3-col p8" style="width: 65%;">
                                Produtos a Utilizar
                            </div>
                        </div>
                    </header>
                    <div class="w3-border w3-border-gray p10 wfull" id="produto">
                        <div class="w3-row mt10 wfull">
                            <div class="w3-quarter w3-border w3-border-gray w3-gray" style="border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white">Produto </label>
                            </div>
                            <div class="w3-half">
                                <input type="text" name="produtoOS" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this);" maxlength="30" placeholder="Produto" value="" readonly>
                            </div>
                            <div class="w3-quarter">
                                <button name="adicionarP" class="w3-btn w3-green fs087e bradius" style="padding: 8px;" type="submit"><i class="fa fa-plus"></i> Adicionar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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