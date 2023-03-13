@extends('layouts/modal')
@if(!isset($task))
    @php
        $task = new \App\Models\Task();
    @endphp
@endif
@section('modal-header')

    <h3>@if(isset($task->id))Modifier une tâche @else Créer une tâche @endif</h3>
@endsection
@section('modal-body')
    <form method="POST" id="saveTask" action="{{ route('saveTask') }}/{{ $task->id }}">
        @csrf
        <label for="title">Titre de la tâche</label>
        <input requis="true" class="form-control" type="text" id="title" name="title" value="{{$task->title}}">
        <label class="mt-2" for="description">Description</label>
        <textarea class="form-control" name="description" id="description">{{$task->description}}</textarea>
        <label class="mt-2" for="priority_id">Priorité</label>
        <select class="form-control" requis="true" id="priority_id" name="priority_id">
            @foreach($priorities as $priority)
                <option value="{{ $priority->id }}" @if($task->priority_id == $priority->id) selected @endif>{{ $priority->name }}</option>
            @endforeach
        </select>
        <label class="mt-2" for="deadline">Date d'échéance</label>
        <input class="form-control" type="text" id="deadline" name="deadline" value="@if($task->deadline != "") {{ \Carbon\Carbon::createFromFormat('Y-m-d', $task->deadline)->format('d/m/Y') }} @endif">
    </form>
@endsection
@section('modal-footer')
    <button type="button" onclick="validateForm('saveTask')" class="btn btn-success">Enregistrer</button>
    <script src="{{ asset('/vendor/js/form.js') }}"></script>
    <script src="{{ asset('/vendor/js/task.js') }}"></script>
    <script src="{{ asset('/vendor/js/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(function () {
            ClassicEditor
                .create( document.querySelector( '#description' ) )
                .catch( error => {
                    console.error( error );
                } );
        })
    </script>
@endsection

