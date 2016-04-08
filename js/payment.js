var array = ['model', 'color', 'mod', 'pay'];
var staðsetning = 0;

$(document).ready(function(){
    $('ul.tabs').tabs();
    $('#next').on('click', nextPage);
    $('#back').on('click', backPage);
});

function backPage(){
    staðsetning--;
    $('ul.tabs').tabs('select_tab', '' + array[staðsetning] + '');
}

function nextPage(){
    staðsetning++;
    $('ul.tabs').tabs('select_tab', '' + array[staðsetning] + '');
}