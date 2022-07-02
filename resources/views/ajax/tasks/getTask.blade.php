@foreach($tasks as $task)
    <tr>
        <td></td>
        <td>
            <div class="d-flex justify-content-between">
                <div>
                    Titre de la tâche
                </div>
                <div>
                    <i class="fa-1x fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
        </td>
        <td>Statut</td>
        <td>Priorité</td>
        <td id="td-action">
            <div class="d-flex justify-content-between">
                <div>
                    <i id="box-icon" class="fa fa-box"></i>
                </div>
                <div>
                    <i id="trash-icon" class="fa fa-trash"></i>
                </div>
            </div>
        </td>
    </tr>
@endforeach
