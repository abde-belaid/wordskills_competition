@extends('Master.dashboard')
@section('contenu')
    <h1>Affectater Poste </h1>

    
                                    
                                        <a href="{{route('listeAffectation')}}">

                                            <i class="material-icons text-outline-warning" data-toggle="tooltip"
                                            title="Delete">arrow_back</i>
                                        </a>
                                    


    <div class="container">

        <fieldset class="border border-2 p-5 border-info rounded-5">
            <legend class="fw-bolder text-center m-3 text-primary text-decoration-underline">Affectater Poste</legend>
            <form action="{{ route('SaveAffecation') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row m-2">
                    <div class="col-md-6">
                        <label for="" class="fs-5 fw-bold">Intitule service : </label><br>

                    </div>
                    <div class="col-md-6 ">
                        <select name="Matricule" class="form-select" id="">
                            <option value="">___selctionner l'employe</option>
                            @foreach ($employes as $employe)
                                <option value="{{ $employe->Matricule }}">{{ $employe->nom }}</option>
                            @endforeach
                        </select>



                    </div>

                </div>

                <div class="row m-2">
                    <div class="col-md-6">
                        <label for="" class="fs-5 fw-bold">Le poste : </label><br>

                    </div>
                    <div class="col-md-6 ">
                        <select name="NumPoste" class="form-select" id="">
                            <option value="">___selctionner le poste____</option>
                            @foreach ($postes as $poste)
                                <option value="{{ $poste->NumPoste }}">{{ $poste->Description }}</option>
                            @endforeach
                        </select>



                    </div>

                </div>

                <div class="row m-2">
                    <div class="col-md-6">
                        <label for="" class="fs-5 fw-bold">Date Entre : </label><br>

                    </div>
                    <div class="col-md-6 ">
                        <input type="date" value="{{ old('DateEntre') }}" name="DateEntre" required
                            class="form-control">



                    </div>

                </div>

                <div class="row m-2">
                    <div class="col-md-6">
                        <label for="" class="fs-5 fw-bold">Date Sortie : </label><br>

                    </div>
                    <div class="col-md-6 ">
                        <input type="date" value="{{ old('DateSortie') }}" name="DateSortie" class="form-control">



                    </div>

                </div>

                

                <div class="row m-2">
                    <div class="col-md-6">
                        <label for="" class="fs-5 fw-bold">Salaire : </label><br>

                    </div>
                    <div class="col-md-6 ">
                        <input type="number"  name="Salaire" placeholder="10000 Dhs" class="form-control">
                    </div>

                </div>


                <input type="submit" value="Ajouter" class="btn btn-info btn-outline-primary w-25">
            </form>
        </fieldset>



    </div>
@endsection
