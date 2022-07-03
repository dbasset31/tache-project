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
    $('#package_id').change(function (){
        $('#pricePackage').html('<div class="d-flex ms-5"><label> Montant :</label><span class="ms-1">'+$("#package_"+$(this).val()).attr("price")+'</span></div>')
    })
    $('#logoBusinessUpload').change(function(){
        let businessLogoName = $(this).val();
        let extensionAllowed = ['png','svg','jpg','jpeg','gif']
        let extension = businessLogoName.split('.')[businessLogoName.split('.').length -1];
        if(extensionAllowed.indexOf(extension.toLowerCase()) > -1 ){
            $('#business-logo').html('');
            let fileReader = new FileReader();
            fileReader.readAsDataURL(this.files[0]);
            fileReader.onload = function(fileEvent) {
                $('#business-logo').append('<img id="previewLogo" src="'+fileEvent.target.result+'" alt="previewLogo">');
            };
        } else {
            alert('L\'extension du fichier n\'est pas autorisée. Les extensions autorisées sont : png, svg, jpg, jpeg, gif');
        }
    })

    $('#telBusiness').keyup(function (e){
        let numero = $(this).val();
        let secondCharAllowed = ['1', '2', '3', '4', '5', '6', '7', '9'];
        let allowedOtherChars = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        if(numero.charAt(0) != '0'){
            $(this).val('');
            numero = "";
        } else if(secondCharAllowed.indexOf(numero.charAt(1)) == '-1' ){
            $(this).val(numero.charAt(0));
        } else if(allowedOtherChars.indexOf(numero.charAt(numero.length -1)) == '-1'){
            $(this).val(numero.substring(0, numero.length - 1));
        }
    });

    $('#telBusiness').change(function (){
        let numero = $(this).val();
        if(numero.length > 10){
            $(this).val(numero.substring(0, 10));
        }
    });

    $('#telDirect').keyup(function (e){
        let numero = $(this).val();
        let secondCharAllowed = ['1', '2', '3', '4', '5', '6', '7', '9'];
        let allowedOtherChars = ['0','1', '2', '3', '4', '5', '6', '7', '8', '9'];

        if(numero.charAt(0) != '0'){
            $(this).val('');
            numero = "";
        } else if(secondCharAllowed.indexOf(numero.charAt(1)) == '-1' ){
            $(this).val(numero.charAt(0));
        } else if(allowedOtherChars.indexOf(numero.charAt(numero.length -1)) == '-1'){
            $(this).val(numero.substring(0, numero.length - 1));
        }
    });

    $('#telDirect').change(function (){
        let numero = $(this).val();
        if(numero.length > 10){
            $(this).val(numero.substring(0, 10));
        }
    });
});

function nextStep(etape,nextEtape){
    $("#error").html('');
    let error = $('#error').html();
    let fail = "";
    $('input,select').each(function (){
        $(this).css('border-color','#ced4da');
        if($(this).attr('requis') == "true" && $(this).val() == ""){
            if($(this).parent().parent().attr('id') == etape){
                $(this).css('border-color','red');
                fail = true;
                error = error + $('label[for="'+$(this).attr('id')+'"]').html()+"<br>";
                error = error.replace('*','');
                error = error.replace(':','');
            } else if($(this).parent().parent().parent().parent().attr('id') == etape) {
                $(this).css('border-color','red');
                error = error + $('label[for="'+$(this).attr('id')+'"]').html()+"<br>";
                error = error.replace('*','');
                error = error.replace(':','');
                fail = true;
            }
        }
    })
    if(fail === true){
        $('#error').html('Les champs suivant sont requis : <br><br>'+error).show();
        return false;
    } else {
        $('#error').hide().html('');
        $("#"+etape).fadeOut(500);
        setTimeout(function (){
            $('#'+nextEtape).fadeIn(500);
        },500)
        $('#etape'+etape).prop('checked',false);
        $('#etape'+nextEtape).prop('checked','true');
    }
}

function prevStep(prevEtape,curEtap){
    $("#"+curEtap).fadeOut(500);
    console.log(prevEtape);
    setTimeout(function (){
        $('#'+prevEtape).show();
        $('#'+prevEtape).fadeIn(500);
    },500)
    $('#etape'+curEtap).prop('checked',false);
    $('#etape'+prevEtape).prop('checked',true);
}
