@extends('Master.dashboard')
@section('contenu')
    <h1>Ajouter absence</h1>
    <div class="container">

        <fieldset class="border border-2 p-5 border-info rounded-5">
            <legend class="fw-bolder text-center m-3 text-primary text-decoration-underline">Ajouter Absence</legend>
            <form action="{{ route('SaveAbsence') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row m-2">
                    <div class="col-md-6">
                        <label for="" class="fs-5 fw-bold">Matricule employe : </label><br>

                    </div>
                    <div class="col-md-6 ">
                        <select name="Matricule" class="form-select" id="" required>
                            <option value="">___selctionner l'employe___</option>
                            @foreach ($employes as $cle => $employe)
                                <option {{ old('Matricule') == $employe ? 'selected' : '' }} value="{{ $employe }}">
                                    {{ $employe }}</option>
                            @endforeach
                        </select>




                        @error('Matricule')
                            <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="row m-2">
                    <div class="col-md-6">
                        <label for="" class="fs-5 fw-bold">Raison : </label><br>

                    </div>
                    <div class="col-md-6 ">
                        <input type="text" placeholder="Raison" value="{{ old('Raison') }}" name="Raison"
                            class="form-control" required>



                        @error('Raison')
                            <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="row m-2">
                    <div class="col-md-6">
                        <label for="" class="fs-5 fw-bold">Date Debut : </label><br>

                    </div>
                    <div class="col-md-6 ">
                        <input type="date" value="{{ old('DateDebut') }}" name="DateDebut" class="form-control" required>



                        @error('DateDebut')
                            <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="row m-2">
                    <div class="col-md-6">
                        <label for="" class="fs-5 fw-bold">Date Fin : </label><br>

                    </div>
                    <div class="col-md-6 ">
                        <input type="date" value="{{ old('DateFin') }}" name="DateFin" class="form-control" required>
                        @error('DateFin')
                            <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="row m-2">
                    <div class="col-md-6">
                        <label for="" class="fs-5 fw-bold">Justification : </label><br>

                    </div>
                    <div class="col-md-6 ">
                        <input type="file" name="Justification" class="form-control" required accept=".pdf , .doc , .docx">
                        @error('Justification')
                            <span class="alert text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>


                <input type="submit" value="Ajouter" class="btn btn-info btn-outline-primary w-25">
            </form>
        </fieldset>



    </div>
@endsection
