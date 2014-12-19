$(document).ready(function(){
    var questionTable = $('#questions_table');
    var limit = { bottom: 0, number: 15 };
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

    var loadData = function(obj){
        obj.load('ReadQuestionList.php?bottom=' + limit.bottom + '&number=' + limit.number);
    };

    loadData(questionTable);
});
