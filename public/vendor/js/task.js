$(function() {
    getAllByCompanie()
})

function getAllByCompanie(){
    $.ajax({
        type:'GET',
        url:'/get_tasks_by_companie',
    })
        .done(function( html ) {
            $("#bodyTasks").html(html);
        })
        .fail(function ( msg ){
            console.log(msg);
        });
}
