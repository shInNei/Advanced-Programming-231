function isValidDatalistValue(idDatalist, input){
    var option = document.querySelector('#' + idDatalist + " option[value='" + input + "']");
    if(option){
        return option.value.length > 0;
    }
}