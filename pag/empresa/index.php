<?php
session_start();
require '../../util/config.php';
?>
<!DOCTYPE html>
<html>
<?php include '../../include/headDados.php';?>
<body class="w3-light-grey">
<?php include '../../php/control/empresa/emp_index.php'?>

<!-- Top container -->
<div class="w3-bar w3-top w3-large bgcMenu" style="z-index:4; padding: 1.5px 0px">
    <button class="w3-bar-item w3-button w3-hide-large w3-text-white w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
    <a onclick="openMenu(3)" class="cp fs10e"><span class="w3-bar-item w3-text-white w3-right">Bem-Vindo, <strong><?php echo $_SESSION['nomeUser'];?></strong> <i class="fa fa-caret-down"></i></span></a>
    <!--    <div id="menu3" class="w3-hide bgcMenu fs087e w3-right">-->
    <!--        <a href="#" class="w3-bar-item w3-button fs11e" title="Meus Dados"><i class="fa fa-user"></i></a>-->
    <!--        <a href="#" class="w3-bar-item w3-button" title="Logout"><i class="fa fa-sign-out"></i></a>-->
    <!--    </div>-->
</div>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Clique para fechar Menu" id="myOverlay"></div>

<!-- Sidebar/menu -->
<?php include '../../include/'.$_SESSION['panelUser'].'/menu.php'?>

<div class="w3-main p15" style="margin-left: 300px; margin-top: 43px;">
    <div class="w3-card mt20">
        <header class="w3-gray w3-text-gray">
            <div class="w3-row">
                <div class="w3-col tac p8" style="width: 5%; border-right-style: groove; border-right-color: gray;">
                    <i class="fas fa-building"></i>
                </div>
                <div class="w3-col p8" style="width: 65%;">
                    Dados da Empresa
                </div>
            </div>
        </header>
        <div class="p10">
                <div class="mb15 w3-row h200">
                    <div class="pl10 pr10 pt40 pb40 w3-col w3-border w3-border-gray h150" style="width: 20%; border-right: gray;">
                        <div class="h80"><img src="<?php echo $logo?>" alt="Logotipo Empresa" class="wfull hfull"></div>
                    </div>
                    <div class="pl10 pr10 pb10 w3-rest w3-border w3-border-gray h150 mb15">
                        <h1 class="fwb fs14e"><?php echo $fant?></h1>
                        <p class="fs065e">CNPJ:<?php echo $cnpj?> &mdash; IE:<?php echo $ie?></p>
                        <p class="fs065e">Razão Social: <?php echo $rsocial?></p>
                        <p class="fs065e">Rua: <?php echo $rua?>, No. <?php echo $num?> - <?php echo $bairro?></p>
                        <p class="fs065e"><?php echo $cidade?> - <?php echo $uf?> - <?php echo $cep?></p>
                        <p class="fs065e">Telefone: <?php echo $tel?><br>Email:<?php echo $email?></p><br>
                    </div>
                    <a onclick="document.getElementById('modal').style.display='block'" class="w3-btn w3-green w3-round" name="editDados" title="Editar Dados"><i class="fa fa-edit"></i> Alterar Dados</a>
                    <a onclick="document.getElementById('modalLogo').style.display='block'" class="w3-btn w3-deep-orange w3-round" name="editLogo" title="Editar Logo"><i class="fa fa-image"></i> Alterar Logo</a>
                </div>
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
                        <input type="hidden" name="idEmp" value="<?php echo $id;?>">
                        <input type="hidden" name="idEnd" value="<?php echo $idEnd;?>">
                        <input type="hidden" name="idPE" value="<?php echo $idPE;?>">
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
                            <input type="text" name="cnpj_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 cnpj fs087e" style="border-radius: 0 6px 6px 0;" onblur="cnpj(this);" placeholder="CNPJ" value="<?php echo $cnpj?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Razão Social *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="raz_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Razão Social" value="<?php echo $rsocial?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Nome Fantasia *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="fant_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" maxlength="30" placeholder="Nome Fantasia" value="<?php echo $fant;?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Inscrição Estadual</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="ie_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 ie fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" placeholder="Inscrição Estadual" value="<?php echo $ie?>">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Rua *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="rua_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="70" placeholder="Rua" value="<?php echo $rua?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Número *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="num_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0;" onkeypress="return onlynumber(event);" maxlength="4" placeholder="Número" value="<?php echo $num?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Bairro *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="bairro_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="25" placeholder="Bairro" value="<?php echo $bairro?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Cidade *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="cid_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="25" placeholder="Cidade" value="<?php echo $cidade?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Estado *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="uf_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="2" placeholder="Estado" value="<?php echo $uf?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">CEP *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="cep_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e cep" style="border-radius: 0 6px 6px 0;" placeholder="CEP" value="<?php echo $cep?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Telefone *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="text" name="tel_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 tel fs087e" style="border-radius: 0 6px 6px 0;" placeholder="Telefone" value="<?php echo $tel?>" required="required">
                        </div>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Email *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="email" name="email_emp" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" onkeyup="letter(this);" style="border-radius: 0 6px 6px 0;" maxlength="50" placeholder="Email" value="<?php echo $email?>" required="required">
                        </div>
                    </div>
                    <?php if($qtd_emp == 0){?>
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
                        <input type="submit" name="editar" class="w3-btn w3-green w3-center fs087e w3-round w3-left p8 mr10" value="Editar"></input>
                    <?php }?>
                    <a class="w3-btn w3-blue-gray w3-center fs087e w3-round w3-left p8 mb15" onclick="document.getElementById('modal').style.display='none'"><i class="fas fa-times"></i> Cancelar</a>
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
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <div class="w3-row">
                        <div class="w3-col w3-border w3-border-gray w3-gray" style="width: 145px; border-radius: 6px 0 0 6px; padding: 6.5px;">
                            <label for="" class="fs087e w3-text-white" style="">Logotipo *</label>
                        </div>
                        <div class="w3-rest">
                            <input type="file" name="arquivo" class="w3-input w3-border w3-border-gray w3-hover-border-blue bradius mb10 fs087e" style="border-radius: 0 6px 6px 0; padding: 5px" required>
                        </div>
                    </div>
                    <input type="submit" name="editarLogo" class="w3-btn w3-green w3-center fs087e w3-round w3-left p8 mr10" value="Salvar"></input>
                    <a class="w3-btn w3-blue-gray w3-center fs087e w3-round w3-left p8 mb15" onclick="document.getElementById('modalLogo').style.display='none'">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

</div>
</body>
</html>