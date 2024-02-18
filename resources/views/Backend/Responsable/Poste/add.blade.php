@extends('Master.dashboard')
@section('contenu')
    <div class="container">
        <h1>Ajouter Poste  </h1>

        <fieldset class="border border-2 p-5 border-info rounded-5">
            <legend class="fw-bolder text-center mb-5">Ajouter Poste</legend>
            <form action="{{ route('savePoste') }}" method="POST">
                @csrf
                <div class="row w-75">
                    <div class="col-md-6">
                        <label for="" class="fs-5 fw-bold">Description Poste : </label><br>
    
                    </div>
                    <div class="col-md-6 ">
                        <input type="text" class="form-control border border-info" placeholder="Description" required name="Description"
                            value="{{old('Description')}}"><br>
    
                    </div>
    
                </div>
                <div class="row w-75">
                    <div class="col-md-6">
                        <label for="" class="fs-5 fw-bold">Service : </label><br>
    
                    </div>
                    <div class="col-md-6 ">
    
                        <select name="service" required id="" class="form-select border border-info">
                            <option value="">___________Choisi le service___________</option>

                            @foreach ($services as $service)
                               
                                    <option value="{{ $service->NumService }}">{{ $service->intitule }}</option>
                            @endforeach
    
                        </select>
                    </div>
    
                </div>
                <input type="submit" value="Ajouter" class="btn btn-success w-25">
            </form>
        </fieldset>

    </div>
@endsection