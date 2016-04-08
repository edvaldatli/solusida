var array = ['model', 'color', 'mod', 'pay'];
var teljari = 0;
var next = document.getElementById('next');
var back = document.getElementById('back');
var tabs = document.getElementById('tabs');

$(document).ready(function(){
    $('ul.tabs').tabs();
    $('ul.tabs').tabs('select_tab', 'trggr-color');
});

$('#next').on('click', function(){
    teljari++;
    $('ul.tabs').tabs('select_tab', "'" + array[teljari] + "'");
    $('#tabs').tabs('select_tab', 'trggr-color');
});

$('#back').on('click', function(){
    teljari--;
    window.location.href='#' + array[teljari] + '';
});