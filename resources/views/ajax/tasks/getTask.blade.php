@foreach($tasks as $task)
    <tr id="task_{{ $task->id }}">
        <td style="color: {{ Auth::user()->color }}; text-align: center">{{ strtoupper(substr($task->user->lastname,-strlen($task->user->lastname),1)) }}{{ strtoupper(substr($task->user->firstname,-strlen($task->user->firstname),1)) }}</td>
        <td>
            <div class="d-flex justify-content-between">
                <div id="tache_libelle_{{ $task->id }}">
                    {{ $task->title }}
                </div>
                <div>
                    <i class="fa-1x fa-solid fa-magnifying-glass" onclick="openModal('{{ route('formTask') }}/{{ $task->id }}','GET')"></i>
                </div>
            </div>
        </td>
        <td>{{ $task->statut->name }}</td>
        <td>{{ $task->priority->name }}</td>
        <td id="td-action">
            <div class="d-flex justify-content-between">
                <div>
                    <i id="box-icon" class="fa fa-box" onclick="archiveTask({{ $task->id }})"></i>
                </div>
                <div>
                    <i id="trash-icon" onclick="deleteTask({{ $task->id }})" class="fa fa-trash"></i>
                </div>
            </div>
        </td>
    </tr>
@endforeach
