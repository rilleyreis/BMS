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
    <script type="text/javascript" src="../../app/js/validacao.js"></script>
    <script>
        function cpf(object) {
            var stringCPF = object.value.replace(/[\.-]/g, "");
            var valido = validarCPF(stringCPF);
            if(!valido){
                object.value = "";
                document.getElementById('cpfErro').className.replace(" w3-gray", " w3-red");
            }else{
                document.getElementById('cpfErro').className.replace(" w3-red", " w3-gray");
            }
        }
    </script>

    <title>BMS - Administrador</title>
</head>
<body>
<?php include '../../php/control/users/usr_dados.php';?>
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
    <div class="bgcC1 h40 pt10 pl20" style="margin-left: 15%">
        <p class="fs087e w3-text-gray "><a href="../admin.php" class="w3-hover-text-dark-gray"><i class="fa fa-home"></i> Home ></a><a href="../users" class="w3-hover-text-dark-gray ml10">Usuários ></a><a
                href="dados.php" class="w3-hover-text-dark-gray ml10"> Dados ></a></p>
    </div>
    <div class="w3-container" style="margin-left: 15%;">
        <div class="w3-card mt35">
            <header class="w3-gray fs087e w3-text-gray">
                <i class="fa fa-user p8" style="border-right-style: groove; border-right-color: gray"></i> Dados do Usuário
            </header>
            <div class="p10">
                <div class="p8 w3-pale-blue mb15" id="msg">
                    <p class="fs076e w3-text-blue">Todos os campos com (*) são obrigatórios!</p>
                </div>
                <form action="" method="post">
                    <input type="text" name="idUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10" value="<?php echo $id;?>" style="display: none;">
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="nomeUsuario" class="fs087e w3-text-white" style="">Nome *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="nomeUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="11" placeholder="Primeiro Nome" value="<?php echo $nome;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="snomeUsuario" class="fs087e w3-text-white mt05">Sobrenome *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="snomeUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Sobrenome" value="<?php echo $snome;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;" id="cpfErro">
                            <label for="cpfUsuario" class="fs087e w3-text-white mt05">CPF *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="cpfUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e cpf" onblur="cpf(this);" style="border-radius: 0 6px 6px 0;" placeholder="CPF" value="<?php echo $cpf;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="telefoneUsuario" class="fs087e w3-text-white mt05">Telefone</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="telefoneUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e tel" style="border-radius: 0 6px 6px 0;" placeholder="Telefone" value="<?php echo $tel;?>">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="celularUsuario" class="fs087e w3-text-white mt05">Celular</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="celularUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e cel" style="border-radius: 0 6px 6px 0;" placeholder="Celular" value="<?php echo $cel;?>">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="emailUsuario" class="fs087e w3-text-white mt05">Email *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="email" name="emailUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Email" value="<?php echo $email;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="funcUsuario" class="fs087e w3-text-white mt05">Função *</label>
                        </div>
                        <div class="w3-rest">
                            <select name="funcUsuario" id="" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" required>
                                <option value="" disabled selected>Selecione uma função</option>
                                <option value="admin" <?php echo $panel == "admin" ? "selected" : "";?>>Administrador</option>
                                <option value="vende" <?php echo $panel == "vende" ? "selected" : "";?>>Vendedor</option>
                                <option value="tecno" <?php echo $panel == "tecno" ? "selected" : "";?>>Técnico</option>
                            </select>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="userUsuario" class="fs087e w3-text-white">Nome de Usuário *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="userUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="10" placeholder="Nome de Usuário" value="<?php echo $user;?>" required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="senhaUsuario" class="fs087e w3-text-white mt05">Senha *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="password" name="senhaUsuario" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="16" placeholder="Senha" value="" <?php echo $add;?> required>
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="statusUsuario" class="fs087e w3-text-white mt05">Situação *</label>
                        </div>
                        <div class="w3-rest">
                            <select name="status" id="" class="w3-input w3-border w3-border-gray w3-hover-border-blue mb10 fs087e" style="border-radius: 0 6px 6px 0;" required>
                                <option value="" disabled selected>Selecione um status</option>
                                <option value="1" <?php echo $status == 1 ? "selected" : "";?>>Ativado</option>
                                <option value="0" <?php echo $status == 0 ? "selected" : "";?>>Desativado</option>
                            </select>
                        </div>
                    </div>
                    <button name="adicionar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $add;?>><i class="fa fa-save mr03"></i>Adicionar</button>
                    <button name="salvar" class="w3-btn w3-green w3-center fs087e bradius" type="submit" <?php echo $edt;?>><i class="fa fa-save mr03"></i>Salvar</button>
                    <button class="w3-btn w3-blue-gray w3-center fs087e bradius" type="reset" <?php echo $add;?>><i class="fa fa-eraser mr03"></i>Limpar</button>
                    <a class="w3-btn w3-deep-orange w3-center fs087e bradius" href="../users"><i class="fa fa-close mr03"></i>Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>