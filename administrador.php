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
    <script type="text/javascript" src="app/js/validaCPF.js"></script>

    <script>
        function cpf(object) {
            var stringCnpj = object.value.replace(/[^\d]+/g,'');
            var valido = validarCPF(stringCnpj);
            if(valido){
                document.getElementById('cpfErro').style.display = 'none';
            }else{
                object.value = "";
                document.getElementById('cpfErro').style.display = 'block';
            }
        }
        function usernameComplete() {
            var nome = document.getElementById('nome').value.toLowerCase();
            var snome = document.getElementById('snome').value.toLowerCase();
            document.getElementById('username').value = nome+"."+snome;
        }
    </script>

    <title>BMS</title>
</head>
<body>
<?php include "php/control/adm.php";?>
<div class="w3-container body" style="height: 100vh; width: 100vw;">
    <div class="w3-container bradius w850 bgcba m0a mt25 h635">
        <div class="w800 ml10 mr10 mt15 mb15 h500">
            <fieldset>
                <legend class="w100 h80 m0a tac p15" style="border: lightgray solid 1px; border-radius: 60px">
                    <i class="fas fa-user w3-xxxlarge w3-text-white"></i>
                </legend>
                <div class="p8 w3-pale-blue mb15 bradius" id="msg">
                    <p class="fs076e w3-text-blue">Antes de iniciar o uso do sistema deve-se cadastrar os dados um administrador. Todos os campos com (*) são obrigatórios!</p>
                </div>
                <div class="h450 ofa">
                    <form action="" method="post">
                        <div class="w3-pale-red mb05 bradius w3-left wfull" id="cpfErro" style="display: none; padding: 3px;">
                            <p class="fs076e w3-text-red w3-left mr10 ml30">CPF Inválido!!</p>
                            <span class="fs076e w3-text-red w3-left cp" onclick="document.getElementById('cpfErro').style.display='none'">&times;</span>
                        </div>
                        <input type="text" name="idUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10" value="" style="display: none;">
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="nomeUsuario" class="fs087e w3-text-white" style="">Nome *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" id="nome" name="nomeUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeypress="return onlyletter(event)" onkeyup="letter(this);" placeholder="Primeiro Nome" value="<?php echo $nome;?>" required>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="snomeUsuario" class="fs087e w3-text-white mt05">Sobrenome *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" id="snome" name="snomeUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onblur="usernameComplete()" onkeypress="return onlyletter(event)" onkeyup="letter(this);" placeholder="Sobrenome" value="<?php echo $snome;?>" required>
                            </div>
                        </div>

                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="cpfUsuario" class="fs087e w3-text-white mt05">CPF *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" name="cpfUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e cpf" onblur="cpf(this);" style="border-radius: 0 6px 6px 0;" placeholder="CPF" value="<?php echo $cpf;?>" required>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="telefoneUsuario" class="fs087e w3-text-white mt05">Telefone *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" name="telefoneUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e tel" style="border-radius: 0 6px 6px 0;" placeholder="Telefone" value="<?php echo $tel;?>">
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="celularUsuario" class="fs087e w3-text-white mt05">RG</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" name="rgUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" placeholder="RG" value="<?php echo $rg;?>">
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="emailUsuario" class="fs087e w3-text-white mt05">Email *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="email" name="emailUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this);" placeholder="Email" value="<?php echo $email;?>" required>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="funcUsuario" class="fs087e w3-text-white mt05">Função *</label>
                            </div>
                            <div class="w3-rest">
                                <select name="funcUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" required>
                                    <option value="admin" selected>ADMINISTRADOR</option>
                                </select>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="userUsuario" class="fs087e w3-text-white">Nome de Usuário *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" id="username" name="userUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Nome de Usuário" value="<?php echo $user;?>" required>
                            </div>
                        </div>
                        <div class="w3-row" <?php echo $add;?>>
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="senhaUsuario" class="fs087e w3-text-white mt05">Senha *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="password" name="senhaUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="16" placeholder="Senha" value="">
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">CEP *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" id="cep" name="cep" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" placeholder="CEP" value="<?php echo $cep?>" required="required">
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Rua *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" id="rua" name="ruaCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this)" maxlength="50" placeholder="Rua" value="<?php echo $rua;?>" required>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Número *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" name="numeroCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeyup="return onlynumber(event);" placeholder="Numero" value="<?php echo $num;?>" required>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Bairro *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" id="bairro" name="bairroCliente" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeyup="letter(this)" maxlength="50" placeholder="Bairro" value="<?php echo $bairro;?>" required>
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Cidade *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" id="cidade" name="cidade" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="25" placeholder="Cidade" value="<?php echo $cidade?>" required="required">
                            </div>
                        </div>
                        <div class="w3-row">
                            <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                                <label for="" class="fs087e w3-text-white" style="">Estado *</label>
                            </div>
                            <div class="w3-rest">
                                <input type="text" id="uf" name="uf" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this)" style="border-radius: 0 6px 6px 0;" maxlength="2" placeholder="Estado" value="<?php echo $uf?>" required="required">
                            </div>
                        </div>
                        <button name="adicionar" class="w3-btn w3-green w3-center fs087e bradius" type="submit"><i class="fas fa-save mr03"></i>Salva</button>
                    </form>
                </div>
            </fieldset>
        </div>
    </div>
</div>
</body>
</html>