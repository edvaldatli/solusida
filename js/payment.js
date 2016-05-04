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
                    '<div class="button-collection">' +
                    '<button class="btn yellow colorselect col s1 offset-s1"></button>' +
                    '<button class="btn red colorselect col s1 offset-s1"></button>' +
                    '<button class="btn green colorselect col s1 offset-s1"></button>' +
                    '<button class="btn blue colorselect col s1 offset-s1"></button>' +
                    '<button class="btn black colorselect col s1 offset-s1"></button>' +
                    '<button class="btn white colorselect col s1 offset-s1"></button>' +
                    '</div>' +
                    '<div class="col s12">' +
                    '<img class="col s12 model" src="' + data['0'].image + '">' +
                    '</div></div></div>').show();
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
        '<form class="col s12 m7" method="post" id="payform">' +
        '<div class="row">' +
        '<div class="input-field col s6">' +
        '<input name="first_name" id="first_name" type="text" class="validate">' +
        '<label for="first_name">First Name</label>' +
        '</div>' +
        '<div class="input-field col s6">' +
        '<input name="last_name" id="last_name" type="text" class="validate">' +
        '<label for="last_name">Last Name</label>' +
        '</div>' +
        '<div class="input-field col s12">' +
        '<input name="email" id="email" type="text" class="validate">' +
        '<label for="email">E-mail Address</label>' +
        '</div>' +
        '<div class="input-field col s10">' +
        '<input name="card_number" id="card_number" type="text" class="validate">' +
        '<label for="card_number">Card Number</label>' +
        '</div>' +
        '<div class="input-field col s2">' +
        '<input name="ccv" id="ccv" type="text" class="validate">' +
        '<label for="ccv">CCV</label>' +
        '</div>' +
        '<div class="input-field col s10">' +
        '<input name="address" id="address" type="text" class="validate">' +
        '<label for="address">Address</label>' +
        '</div>' +
        '<div class="input-field col s2">' +
        '<input name="zip" id="zip" type="text" class="validate">' +
        '<label for="zip">Zip code</label>' +
        '</div>' +
        '<button class="btn btn-flat right submitbtn" type="submit">Order</button>' +
        '</div>' +
        '</form>');
    $('.submitbtn').on('click', function(e){
        e.preventDefault();
        console.log($('#payform').serialize())
        $.ajax({
            type: "POST",
            url: 'include/postOrder.php',
            data: "first_name: " +  + "",
            'success': function(data) {
                alert("Your order has been taken!");
                alert(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        })
    });
}




