$(document).ready(function(){
    var questionTable = $('#questions_table');
    var numOfRows = 0;
    var limit = { bottom: 0, number: 15 };
    var loadingImg = $('#loading_div');
    var nextBtn = document.getElementsByClassName('listButton')[1];
    var prevBtn = document.getElementsByClassName('listButton')[0];

    var initFunction = function(){
        questionTable.html(loadingImg.html());
        setTableWidth(true);

        loadNumOfRows(-15, prevBtn);
        loadNumOfRows(15, nextBtn);

        loadData(questionTable);
    };

    nextBtn.onclick = function(){
        limit.bottom += limit.number;
        questionTable.html(loadingImg.html());
        setTableWidth(true);

        loadNumOfRows(15, nextBtn);
        loadNumOfRows(-15, prevBtn);

        loadData(questionTable);
    };

    prevBtn.onclick = function(){
        if(limit.bottom - limit.number >= 0){
            limit.bottom -= limit.number;
            questionTable.html(loadingImg.html());
            setTableWidth(true);

            loadNumOfRows(-15, prevBtn);
            loadNumOfRows(+15, nextBtn);

            loadData(questionTable);
        }
    };

    var loadData = function(obj) {
        $.ajax({
            url: 'ReadQuestionList.php?bottom=' + limit.bottom + '&number=' + limit.number,
            type: "GET",
            cache: false,
            success: function (html) {
                obj.html(html);
                setTableWidth(false);
            }
        });
    };

    var setTableWidth = function(variable){
        if(variable){
            questionTable.width('auto');
            questionTable.height(250);
            return 0;
        }

        questionTable.width('auto');
        questionTable.height('auto');
    };

    var loadNumOfRows = function(offset, obj){
        offset = limit.bottom + offset;

        $.ajax({
            url: "php/GetNumOfRows.php?bottom=" + offset + "&number=" + limit.number + "&type=answers",
            type: "GET",
            cache: false,
            success: function(html){
                numOfRows = html;
                setButtonVisibility(obj);
            }
        });
    };

    var setButtonVisibility = function(obj){
        if(numOfRows == 0) {
            if(obj == nextBtn)
                nextBtn.style.display = "none";

            if(obj == prevBtn)
                prevBtn.style.display = "none";
        }
        else {
            if(obj == nextBtn)
                nextBtn.style.display = "inline-block";

            if(obj == prevBtn)
                prevBtn.style.display = "inline-block";
        }
    };

    questionTable.html(loadingImg.html());
    setTableWidth(true);
    initFunction();
});
