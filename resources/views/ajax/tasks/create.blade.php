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
        <label class="mt-3" for="description">Description</label>
        <textarea style="border: 2px solid gray" class="description" name="description" id="description">{{$task->description}}</textarea>
        <label class="mt-3" for="user_id">Attribué à </label>
        <select class="form-control" requis="true" id="user_id" name="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}" @if($task->user_id == $user->id) selected @endif>{{ $user->firstname.' '.$user->lastname }}</option>
            @endforeach
        </select>
        <label class="mt-3" for="priority_id">Priorité</label>
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
    <script>
        $(document).ready(function() {
            tinymce.init({
                selector: 'textarea',
                plugins: 'anchor autolink autoresize charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                mergetags_list: [
                    { value: 'First.Name', title: 'First Name' },
                    { value: 'Email', title: 'Email' },
                ]
            });
        });
    </script>
@endsection

