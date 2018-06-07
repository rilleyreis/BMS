<?php
    date_default_timezone_set("America/Sao_Paulo");
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Rilley Reis">

    <link rel="stylesheet" href="app/css/style.css">
    <link rel="stylesheet" href="app/css/w3.css">
    <!--<link rel="stylesheet" href="app/css/fa-svg-with-js.css">-->
    <!--<link rel="stylesheet" href="app/css/font-awesome.css">-->

    <script defer src="app/js/fontawesome-all.min.js"></script>

    <script type="text/javascript" src="app/js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="app/js/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="app/js/jquery.maskMoney.js"></script>
    <script type="text/javascript" src="app/js/masks.js"></script>
    <script type="text/javascript" src="app/js/format.js"></script>
    <script type="text/javascript" src="app/js/cep.js"></script>
    <script type="text/javascript" src="app/js/validaCNPJ.js"></script>

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

    <title>BMS</title>
</head>
<body>
<?php include "php/control/emitente.php";?>
<div class="w3-container body" style="height: 100vh; width: 100vw;">
    <div class="w3-container bradius w850 bgcba m0a mt25 h635">
        <div class="w800 ml10 mr10 mt15 mb15 h500">
            <fieldset>
                <legend class="w100 h80 m0a tac p15" style="border: lightgray solid 1px; border-radius: 60px">
                    <i class="fas fa-building w3-xxxlarge w3-text-white"></i>
                </legend>
                <div class="p8 w3-pale-blue mb15 bradius" id="msg">
                    <p class="fs076e w3-text-blue">Antes de iniciar o uso do sistema deve-se cadastrar os dados do emitente. Todos os campos com (*) são obrigatórios!</p>
                </div>
                <div class="h450 ofa">
                    <form action="" method="post" enctype="multipart/form-data">
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
                                <input type="text" name="fant_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this);" maxlength="30" placeholder="Nome Fantasia" value="" required="required">
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Inscrição Estadual</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" name="ie_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 ie fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" placeholder="Inscrição Estadual" value="">
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">CEP *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" name="cep_emp" id="cep" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" placeholder="CEP" value="" required="required">
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Rua *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" name="rua_emp" id="rua" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="70" placeholder="Rua" value="" required="required">
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
                                <input type="text" name="bairro_emp" id="bairro" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="25" placeholder="Bairro" value="" required="required">
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Cidade *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" name="cid_emp" id="cidade" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="25" placeholder="Cidade" value="" required="required">
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Estado *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" name="uf_emp" id="uf" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="2" placeholder="Estado" value="" required="required">
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
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Logotipo *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="file" name="arquivo" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0; padding: 5px" required>
                            </div>
                        </div>
                        <input type="submit" name="adicionar" class="w3-btn w3-green w3-center fs087e w3-round w3-left p8 mr10" value="Salvar"></input>
                    </form>
                </div>
            </fieldset>
        </div>
    </div>
</div>
</body>
</html>