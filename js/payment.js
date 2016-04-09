// Variables

var array = ['model', 'color', 'mod', 'pay'];
var staðsetning = 0;
var targetId = undefined;

// Navigation

$(document).ready(function(){
    $('ul.tabs').tabs();
    $('#next').on('click', nextPage);
    $('#back').on('click', backPage);
    $('.slct').on('click', nextPage);
    $('.slct').on('click', function(e){
        targetId = e.target.id;
        modelSelect(targetId);
    });
});

function backPage(){
    staðsetning--;
    $('ul.tabs').tabs('select_tab', '' + array[staðsetning] + '');
}

function nextPage(){
    staðsetning++;
    $('ul.tabs').tabs('select_tab', '' + array[staðsetning] + '');
}

// MODEL SELECT+

function modelSelect(targetId){
    $('#color').html();
}

