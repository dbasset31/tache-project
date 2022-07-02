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
            alert('extension ok')
        } else {
            alert('extension pas ok')
        }
    })
});
