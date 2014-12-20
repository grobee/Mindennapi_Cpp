$(document).ready(function(){
    var questionTable = $('#questions_table');
    var limit = { bottom: 0, number: 15 };
    var loadingImg = $('#loading_div');
    var nextBtn = document.getElementsByClassName('listButton')[0];
    var prevBtn = document.getElementsByClassName('listButton')[1];

    nextBtn.onclick = function(){
        limit.bottom += 15;
        loadData(questionTable);
    };

    prevBtn.onclick = function(){
        if(limit.bottom - 15 >= 0){
            limit.bottom -= 15;
            loadData(questionTable);
        }
    };

    var loadData = function(obj) {
        $.ajax({
            url: 'ReadQuestionList.php?bottom=' + limit.bottom + '&number=' + limit.number,
            type: "GET",
            cache: false,
            success: function (html) {
                loadingImg.hide();
                obj.html(html);
                setTableWidth(false);
            }
        });
    };

    var setTableWidth = function(variable){
        if(variable){
            questionTable.width('82%');
            questionTable.height(500);
            return 0;
        }
        questionTable.width('82%');
        questionTable.height('auto');
    };

    questionTable.html(loadingImg.html());
    setTableWidth(true);
    loadData(questionTable);
});
