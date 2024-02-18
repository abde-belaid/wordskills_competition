@extends('Master.layouts')
@section('content')
    {{-- @dd(session("affectations")) --}}
    <div class="container mt-2">
        <div class="row bg-dark p-2 mb-5">
            <div class="col-md-4 ">
                <div class="bg-light mt-2 mr-2 rounded">
                    <div class="d-flex flex-column justify-item-center  p-5 justify-content-center ">
                        <div class="d-flex justify-content-center">

                            <img src="/images_Emplyes/{{$employe->Photo}}"
                                class="rounded-circle w-50 h-auto col-12 border border-success p-1" alt="k">
                        </div>

                        <div class="d-flex justify-content-center flex-column">

                            <h2 class="mt-2 mb-0 text-dark align-self-center">{{ $employe->nom }}</h2>
                            <small class="align-self-center mt-0 fw-bold">{{$currentPoste}}</small>
                            {{-- <small class="text-center mt-0">Web developpeur</small> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 ">

                <div class="bg-light p-2 ">

                    <strong>Nom : </strong>
                    <span>{{ $employe->nom }}</span>
                    <hr>

                    <strong>Matricule : </strong>
                    <span>{{ $employe->Matricule }}</span>
                    <hr>

                    <strong>Date Naissance : </strong>
                    <span>{{ $employe->Datenaissance }}</span>

                    <hr>
                    <strong>Date Recrutement : </strong>
                    <span>{{ $employe->DateRecrutement }}</span>
                    <hr>

                    <strong>Adresse : </strong>
                    <span>{{ $employe->Adresse }}</span>

                    <hr>
                </div>

                <br>

                <div class="bg-light p-2 ">

                    <strong><span class="text-info">Liste</span> des Affectations</strong>

                    <hr>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>

                                <th>Poste</th>
                                <th>Date Entrée</th>
                                <th>Date Sortie</th>
                                <th>Salaire</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd(session('affectations')) --}}
                            @foreach ($affectations as $affectation)
                                <tr>
                                    @foreach ($postes as $poste)
                                        @if ($poste->id === $affectation->poste_id)
                                            <td>{{ $poste->Description }}</td>
                                        @endif
                                    @endforeach

                                    <td>{{ $affectation->DateEntre }}</td>
                                    <td>{{ $affectation->DateSortie }}</td>
                                    <td>{{ $affectation->Salaire }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
                <br>

                <div class="bg-light p-2 ">

                    <strong><span class="text-info">Status</span> Abscences </strong>

                    <hr>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>

                                <th>ID</th>
                                <th>Date Début</th>
                                <th>Date Fin</th>
                                <th>Raison</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absences as $cle=>$absence)
                                <tr>
                                    
                                    {{-- selon le nombre des absences de chaque employe --}}
                                    {{-- <td>{{ $cle+1 }}</td> --}}

                                    {{-- selon l'id de base de donnee --}}
                                    <td>{{ $absence['idAbs'] }}</td>

                                    <td>{{ $absence['DateDebut'] }}</td>
                                    <td>{{ $absence['DateFin'] }}</td>
                                    <td>{{ $absence['Raison'] }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>



                </div>


            </div>
        </div>

    </div>
@endsection
