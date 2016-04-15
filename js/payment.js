// Variables

var array = ['model', 'color', 'mod', 'pay'];
var staðsetning = 0;
var targetId = undefined;

// Navigation

$(document).ready(function(){
    $('.slct').on('click', function(e){
        nextPage();
        targetId = e.target.id;
        modelSelect(targetId);
        $('#color').html('<div class="lowcontainer progress col s6 offset-s3"><div class="indeterminate"></div></div>');
    });
});

function toTop(){
    $('#tabs').animate({scrollTop: 0}, 500);
}

function nextPage(){
    $('ul.tabs').tabs('select_tab', 'color');
}

// MODEL SELECT+

function modelSelect(targetId){
    $.ajax({
        type: "GET",
        url: 'include/test.php',
        data: {id: targetId, action: 'getCarById'},
        dataType: 'text',
        'success': function(data) {
            $('#color').html(data['0'].image).hide();
            $('img').ready(function(){
                data = JSON.parse(data);
                console.log(data['0']);
                console.log('FYRSTA');
                $('#color').html('<div class="col s12">' +
                    '<div class="col s12">' +
                    '<h3>Volkswagen ' + data['0'].name + '</h3><h5>' + data['0'].description +'</h5>' +
                    '<h4 class="h5-price">$' + data['0'].prize +'</h4>' +
                    '<div class="col s12">' +
                    '<img class="col s12 model" src="' + data['0'].image + '">' +
                    '</div>' +
                    '<div class="button-collection">' +
                    '<button class="btn btn-flat">Yellow</button>' +
                    '<button class="btn btn-flat">Red</button>' +
                    '<button class="btn btn-flat">Green</button>' +
                    '<button class="btn btn-flat">Blue</button>' +
                    '<button class="btn btn-flat">Black</button>' +
                    '<button class="btn btn-flat">White</button>' +
                    '</div></div></div>').show();
                console.log('ANNAÐ')
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    })
}
