var input;
var output;
var patt;
var password2;


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

$('#Password_reg').blur(function (){
    input = document.getElementById("Password_reg").value.trim();
    var patt = /^(?=.*[0-9])^(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{6,100}$/.test(password1);

    if(input == null || input == ""){
        Materialize.toast('You must type your password', 4000);
        $('#Password_reg').addClass('invalid');
    }
    else if(input != null){
        if(input != password2){
            Materialize.toast('Your passwords do not match', 6000);
        }
    }
    else if(patt == false){
        Materialize.toast('Your password has to contain at least 1 uppercase, 1 lowercase, 1 number and be 6 characters long', 6000);
    }
});