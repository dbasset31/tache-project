@extends('layouts.layout')
@section('scripts')
    <script src="{{ asset('/vendor/js/team.js') }}"></script>
    <script>
        $(function () {
            $('#csrf').html("{{ csrf_token() }}");
            setInterval(function () {
                $('#csrf').html("{{ csrf_token() }}");
            }, 300000)
        })
    </script>
@endsection
@section('page')
    <div class="row">
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Nombre de membres</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($teams as $team)
                <tr id="team_{{ $team->id }}">
                    <td id="team_libelle_{{ $team->id }}">{{ $team->name }}</td>
                    <td>{{ $team->user->count() }}</td>
                    <td>@if($team->user->count() > 0)<i class="fa-1x fa-solid fa-magnifying-glass" onclick="openModal('{{ route('formTeam') }}/{{ $team->id }}','GET')"></i>@endif &nbsp; <i class="fa fa-plus-circle text-success"></i> &nbsp; @if($team->user->count() == 0)<i id="trash-icon" class="fa fa-trash" onclick="deleteTeam({{ $team->id }})"></i>@endif</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="text-center">
                    <button onclick="openModal('{{ route('formTeam') }}','GET')" type="button"
                            class="btn btn-success"><i class="fa-solid fa-plus"></i> Ajouter une équipe
                    </button>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="d-none" id="csrf"></div>
@endsection

