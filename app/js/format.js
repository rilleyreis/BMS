function letter(object){
    object.value = object.value.toUpperCase();
}

function onlyletter(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if(charCode > 31 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)){
        return false;
    }
    return true;
}

function onlynumber(evt) {
    evt = (evt) ? evt : event;
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0));
    if(charCode < 48 || charCode > 57){
        return false;
    }
    return true;
}