@extends('layouts/modal')
@section('modal-header')
    <h3>@if(isset($team->id))Modifier une @else Créer une @endif équipe</h3>
@endsection
@section('modal-body')
    <form method="POST" id="saveTeam" action="{{ route('saveTeam') }}@if($team->id != "")/{{ $team->id }}@endif">
        @csrf
        <div class="form-group">
            <label for="name">Nom de l'équipe</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $team->name }}" requis="true">
        </div>
    </form>
@endsection
@section('modal-footer')
    <script src="{{ asset('/vendor/js/form.js') }}"></script>
    <button type="button" onclick="validateForm('saveTeam')" class="btn btn-success">Enregistrer</button>
@endsection

