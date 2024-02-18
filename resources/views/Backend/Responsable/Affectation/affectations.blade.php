@extends('Master.dashboard')
@section('contenu')

<div class="container">
    <h1>Liste des affectations</h1>



    @if (session('messagesuccess'))
    <span class="alert alert-success m-2 align-item-center">{{ session('messagesuccess') }}</span>
@endif
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            {{-- <div class="flex"> --}}
            <div class="d-flex justify-content-between">
                <div class="">

                    <h2 class="text-light">Gestion des Affectations</h2>
                </div>
                <div class="">

                    <a href="{{ route('addAffectation') }}" class="btn btn-success fs-5 addUsers">Ajouter Affectation +</a>
                </div>
            </div>
            {{-- </div> --}}
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Matricule Employe</th>
                    <th>Poste</th>
                    <th>Date Entre</th>
                    <th>Date Sortie</th>
                    <th>Salaire</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($affectations as $affectation)
                    <tr>
                        <td>{{ $affectation->id }}</td>
                        <td>{{ $affectation->employe_Matricule }}</td>
                        <td>{{ $affectation->poste_NumPoste }}</td>
                        <td>{{ $affectation->DateEntre }}</td>
                        <td>{{ $affectation->DateSortie ? $affectation->DateSortie : "à ce jour" }}</td>
                        <td>{{ $affectation->Salaire }}</td>
                        <td>
                            test
                            {{-- <a href="{{route('getJustification',$affectation->Justification)}}"><i class="material-icons text-outline-info" data-toggle="tooltip"
                                title="Edit">
                                    download
                                    </i></a> --}}
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
        {{-- <span class="d-flex justify-content-end">{{$absences->links()}}</span> --}}

    </div>
</div>




</div>
    
@endsection