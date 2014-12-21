$(document).ready(function(){
    var questionTable = $('#questions_table');
    var numOfRows = 0;
    var firstTime = true;
    var limit = { bottom: 0, number: 15 };
    var loadingImg = $('#loading_div');
    var nextBtn = document.getElementsByClassName('listButton')[0];
    var prevBtn = document.getElementsByClassName('listButton')[1];

    var initFunction = function(){
        questionTable.html(loadingImg.html());
        setTableWidth(true);

        loadNumOfRows(0);
        loadData(questionTable);
    };

    nextBtn.onclick = function(){
        limit.bottom += limit.number;
        questionTable.html(loadingImg.html());
        setTableWidth(true);

        loadNumOfRows(0);

        loadData(questionTable);
    };

    prevBtn.onclick = function(){
        if(limit.bottom - limit.number >= 0){
            limit.bottom -= limit.number;
            questionTable.html(loadingImg.html());
            setTableWidth(true);

            loadNumOfRows(-15);
            loadData(questionTable);
        }

        if(limit.bottom - limit.number * 2 <= 0) prevBtn.style.display = "none";
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
            questionTable.height(500);
            return 0;
        }
        questionTable.width('auto');
        questionTable.height('auto');
    };

    var loadNumOfRows = function(offset){
        offset = limit.bottom + limit.number + offset;

        if(offset == 0) numOfRows = 0;
        else{
            $.ajax({
                url: "php/GetNumOfRows.php?bottom=" + offset + "&number=" + limit.number + "&type=questions",
                type: "GET",
                cache: false,
                success: function(html){
                    numOfRows = html;
                    setButtonVisibility();
                }
            });
        }
    };

    var setButtonVisibility = function(){
        if(numOfRows == 0) {
            nextBtn.style.display = "none";
        }
        else {
            nextBtn.style.display = "inline-block";
            prevBtn.style.display = "inline-block";
        }

        if(firstTime) {
            prevBtn.style.display = "none";
            firstTime = false;
        }
    };

    questionTable.html(loadingImg.html());
    setTableWidth(true);
    initFunction();
});
