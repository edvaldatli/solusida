var input;
var output;
var patt;


$('#username-reg').blur(function (){
    input = $('#username-reg').val().trim();
    patt = /^[a-zA-Z0-9_-]*$/.test(input);

    if(input == "" || input == null){
        Materialize.toast('You must type your username', 4000, 'red');
    }
    else if(input > 6){
        Materialize.toast('Your username must be longer than 6 characters', 4000, 'red');
        $('#username-reg').addClass('invalid');
    }
    else if(patt == false){
        Materialize.toast('Username can only contain letters, numbers, dash and underscore', 4000, 'red');
        $('#username-reg').addClass('invalid');
    }
});

$('#name-reg').blur(function (){
    input = $('#name-reg').val().trim();
    patt = /^[a-zA-Z0-9_-]*$/.test(input);

    if(input == "" || input == null){
        Materialize.toast('You have to type your name', 4000, 'red');
    }
});

$('#email-reg').blur(function (){
   input = $('#email-reg').val().trim();
    patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(input);

    if(input == "" || input == null){
        Materialize.toast('You have to type your E-mail', 4000, 'red');
    }
    else if(patt == false){
        Materialize.toast('Your E-mail is not valid', 4000, 'red');
        $('#email-reg').addClass('invalid');
    }
});