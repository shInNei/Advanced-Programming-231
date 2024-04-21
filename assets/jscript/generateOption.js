function generateSelectOptions(tableHeadID,tableID, selectID){
    var table = document.getElementById(tableID);
    var thead = document.getElementById(tableHeadID);
    var rows = document.getElementsByTagName("tr");
    var headers = thead.getElementsByTagName("th");
    console.log(table);
    var numCols = headers.length;
    console.log(numCols);
    var select = document.getElementById(selectID);

    for(var i = 0; i < numCols; i++){
        var option = document.createElement("option");
        option.value = i.toString();
        option.textContent = headers[i].textContent.toString();
        select.appendChild(option);
    }
}