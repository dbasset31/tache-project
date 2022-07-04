@extends('layouts/layout')
@section('page')
    <div class="d-flex justify-content-center">
        <div class="flex-column">
            <div class="d-flex flex-row mt-2 mb-4 justify-content-between align-items-center">
                <div>
                    <img id="business-logo" src="{{ Auth::user()->companie->logo }}" alt="business-logo">
                </div>
                <div>
                    {{ Auth::user()->companie->name }}
                </div>
                <div class="d-flex align-items-center">
                    {{ $online }}
                    <span class="ms-1 me-1">/</span>
                    100
                </div>
            </div>
            <div>
                <table class="table table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Titre de la tâche</th>
                        <th>Statut</th>
                        <th>Priorité</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5" class="text-center"><button type="button" class="btn btn-success"><i class="fa-solid fa-plus"></i> Ajouter une tache</button></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
