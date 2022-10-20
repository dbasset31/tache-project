$(function (){
    $('input,select,textarea').each(function (){
        if($(this).attr('requis') == "true"){
            if($("label[for='"+$(this).attr('id')+"']").html() !== undefined){
                $("label[for='"+$(this).attr('id')+"']").html($("label[for='"+$(this).attr('id')+"']").html()+ " *");
            }
        }
    })
})

function validateForm(id){
    $("#error").html('');
    let fail = "";
    let error = $('#error').html();
    $('input,select,textarea').each(function (){
        if($(this).attr('requis') == "true" && $(this).val() == ""){
            $(this).css('border-color','red');
            fail = true
            error = error + $('label[for="'+$(this).attr('id')+'"]').html()+"<br>";
            error = error.replace('*','');
            error = error.replace(':','');
        } else {
            $(this).css('border-color','#ced4da');
        }
    })

    if(fail != true){
        $('#error').css('display','none');
        $('#'+id).submit();
    } else {
        $('#error').html('Les champs suivant sont requis : <br><br>'+error).show();
    }


}
