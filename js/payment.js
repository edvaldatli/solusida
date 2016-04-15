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
    $('')
});

function toTop(){
    $('#tabs').animate({scrollTop: 0}, 500);
}

function nextPage(){
    $('ul.tabs').tabs('select_tab', 'color');
}

// MODEL SELECT

function modelSelect(targetId){
    $.ajax({
        type: "GET",
        url: 'include/ajax.php',
        data: {id: targetId, action: 'getCarById', action2: 'getColors'},
        dataType: 'text',
        'success': function(data){

            $(document).ready(function(){
                console.log(data);
                console.log(data[0]);
                data = JSON.parse(data[0]);

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
                    '</div></div></div>');
                console.log('ANNAÐ')
                });
            paymentLoad(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    })
}

function paymentLoad(data){
    $('#pay').html('' +
        '<div class="payreview col s12 m5 right">' +
        '<table><thead><tr>' +
        '<th data-field="item">Item Name</th>' +
        '<th data-field="price">Price</th>' +
        '</tr></thead>' +
        '<tbody>' +
        '<tr>' +
        '<td>Volkswagen ' + data['0'].name + '</td>' +
        '<td>$' + data['0'].prize + '</td>' +
        '</tr>' +
        '</tbody>' +
        '</table>' +
        '</div>' +
        '<form class="col s12 m7">' +
        '<div class="row">' +
        '<div class="input-field col s12 m6">' +
        '<input id="first_name" type="text" class="validate">' +
        '<label for="first_name">First Name</label>' +
        '</div>' +
        '<div class="input-field col s12 m6">' +
        '<input id="last_name" type="text" class="validate">' +
        '<label for="last_name">Last Name</label>' +
        '</div>' +
        '<div class="input-field col s8 m10">' +
        '<input id="card_number" type="text" class="validate">' +
        '<label for="card_number">Card Number</label>' +
        '</div>' +
        '<div class="input-field col s4 m2">' +
        '<input id="ccv" type="text" class="validate">' +
        '<label for="ccv">CCV</label>' +
        '</div>' +
        '</div>' +
        '</form>');


}


