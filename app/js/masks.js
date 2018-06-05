$(document).ready(function(){
    $('.cpf').mask('999.999.999-99');
    $('.tel').mask('(99)9999-9999');
    $('.cel').mask('(99)99999-9999');
    $('.data').mask('99/99/9999');
    $('.cnpj').mask('99.999.999/9999-99');
    $('.ie').mask('999.999.999.999');
    $('.money').maskMoney({showSymbol:true, symbol:"R$ ", thousands:'.', decimal:",", reverse: true});
    $('.dinheiro').mask('00.000.000,00',{reverse: true});
    $('.cep').mask('99.999-999');
});