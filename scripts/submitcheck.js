$(document).ready(function() {
    var textAreaList;

    document.getElementById("btn_submit").onclick = validation;

    textAreaList = document.getElementsByClassName("text_input");

   textAreaList[0].onfocus = function() {
        textAreaList[0].style.border = "2px solid #286C2B";
    };
    textAreaList[1].onfocus = function() {
        textAreaList[1].style.border = "2px solid #286C2B";
    };
    textAreaList[2].onfocus = function() {
        textAreaList[2].style.border = "2px solid #286C2B";
    };
    textAreaList[3].onfocus = function() {
        textAreaList[3].style.border = "2px solid #286C2B";
    };
    textAreaList[4].onfocus = function() {
        textAreaList[4].style.border = "2px solid #286C2B";
    };
    textAreaList[5].onfocus = function() {
        textAreaList[5].style.border = "2px solid #286C2B";
    };

    function validation() {
        try {
            document.getElementById('failure').hidden = true;
        }
         catch(e) {
             console.log(e.message);
         }
        textAreaList = document.getElementsByClassName("text_input");
        var failValidation = false;
        for (var i = 0; i < textAreaList.length; i++) {
            console.log(textAreaList[i]);
            if (textAreaList[i].value == "") {
                textAreaList[i].style.border = "2px solid #ff0000";
                failValidation = true;
            } else {
                textAreaList[i].style.border = "2px solid #286C2B";
            }
        }

        if (failValidation)
            return false;
    }
});


