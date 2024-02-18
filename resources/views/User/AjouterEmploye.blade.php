@extends('Master.dashboard')
@section('contenu')
    <div class="container mt-5 m-auto p-auto w-75">

        <form class="p-5 bg-light" action="{{ route('saveEmloye') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-transparent p-2 text-light justify-content-center d-flex">
                <h4>Nouveau Employe</h4>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label>Matricule</label>
                    <input type="number" value="{{ old('matricule') }}" placeholder="123456" name="matricule"
                        class="form-control" required>
                    @error('matricule')
                        <span class="alert text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>CIN</label>
                    <input type="text" name="cin" value="{{ old('cin') }}" placeholder="P334422"
                        class="form-control" required>
                    @error('cin')
                        <span class="alert text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" value="{{ old('nom') }}" placeholder="Ahmed" name="nom"
                        class="form-control" required>
                    @error('nom')
                        <span class="alert text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Date Naissance</label>
                    <input type="date" name="datenaissance" value="{{ old('datenaissance') }}" class="form-control"
                        required>
                    @error('datenaissance')
                        <span class="alert text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Etat Civil</label>
                    <select name="etatCivil" id="" class="form-select">
                        <option value="">choisez votre etat</option>
                        <option value="Célebataire" {{ 'Célebataire' === old('etatCivil') ? 'selected' : '' }}>Célebataire
                        </option>
                        <option value="Marie(e)" {{ 'Marie(e)' === old('etatCivil') ? 'selected' : '' }}>Marie(e)</option>
                        <option value="Divorcé(e)" {{ 'Divorcé(e)' === old('etatCivil') ? 'selected' : '' }}>Divorcé(e)
                        </option>
                        <option value="Veuf(ve)" {{ 'Veuf(ve)' === old('etatCivil') ? 'selected' : '' }}>Veuf(ve)</option>
                    </select>
                    @error('etatCivil')
                        <span class="alert text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nombre Enfants</label>
                    <input type="number" value="{{ old('nbEnfants') }}" placeholder="5" name="nbEnfants"
                        class="form-control" required>
                    @error('nbEnfants')
                        <span class="alert text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Date Recrutement</label>
                    <input type="date" value="{{ old('dateRecrutement') }}" name="dateRecrutement" class="form-control"
                        required>
                    @error('dateRecrutement')
                        <span class="alert text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Echelle</label>
                    <input type="number" value="{{ old('echelle') }}" placeholder="6" name="echelle" class="form-control"
                        required>
                    @error('echelle')
                        <span class="alert text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Adresse</label>
                    <input type="text" placeholder="Ouarzazate...." value="{{ old('adresse') }}" name="adresse"
                        class="form-control" required>
                    @error('adresse')
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
            </div>
            <div class="modal-footer ">
                <input type="button" class="btn btn-default" value="Annuler">
                <input type="submit" class="btn btn-success" value="Sauvegarder">
            </div>
        </form>
    </div>
@endsection
