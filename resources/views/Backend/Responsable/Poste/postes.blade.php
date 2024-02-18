@extends('Master.dashboard')
@section('contenu')
@if (session('messagesuccess'))
    <span class="alert alert-success m-5 w-100">{{ session('messagesuccess') }}</span>
@endif
    <div class="container">

        <h1>liste des postes</h1>

        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    {{-- <div class="flex"> --}}
                    <div class="d-flex justify-content-between">
                        <div class="">

                            <h2 class="text-light">Gestion des Postes</h2>
                        </div>
                        <div class="">

                            <a href="{{ route('addposte') }}" class="btn btn-success fs-5 addUsers mx-3">Ajouter poste +</a>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Numero poste</th>
                            <th>Service</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postes as $poste)
                            <tr>
                                <td>{{ $poste->NumPoste }}</td>
                                @foreach ($services as $service)
                                    @if ($poste->service_NumService === $service->NumService)
                                        <td>{{ $service->intitule }}</td>
                                    @endif
                                @endforeach
                                <td>{{ $poste->Description }}</td>
                                <td>
                                    <a href="{{ route('editposte', $poste->NumPoste) }}" class="edit"
                                        data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                            title="Edit">&#xE254;</i></a>
                                    <a href="{{ route('deleteposte', $poste->NumPoste) }}" class="delete"
                                    data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                        title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <span class="d-flex justify-content-end">{{ $postes->links() }}</span>

            </div>
        </div>


    </div>
@endsection
