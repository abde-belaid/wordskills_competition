@extends('Master.layouts')
@section('content')
    <div class="container mt-5 ">
        <fieldset class="border border-primary border-1 rounded-3">
            <div class="d-flex justify-content-center">

                @if (session('message'))
                <b class="alert alert-danger">{{session('message')}}</b>
                    
                @endif
            </div>
            <div class="row g-3 align-items-center ">
                <div class="col-md-6 m-auto p-5">
                    <img class="w-100 gap-0 height-auto" src="/images/20824341_6368592.jpg" alt="" />
                </div>
                <div class="col-md-6 m-auto p-5"> 
                    <form action="{{route('authentifier')}}" method="POST">
                        @csrf
                        <input type="number" name="matricule" class="form-control border-info border-1"
                            placeholder="Matricule">
                        <br> <input type="password" name="code" class="form-control border-info border-1"
                            placeholder="Code">
                        <br><select name="profile" class="form-select border-info border-1">
                            <option value="">Choisir le Profil</option>
                            <option value="admin">Admin</option>
                            <option value="responsable">Responsable</option>
                            <option value="employe">Employé</option>
                        </select>
                        <br> <button class="btn btn-primary">connexion</button>
                    </form>
                </div>


            </div>
        </fieldset>
    </div>
@endsection
