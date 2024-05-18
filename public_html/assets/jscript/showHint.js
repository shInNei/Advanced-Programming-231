// function showHint(str, fileName) {
//     if (str.length == 0) {
//         document.getElementById("suggestions").innerHTML = "";
//         return;
//     } else {
//         var xmlhttp = new XMLHttpRequest();
//         xmlhttp.onreadystatechange = function() {
//             if (this.readyState == 4 && this.status == 200) {
//                 console.log(this.responseText);
//                 var suggestions = JSON.parse(this.responseText);
//                 console.log(suggestions);
//                 var suggestionHtml = '';
//                 if (suggestions.length > 0) {
//                     suggestions.forEach(function(suggestion) {
//                         console.log(suggestion.ID);
//                         console.log(JSON.stringify(suggestion))
//                         suggestionHtml += '<span class="input-group-text"><a href="#" onclick="fillInput(' + JSON.stringify(suggestion).replace(/"/g, '\\"')+ ')">' + suggestion.ID + '</a></span>';
//                     });
//                 } else {
//                     suggestionHtml = '<span class = "input-group-text">Not found</span>';
//                 }
//                 document.getElementById("suggestions").innerHTML = suggestionHtml;
//             }
//         };
//         xmlhttp.open("GET", fileName + "?id=" + str, true);
//         xmlhttp.send();
//     }
// }
// function fillInput(jsonString) {
//     console.log(jsonString);
//     var suggestion = JSON.parse(jsonString);
//     for(var key in suggestion){
//         document.getElementById(key).value = suggestion[key];
//     }
//     document.getElementById("suggestions").innerHTML = ""; // Clear suggestions after selecting one
// }
function showHint(str, fileName,suggestID,IDname) {
    console.log(str);
    if (str.length == 0) {
        document.getElementById(suggestID).innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                try {
                    var trimJSON = this.responseText.trim()
                    var suggestions = JSON.parse(trimJSON);
                } catch (error) {
                    console.error("Error passing JSON: ",error)
                }
                ;
                console.log(suggestions);
                var suggestionHtml = '';
                if (suggestions.length > 0) {
                    suggestions.forEach(function(suggestion) {
                        console.log(suggestion[IDname]);
                        console.log(JSON.stringify(suggestion))
                        suggestionHtml += '<span class="input-group-text"><a href="#" style = "padding-right:100%;" onclick="fillInput(\'' + encodeURIComponent(JSON.stringify(suggestion)) + '\', \'' + suggestID + '\')">' + suggestion[IDname] + '</a></span>';
                    });
                } else {
                    suggestionHtml = '<span class = "input-group-text">Not found</span>';
                }
                document.getElementById(suggestID).innerHTML = suggestionHtml;
            }
        };
        xmlhttp.open("GET", fileName + "?id=" + str, true);
        xmlhttp.send();
    }
}
function fillInput(jsonString,suggestID) {
    console.log(jsonString);
    var suggestion = JSON.parse(decodeURIComponent(jsonString));
    console.log(suggestion);
    Object.entries(suggestion).forEach(([key, value]) => {
        console.log(key);
        console.log(value);
        document.getElementById(key).value = value;
    });


    document.getElementById(suggestID).innerHTML = ""; // Clear suggestions after selecting one
}
