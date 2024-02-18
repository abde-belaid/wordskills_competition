@extends('Master.dashboard')
@section('contenu')
<div class="conatiner">

    <fieldset class="border border-2 p-5 border-info rounded-5">
        <legend class="fw-bolder">Modifier Poste</legend>
        <form action="{{ route('updatePoste') }}" method="POST">
            @csrf
            <input type="text" class="form-control" hidden name="NumPoste" value="{{ $poste->NumPoste }}">
            <div class="row w-75">
                <div class="col-md-6">
                    <label for="" class="fs-5 fw-bold">Description Poste : </label><br>
                    
                </div>
                <div class="col-md-6 ">
                    <input type="text" class="form-control border border-info" required name="Description"
                    value="{{ $poste->Description }}"><br>
                    
                </div>
                
            </div>
            <div class="row w-75">
                <div class="col-md-6">
                    <label for="" class="fs-5 fw-bold">Service : </label><br>
                    
                </div>
                <div class="col-md-6 ">
                    
                    <select name="service" required id="" class="form-select border border-info">
                        @foreach ($services as $service)
                        @if ($poste->service_NumService == $service->NumService)
                        <option value="{{ $service->NumService }}" selected>{{ $service->intitule }}</option>
                        @else
                        <option value="{{ $service->NumService }}">{{ $service->intitule }}</option>
                        @endif
                        @endforeach
                        
                    </select>
                </div>
                
            </div>
            <input type="submit" value="Modifier" class="btn btn-success w-25">
        </form>
    </fieldset>
</div>
@endsection
