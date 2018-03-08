$(document).ready(function(){
    $('.cpf').mask('000.000.000-00');
    $('.tel').mask('(00)0000-0000');
    $('.cel').mask('(00)00000-0000');
    $('.data').mask('00/00/0000');
    $('.cnpj').mask('00.000.000/0000-00');
    $('.ie').mask('000.000.000.000');
    $('.money').maskMoney({showSymbol:true, symbol:"R$ ", decimal:",", reverse: true});
    $('.cep').mask('00.000-000');
});