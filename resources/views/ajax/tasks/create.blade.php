@extends('layouts/modal')

@section('modal-header')
    <h3>Créer une tâche</h3>
@endsection
@section('modal-body')
    <form method="POST" id="saveTask" action="{{ route('saveTask') }}">
        @csrf
        <label for="title">Titre de la tâche</label>
        <input requis="true" class="form-control" type="text" id="title" name="title">

        <label class="mt-2" for="description">Description</label>
        <textarea class="form-control" requis="true" name="description" id="description"></textarea>

        <label class="mt-2" for="priority_id">Priorité</label>
        <select class="form-control" requis="true" id="priority_id" name="priority_id">
            @foreach($priorities as $priority)
                <option value="{{ $priority->id }}">{{ $priority->name }}</option>
            @endforeach
        </select>

        <label class="mt-2" for="deadline">Date d'échéance</label>
        <input class="form-control" type="date" id="deadline" name="deadline">
    </form>
@endsection
@section('modal-footer')
    <button type="button" onclick="validateForm('saveTask')" class="btn btn-success">Enregistrer</button>
    <script src="{{ asset('/vendor/js/form.js') }}"></script>
    <script src="{{ asset('/vendor/js/task.js') }}"></script>
@endsection

