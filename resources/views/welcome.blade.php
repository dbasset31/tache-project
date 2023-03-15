@extends('layouts/layout')
@section('scripts')
    <script src="{{ asset('/vendor/js/task.js') }}"></script>
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
                    <tbody id="bodyTasks">

                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="5" class="text-center">
                            <button onclick="openModal('{{ route('formTask') }}','GET')" type="button"
                                    class="btn btn-success"><i class="fa-solid fa-plus"></i> Ajouter une tache
                            </button>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>

    <div class="d-none" id="csrf"></div>
@endsection
