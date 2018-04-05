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
    <link rel="stylesheet" href="../../app/css/jquery-ui.css">

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
        })
    </script>


    <title>BMS - Administrador</title>
</head>
<body>
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
<div class="bgcC1 h40 pt10 pl20 fs087e" style="margin-left: 15%">
    <p class="fs087e w3-text-gray "><a href="../admin.php" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home ></a><a href="../os" class="w3-hover-text-dark-gray ml10">OS ></a><a
            href="dados.php" class="w3-hover-text-dark-gray ml10"> Dados ></a></p>
</div>
<div class="w3-container" style="margin-left: 15%;">
    <div class="w3-card mt35">
        <header class="w3-gray fs095e w3-text-gray fs095e">
            <i class="fa fa-file-text p10" style="border-right-style: groove; border-right-color: gray"></i> Dados OS
        </header>
        <div class="p10">
            <div>
                <div class="w3-row dib w500 mr50">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Protocolo</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="protocolo" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Protocolo" value="" required>
                    </div>
                </div>
                <div class="w3-row dib w500 ml50">
                    <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 100px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                        <label for="" class="fs087e w3-text-white" style="">Vendedor</label>
                    </div>
                    <div class="w3-rest">
                        <input type="text" name="vendedor" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Vendedor" value="" required>
                    </div>
                </div>
                <div class="mb10">
                    <header class="w3-gray w3-text-gray fs095e">
                        <i class="fa fa-file-text p10 tac" style="border-right-style: groove; border-right-color: gray;"></i> Status da OS
                        <i id="down" class="fa fa-angle-double-down p10 tac w3-right cp fs095e" style="border-left-style: groove; border-left-color: gray;"></i>
                        <i id="up" class="fa fa-angle-double-up p10 tac w3-right cp fs095e" style="border-left-style: groove; border-left-color: gray;"></i>
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
                    <header class="w3-gray w3-text-gray fs095e">
                        <i class="fa fa-file-text p10 tac" style="border-right-style: groove; border-right-color: gray;"></i> Serviços a Fazer
                    </header>
                    <div class="w3-border w3-border-gray p10" id="service">
                        <div class="w3-row mt10">
                            <button name="adicionarS" class="w3-btn w3-green w3-center fs087e bradius w200 w3-right" style="padding: 8px;" type="submit"><i class="fa fa-plus"></i> Adicionar</button>
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 150px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Serviço </label>
                            </div>
                            <div class="w3-rest" style="width: 700px;">
                                <input type="text" name="servico" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this);" maxlength="30" placeholder="Servico" value="" readonly>
                            </div>
                        </div>
                    </div>
                </div>

<!--                Produto-->
                <div class="mb10">
                    <header class="w3-gray w3-text-gray fs095e">
                        <i class="fa fa-file-text p10 tac" style="border-right-style: groove; border-right-color: gray;"></i> Produtos a Utilizar
                    </header>
                    <div class="w3-border w3-border-gray p10" id="produto">
                        <div class="w3-row mt10">
                            <button name="adicionarS" class="w3-btn w3-green w3-center fs087e bradius w200 w3-right" style="padding: 8px;" type="submit"><i class="fa fa-plus"></i> Adicionar</button>
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 150px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Produto </label>
                            </div>
                            <div class="w3-rest" style="width: 700px;">
                                <input type="text" name="Produto" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius fs087e mb10" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this);" maxlength="30" placeholder="Produto" value="" readonly>
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