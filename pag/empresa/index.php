<?php
    require '../../util/config.php';
?>
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


    <script type="text/javascript" src="../../app/js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="../../app/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="../../app/js/masks.js"></script>
    <script type="text/javascript" src="../../app/js/validaCNPJ.js"></script>
    <script type="text/javascript" src="../../app/js/format.js"></script>
    <script>
        function cnpj(object) {
            var stringCnpj = object.value.replace(/[^\d]+/g,'');
            var valido = validarCNPJ(stringCnpj);
            if(valido){
                document.getElementById('cnpjErro').style.display = 'none';
            }else{
                object.value = "";
                document.getElementById('cnpjErro').style.display = 'block';
            }
        }
    </script>

    <title>BMS - Administrador</title>
</head>
<body>
<nav class="w3-sidebar hfull" style="width: 15%">
    <?php
        $path = "../../include/admin/menu.php";
        include $path;
    ?>
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
    <p class="fs087e w3-text-gray "><a href="../admin.php" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home > </a><a href="" class="w3-hover-text-dark-gray ml10">Empresa ></a></p>
</div>
<div class="w3-container" style="margin-left: 15%;">
    <div class="w3-card mt20">
        <header class="w3-gray w3-text-gray">
            <i class="fa fa-building p10" style="border-right-style: groove; border-right-color: gray"></i> Dados Empresa
        </header>
        <div class="p10">
            <?php if(1){?>
                <div class="p8 w3-pale-red mb15">
                    <p class="fs087e fcred">Nenhum cadastro foi realizado até o momento. Os dados cadastrados estarão disponíveis na impressão da OS.</p>
                </div>
                <a onclick="document.getElementById('modal').style.display='block'" class="w3-btn w3-green w3-round" name="cad" title="Cadastrar"><i class="fa fa-plus"></i> Cadastrar</a>
            <?php }else{?>
                <div class="mb15 w3-row h200">
                    <div class="pl10 pr10 pt40 pb40 w3-col w3-border w3-border-gray h150" style="width: 20%; border-right: gray;">
                        <div class="h80"><img src="" alt="" class="wfull hfull"></div>
                    </div>
                    <div class="pl10 pr10 pb10 w3-rest w3-border w3-border-gray h150 mb15">
                        <h1 class="fwb fs14e"></h1>
                        <p class="fs065e">CNPJ: &mdash; IE:</p>
                        <p class="fs065e">Razão Social: </p>
                        <p class="fs065e">Rua: , No.  - </p>
                        <p class="fs065e"> -  - </p>
                        <p class="fs065e">Telefone: <br>Email:</p><br>
                    </div>
                    <a onclick="document.getElementById('modal').style.display='block'" class="w3-btn w3-green w3-round" name="editDados" title="Editar Dados"><i class="fa fa-edit"></i> Alterar Dados</a>
                    <a onclick="document.getElementById('modalLogo').style.display='block'" class="w3-btn w3-deep-orange w3-round" name="editLogo" title="Editar Logo"><i class="fa fa-image"></i> Alterar Logo</a>
                </div>

            <?php }?>
        </div>
    </div>

    <div id="modal" class="w3-modal" style="overflow: hidden;">
        <div class="w3-modal-content w3-animate-top w3-center" style="margin-top: -30px;">
            <header class="w3-container w3-gray mb05">
                <span onclick="document.getElementById('modal').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <h4>Cadastro Empresa</h4>
            </header>
            <div class="w3-container h450" style="overflow: auto;">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="p8 w3-pale-blue mb15 bradius w3-left-align" id="msg">
                        <p class="fs076e w3-text-blue">Todos os campos com (*) são obrigatórios!</p>
                    </div>
                    <div class="w3-pale-red mb05 bradius" id="cnpjErro" style="display: none; padding: 3px;">
                        <span class="fs076e w3-text-red w3-right cp" onclick="document.getElementById('cnpjErro').style.display='none'">&times;</span>
                        <p class="fs076e w3-text-red">CNPJ Inválido!!</p>
                    </div>
                    <input type="text" hidden="hidden" value="" name="endereco">
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">CNPJ *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="cnpj_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 cnpj fs087e" style="border-radius: 0 6px 6px 0;" onblur="cnpj(this);" placeholder="CNPJ" value="" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Razão Social *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="raz_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Razão Social" value="" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Nome Fantasia *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="fant_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Nome Fantasia" value="" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Inscrição Estadual*</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="ie_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 ie fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" placeholder="Inscrição Estadual" value="" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Rua *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="rua_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="70" placeholder="Rua" value="" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Número *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="num_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeypress="return onlynumber(event);" maxlength="4" placeholder="Número" value="" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Bairro *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="bairro_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="25" placeholder="Bairro" value="" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Cidade *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="cid_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="25" placeholder="Cidade" value="" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Estado *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="est_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="2" placeholder="Estado" value="" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">CEP *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="cep_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e cep" style="border-radius: 0 6px 6px 0;" placeholder="CEP" value="" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Telefone *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="tel_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 tel fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Telefone" value="" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Email *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="email" name="email_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Email" value="" required="required">
                        </div>
                    </div>
                    <?php if(1){?>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Logotipo *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="file" name="arquivo" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0; padding: 5px" required>
                        </div>
                    </div>

                    <input type="submit" name="adicionar" class="w3-btn w3-green w3-center fs087e w3-round w3-left p8 mr10" value="Salvar"></input>
                    <?php }else{?>
                        <input type="submit" name="salvarDados" class="w3-btn w3-green w3-center fs087e w3-round w3-left p8 mr10" value="Editar"></input>
                    <?php }?>
                    <a class="w3-btn w3-blue-gray w3-center fs087e w3-round w3-left p8 mb15" onclick="document.getElementById('modal').style.display='none'"><i class="fa fa-close"></i> Cancelar</a>
                </form>
            </div>
        </div>
    </div>

    <div id="modalLogo" class="w3-modal" style="overflow: hidden;">
        <div class="w3-modal-content w3-animate-top w3-center" style="width: 400px;">
            <header class="w3-container w3-gray mb05">
                <span onclick="document.getElementById('modalLogo').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <h4>Alterar Logo</h4>
            </header>
            <div class="w3-container" >
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" name="cnpj_emp" hidden value="">
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Logotipo *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="file" name="arquivo" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0; padding: 5px" required>
                        </div>
                    </div>
                    <input type="submit" name="salvarLogo" class="w3-btn w3-green w3-center fs087e w3-round w3-left p8 mr10" value="Salvar"></input>
                    <a class="w3-btn w3-blue-gray w3-center fs087e w3-round w3-left p8 mb15" onclick="document.getElementById('modalLogo').style.display='none'">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

</div>
</body>
</html>