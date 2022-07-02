$(function(){
    $('#showPassword')
        .mouseup(function() {
            $( this ).css( "background-color","var(--bs-btn-bg)");
            $('#password').attr('type','password');
        })
        .mousedown(function() {
            $( this ).css( "background-color","#CCCC");
            $('#password').attr('type','text');
        });
    $('#showPasswordConf')
        .mouseup(function() {
            $( this ).css( "background-color","var(--bs-btn-bg)");
            $('#passwordConf').attr('type','password');
        })
        .mousedown(function() {
            $( this ).css( "background-color","#CCCC");
            $('#passwordConf').attr('type','text');
        });
})
