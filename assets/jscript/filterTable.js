function filterTable(inputId, tableId, selectId) {
    var input = document.getElementById(inputId);
    var table = document.getElementById(tableId);
    var rows = table.getElementsByTagName("tr");

    input.addEventListener("keyup", function () {
        var filter = input.value.toLowerCase();
        var columnIdx = document.getElementById(selectId).value;
        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var cells = row.getElementsByTagName("td");
            var rowVisible = false;
            for (var j = 0; j < cells.length; j++) {
                var cell = cells[j];
                if (columnIdx === "all" || columnIdx === j.toString()) {
                    if (cell.innerText.toLowerCase().indexOf(filter) > -1) {
                        rowVisible = true;
                        break;
                    }
                }
            }
            row.style.display = rowVisible ? "" : "none";
        }
    });
}
