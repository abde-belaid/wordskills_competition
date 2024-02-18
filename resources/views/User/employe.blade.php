@extends('Master.dashboard')
@section('contenu')
    <div class="container-xl">
        <h3 class="">Gestion des <b>Employees</b></h3>
        @if (session('messagesuccess'))
            <span class="alert alert-success">{{ session('messagesuccess') }}</span>
        @endif
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6 text-light">
                            <form action="{{ route('RechercheEmploye') }}" method="post">
                                @csrf
                                <div class="row">

                                    <div class="col-4">

                                        <input type="search" class="form-control border border-2 border-success"
                                            placeholder="search ..." name="motcle" value="{{ old('motcle') }}">
                                    </div>
                                    <div class="col-8 row m-0 ">

                                        <div class="col-7">
                                            <select name="Criter" id=""
                                                class="form-select border border-2 border-success">
                                                <option value="Matricule" selected>Matricule</option>
                                                <option value="CIN">CIN</option>
                                                <option value="nom">NOM</option>
                                            </select>
                                        </div>
                                        <div class="col-3">
                                            <button class="btn btn-outline-info fs-1 rounded-circle fw-bolder">
                                                <span class="material-icons fs-2 text-warning">
                                                    manage_search
                                                </span>
                                            </button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                        <div class="col-sm-6">

                            <a href="{{ route('NouveauEmploye') }}" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Nouveau Employé</span></a>
                            <button onclick="SupprimerChecked()" class="btn btn-danger" data-toggle="modal"><i
                                    class="material-icons">&#xE15C;</i> <span>Supprimer tous</span></button>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" value="all" name="options[]" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>Photo</th>
                            <th>Matricule <i class="fs-5 material-icons" title="trier">arrow_drop_down</i></th>
                            <th>CIN <i class="fs-5 material-icons" title="trier">arrow_drop_down</i></th>
                            <th>Nom <i class="fs-5 material-icons" title="trier">arrow_drop_down</i></th>
                            <th>Date naissance <i class="fs-5 material-icons" title="trier">arrow_drop_down</i></th>
                            <th>Etat Civil <i class="fs-5 material-icons" title="trier">arrow_drop_down</i></th>
                            <th>Nombre  Enfants <i class="fs-5 material-icons" title="trier">arrow_drop_down</i></th>
                            <th>Date  Recrutement <i class="fs-5 material-icons" title="trier">arrow_drop_down</i></th>
                            <th>Echelle <i class="fs-5 material-icons" title="trier">arrow_drop_down</i></th>
                            <th>Adresse <i class="fs-5 material-icons" title="trier">arrow_drop_down</i></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employes as $employe)
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" class="sellectedEmployes" name="options[]"
                                            value="{{ $employe->Matricule }}">
                                        <label for="checkbox1"></label>
                                    </span>
                                </td>
                                <td><img style="border-radius: 50%; width:80px; height:auto;"
                                        src="/images_Emplyes/{{ $employe->Photo }}" /></td>
                                <td>{{ $employe->Matricule }}</td>
                                <td>{{ $employe->CIN }}</td>
                                <td>{{ $employe->nom }}</td>
                                <td>{{ $employe->Datenaissance }}</td>
                                <td>{{ $employe->EtatCivil }}</td>
                                <td>{{ $employe->NBEnfant }}</td>
                                <td>{{ $employe->DateRecrutement }}</td>
                                <td>{{ $employe->Echelle }}</td>
                                <td>{{ $employe->Adresse }}</td>
                                <td title="action">
                                    <a href="{{ route('EditEmploye', $employe->Matricule) }}" class="edit"
                                        data-toggle="modal" title="Edit"><i title="edit" class="material-icons" data-toggle="tooltip"
                                            >&#xE254;</i></a>
                                    <a  href="{{ route('deletEmploye', $employe->Matricule) }}" class="delete"
                                        data-toggle="modal" title="delete"><i  class="material-icons" data-toggle="tooltip"
                                            title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
