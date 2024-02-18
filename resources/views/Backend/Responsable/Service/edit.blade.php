@extends('Master.dashboard')
@section('contenu')
<fieldset class="border border-2 p-5 border-info rounded-5">
    <legend class="fw-bolder">Modifier Service</legend>
    <form action="{{route('updateService')}}" method="POST">
        @csrf
        <input type="text" class="form-control" hidden name="NumService" value="{{$service->NumService}}">
        <div class="row w-75">
            <div class="col-md-6">
                <label for="" class="fs-5 fw-bold">Intitule service : </label><br>

            </div>
            <div class="col-md-6 ">
                <input type="text" class="form-control border border-info" required name="intitule" value="{{$service->intitule}}"><br>

            </div>
            
        </div>
        <input type="submit" value="Modifier" class="btn btn-success w-25">
    </form>
</fieldset>
    
@endsection