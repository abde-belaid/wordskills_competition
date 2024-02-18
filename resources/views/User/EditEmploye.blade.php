@extends('Master.dashboard')
@section('contenu')
    <div class="container mt-5 m-auto p-auto w-75">

        <form class="p-5 bg-light" action="{{route('SaveEditEmploye')}}" method="POST" enctype="multipart/form-data">
@csrf
            <div class="bg-transparent p-2 text-light justify-content-center d-flex">
                <h4>Editer un Employe dont le matricule : {{ $employe->Matricule }}</h4>
            </div>

            <div class="form-group">
                <input type="number" name="Matricule" value="{{ $employe->Matricule }}" class="form-control" hidden>
            </div>
            <div class="form-group">
                <label>CIN</label>
                <input type="text" name="CIN" value="{{ $employe->CIN }}" class="form-control" required>
                @error('CIN')
                    <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Nom</label>
                <input type="text" value="{{ $employe->nom }}" name="nom" class="form-control" required>
                @error('nom')
                    <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Date Naissance</label>
                <input type="date" value="{{ $employe->Datenaissance }}" name="Datenaissance" class="form-control"
                    required>
                @error('Datenaissance')
                    <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Etat Civil</label>
                <select name="EtatCivil" id="" class="form-select">
                    <option {{ $employe->EtatCivil === 'Célebataire' ? 'selected' : '' }} value="Célebataire">Célebataire
                    </option>
                    <option {{ $employe->EtatCivil === 'Marie(e)' ? 'selected' : '' }} value="Marie(e)">Marie(e)</option>
                    <option {{ $employe->EtatCivil === 'Divorcé(e)' ? 'selected' : '' }} value="Divorcé(e)">Divorcé(e)
                    </option>
                    <option {{ $employe->EtatCivil === 'Veuf(ve)' ? 'selected' : '' }} value="Veuf(ve)">Veuf(ve)</option>

                </select>
                @error('EtatCivil')
                    <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Nombre Enfants</label>
                <input type="number" name="NBEnfant" value="{{ $employe->NBEnfant }}" class="form-control" required>
                @error('NBEnfant')
                    <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Date Recrutement</label>
                <input type="date" name="DateRecrutement" value="{{ $employe->DateRecrutement }}" class="form-control"
                    required>
                @error('DateRecrutement')
                    <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Echelle</label>
                <input type="number" name="Echelle" value="{{ $employe->Echelle }}" class="form-control" required>
                @error('Echelle')
                    <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Adresse</label>
                <input type="text" name="Adresse" value="{{ $employe->Adresse }}" class="form-control" required>
                @error('Adresse')
                    <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="photo" class="form-file" required>
                @error('photo')
                    <span class="alert text-danger">{{ $message }}</span>
                @enderror
            </div>


            <div class="modal-footer">
                <a href="{{route('ListeEmployer')}}"  class="btn btn-default" value="Annuler">Annuler</a>
                <input type="submit" class="btn btn-info" value="Save">
            </div>
        </form>
    </div>
@endsection
