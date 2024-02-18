@extends('Master.dashboard')
@section('contenu')
   <div class="container">
    
    <h1>Liste des services</h1>

    @if (session('messagesuccess'))
    <span class="alert alert-success m-2 align-item-center">{{ session('messagesuccess') }}</span>
@endif
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            {{-- <div class="flex"> --}}
            <div class="d-flex justify-content-between">
                <div class="">
                    <h2 class="text-light">Gestion des services</h2>
                </div>
                <div class="">

                    <a href="{{ route('addService') }}" class="btn btn-success fs-5 addUsers">Ajouter Service +</a>
                </div>
            </div>
            {{-- </div> --}}
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Numero service</th>
                    <th>Intituler</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->NumService }}</td>
                        <td>{{ $service->intitule }}</td>
                        <td>
                            <a href="{{ route('editService', $service->NumService) }}" class="edit"
                                data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                    title="Edit">&#xE254;</i></a>
                            <a href="{{ route('deleteService', $service->NumService) }}" class="delete"
                                data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                    title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <span class="d-flex justify-content-end">{{$services->links()}}</span>

    </div>
</div>


   </div>
@endsection
