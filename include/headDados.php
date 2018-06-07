<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="author" content="Rilley Reis">

<link rel="stylesheet" href="../../app/css/style.css">
<link rel="stylesheet" href="../../app/css/w3.css">
<!--<link rel="stylesheet" href="../../app/css/fa-svg-with-js.css">-->
<!--<link rel="stylesheet" href="../../app/css/font-awesome.css">-->

<script defer src="../../app/js/fontawesome-all.min.js"></script>
<script type="text/javascript" src="../../app/js/jquery-1.12.4.js"></script>
<script type="text/javascript" src="../../app/js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="../../app/js/jquery.maskMoney.js"></script>
<script type="text/javascript" src="../../app/js/masks.js"></script>
<script type="text/javascript" src="../../app/js/format.js"></script>
<script type="text/javascript" src="../../app/js/validaCPF.js"></script>
<script type="text/javascript" src="../../app/js/validaCNPJ.js"></script>
<script defer src="../../app/js/cep.js"></script>

<script>
    function cpf(object) {
        var stringCPF = object.value.replace(/[\.-]/g, "");
        var valido = validarCPF(stringCPF);
        if(valido){
            document.getElementById('msgErro').style.display = 'none';
            return true;
        }else{
            object.value = "";
            document.getElementById('msgErro').style.display = 'block';
            $('#cpf_cnpj').unmask();
            return false;
        }
    }

    function cnpj(object) {
        var stringCnpj = object.value.replace(/[^\d]+/g,'');
        console.log(stringCnpj);
        var valido = validarCNPJ(stringCnpj);
        if(valido){
            document.getElementById('msgErro').style.display = 'none';
            return true;
        }else{
            object.value = "";
            document.getElementById('msgErro').style.display = 'block'
            $('#cpf_cnpj').unmask();
            return false;
        }
    }

    function cliente(object) {
        var tipo = object.value;
        if(tipo.length == 11){
            if(cpf(object)){
                document.getElementById('nome').style.display = "block";
                document.getElementById('fant').style.display = "none";
                document.getElementById('snome').style.display = "block";
                document.getElementById('raz').style.display = "none";
                document.getElementById('rg').style.display = "block";
                document.getElementById('ie').style.display = "none";
                $('#cpf_cnpj').mask('999.999.999-99');
            }
        }else {
            if(cnpj(object)){
                document.getElementById('nome').style.display = "none";
                document.getElementById('fant').style.display = "block";
                document.getElementById('snome').style.display = "none";
                document.getElementById('raz').style.display = "block";
                document.getElementById('rg').style.display = "none";
                document.getElementById('ie').style.display = "block";
                $('#cpf_cnpj').mask('99.999.999/9999-99');
            }
        }
    }
</script>

<title>BMS - Business Manager System</title>
