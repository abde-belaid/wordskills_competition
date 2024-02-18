@extends('Master.layouts')
@section('content')
    {{-- @dd(session('users')) --}}
    <div class="container m-5 p-auto justify-items-center">
        @if (session('messagewarning'))
            <span class="alert alert-warning m-2 align-item-center">{{ session('messagewarning') }}</span>
        @endif
        @if (session('messagesuccess'))
            <span class="alert alert-success m-2 align-item-center">{{ session('messagesuccess') }}</span>
        @endif
        <form action="{{ route('newUser') }}" class="form d-none addUsers" method="POST">
            @csrf
            <fieldset class="border border-2 border-info p-5">
                <div class="form-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Modifier Utilisateur</h4>
                            {{-- @dd(session('employes')) --}}
                        </div>
                    </div>
                </div>
                <label for="" class="form-label">Matricule</label>
                <select name="matricule" class="form-select border-1 border-info" id="" required>
                    <option value="">Choisir le Matricule</option>
                    @foreach ($employes as $employe)
                        <option value="{{ $employe->Matricule }}">{{ $employe->Matricule }}</option>
                    @endforeach
                </select>
                <label for="" class="form-label">Code</label>
                <input type="password" name="password" id="password" value=""
                    class="form-control border-1 border-info" required placeholder="entrer le code " />
                <span class="btn btn-primary" onclick="Generer()">Generer</span> <br>
                <label for="" class="form-label">Poste</label>
                <select name="profile" class="form-select border-1 border-info" id="" required>
                    <option value="">Choisir le profil </option>
                    <option value="admin">Admin</option>
                    <option value="responsable">Responsable</option>
                    <option value="employe">Employe</option>
                </select>
                <button class="btn btn-primary">Sauvegarder</button>
            </fieldset>
        </form>



        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    {{-- <div class="flex"> --}}
                    <div class="d-flex justify-content-between">
                        <div class="">

                            <h2 class="text-light">Gestion des Utilisateurs</h2>
                        </div>
                        <div class="">

                            <button class="btn btn-success fs-5 addUsers" onclick="addUsers()">Ajouter User +</button>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            {{-- <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th> --}}
                            <th>Matricule</th>
                            <th>Code</th>
                            <th>Profil</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                {{-- <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="options[]"
                                            value="{{ $user->idUtilisateur }}">
                                        <label for="checkbox1"></label>
                                    </span>
                                </td> --}}
                                <td>{{ $user->employe_Matricule }}</td>
                                <td>{{ $user->code }}</td>
                                <td>{{ $user->Profil }}</td>
                                <td>
                                    {{-- <a href="{{route('editUser',$user->employe_Matricule)}}" class="edit" data-toggle="modal"><i
                                            class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a> --}}
                                    <a href="{{route('deleteUser',$user->employe_Matricule)}}" class="delete" data-toggle="modal"><i
                                            class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
				<span class="d-flex justify-content-end">{{$users->links()}}</span>

            </div>
        </div>

    </div>
@endsection
