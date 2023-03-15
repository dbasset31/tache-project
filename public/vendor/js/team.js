function deleteTeam(teamId) {
    if (confirm("Êtes-vous sûr de vouloir supprimer l\'équipe \"" + ($('#team_libelle_' + teamId).html().replaceAll(' ', '').replaceAll('\n', '')) + "\" ?")) {
        $.ajax({
            type: 'DELETE',
            url: '/delete_team',
            headers: {
                'X-CSRF-TOKEN': $('#csrf').html()
            },
            data: {id: teamId},
        })
            .done(function (html) {
                $('#team_' + teamId).remove();
            })
            .fail(function (msg) {
                alert('Echec de la suppression de l\'équipe. Veuillez réessayer ultèrieurement.')
            });
    }
}
