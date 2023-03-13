$(function () {
    getAllByCompanie();
    $('#deadline').datepicker({
        dateFormat: 'dd/mm/yy'
    });
})

function getAllByCompanie() {
    $.ajax({
        type: 'GET',
        url: '/get_tasks_by_companie',
    })
        .done(function (html) {
            $("#bodyTasks").html(html);
        })
        .fail(function (msg) {
            console.log(msg);
        });
}

function deleteTask(taskId) {
    if (confirm("Êtes-vous sûr de vouloir supprimer la tâche \"" + ($('#tache_libelle_' + taskId).html().replaceAll(' ', '').replaceAll('\n', '')) + "\" ?")) {
        $.ajax({
            type: 'DELETE',
            url: '/delete_task',
            headers: {
                'X-CSRF-TOKEN': $('#csrf').html()
            },
            data: {id: taskId},
        })
            .done(function (html) {
                $('#task_' + taskId).remove();
            })
            .fail(function (msg) {
                alert('Echec de la suppression de la tâche. Veuillez réessayer ultèrieurement.')
            });
    }
}

function archiveTask(taskId) {
    if (confirm("Êtes-vous sûr de vouloir archiver la tâche \"" + ($('#tache_libelle_' + taskId).html().replaceAll(' ', '').replaceAll('\n', '')) + "\" ?")) {
        $.ajax({
            type: 'POST',
            url: '/archive_task',
            headers: {
                'X-CSRF-TOKEN': $('#csrf').html()
            },
            data: {id: taskId},
        })
            .done(function (html) {
                $('#task_' + taskId).remove();
            })
            .fail(function (msg) {
                alert('Echec d\'archivage de la tâche. Veuillez réessayer ultèrieurement.')
            });
    }
}
