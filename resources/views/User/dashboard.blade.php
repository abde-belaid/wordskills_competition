@extends('Master.dashboard')
@section('contenu')
    

    <div class="page-heading">
        <h3>Tableau du board</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Services</h6>
                                        <h6 class="font-extrabold mb-0">{{ count($services) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon blue mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Postes</h6>
                                        <h6 class="font-extrabold mb-0">{{ count($postes) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon green mb-2">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Employées</h6>
                                        <h6 class="font-extrabold mb-0">{{ count($employes) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                        <div class="stats-icon red mb-2">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <h6 class="text-muted font-semibold">Absences</h6>
                                        <h6 class="font-extrabold mb-0">{{ count($absences) }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Profile Visit</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-profile-visit"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-3">
                <div class="card">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="./assets/compiled/jpg/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold">Responsable</h5>
                                <h6 class="text-muted mb-0">
                                    @foreach ($employes as $employe)
                                        @if ($employe->Matricule === session('user')->employe_Matricule)
                                            {{ $employe->nom }}
                                        @endif
                                    @endforeach
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Absents Aujourd'hui</h5>
                    </div>
                    <div class="card-content pb-4">

                        @forelse ($absences as $absence)
                            @if ($absence->DateDebut==date('Y-m-j') || $absence->DateFin>=date('Y-m-j'))
                                @foreach ($employes as $employe)
                                    @if ($absence->employe_Matricule === $employe->Matricule)
                                        <div class="recent-message d-flex px-4 py-3">
                                            <div class="avatar avatar-lg">
                                                <img src="./assets/compiled/jpg/4.jpg">
                                            </div>
                                            <div class="name ms-4">
                                                <h5 class="mb-1">{{ $employe->nom }}</h5>
                                                <h6 class="text-muted mb-0">{{ '@'.$absence->employe_Matricule }}</h6>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                        @empty
                            <span>Aucun Absence le {{ date('Y-m-j') }}</span>
                        @endforelse


                        <div class="px-4">
                            <a href="{{route('genererPDF')}}" class='btn btn-block btn-xl btn-success font-bold mt-3'>Exporter Format
                                PDF</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <script>
        var absence_par_moi={!! json_encode($absence_par_moi->toArray()) !!}
    </script>
@endsection
