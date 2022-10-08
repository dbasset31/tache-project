function openModal(url, method) {
    $.ajax({
        type: method,
        url: url,
    })
        .done(function (html) {
            $('#modal').append(html);
            $("#modalbox").modal('show');
        })
        .fail(function (msg) {
            console.log(msg);
        });
}

function closeModal() {
    $('#modal').html('');
}



