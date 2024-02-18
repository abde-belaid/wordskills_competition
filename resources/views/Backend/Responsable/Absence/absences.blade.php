@extends('Master.dashboard')
@section('contenu')

<h1>liste absences le : {{date('d-m-Y')}}</h1>

@if (session('messagesuccess'))
        <span class="alert alert-success m-2 align-item-center">{{ session('messagesuccess') }}</span>
    @endif
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                {{-- <div class="flex"> --}}
                <div class="d-flex justify-content-between">
                    <div class="">

                        <h2 class="text-light">Gestion des Utilisateurs</h2>
                    </div>
                    <div class="">

                        <a href="{{ route('addAbsence') }}" class="btn btn-success fs-5 addUsers">Ajouter Service +</a>
                    </div>
                </div>
                {{-- </div> --}}
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Matricule Employe</th>
                        <th>Raison</th>
                        <th>Date Debut</th>
                        <th>DAte Fin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absences as $absence)
                        <tr>
                            <td>{{ $absence->idAbs }}</td>
                            <td>{{ $absence->employe_Matricule }}</td>
                            <td>{{ $absence->Raison }}</td>
                            <td>{{ $absence->DateDebut }}</td>
                            <td>{{ $absence->DateFin }}</td>
                            <td>
                                <a href="{{route('getJustification',$absence->Justification)}}"><i class="material-icons text-outline-info" data-toggle="tooltip"
                                    title="Edit">
                                        download
                                        </i></a>
                                {{-- <a href="{{ route('editService', $absence->NumService) }}" class="edit"
                                    data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                        title="Edit">&#xE254;</i></a> --}}

                                {{-- <a href="{{ route('deleteAbsence', $absence->idAbs) }}" class="delete"
                                    data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                        title="Delete">&#xE872;</i></a> --}}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <span class="d-flex justify-content-end">{{$absences->links()}}</span>

        </div>
    </div>


@endsection