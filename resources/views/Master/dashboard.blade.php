@extends('Master.layouts')
@section('tittre', 'Dashboard - Mazer Admin Dashboard')
@section('content')


<div id="app">
        <header class="mb-3 text-start mx-5 my-0">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-1 fw-bolder"></i>
            </a>
        </header>
    <div id="sidebar">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header position-relative">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <a href="index.html"><span class="text-dark fs-4"><span
                                    class="text-info">HR</span>-ACCESS</span></a>
                    </div>
                    <div class="sidebar-toggler  x">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>

                    <li class="sidebar-item active ">
                        <a href="{{route('home')}}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{route('ListeEmployer')}}" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>

                            <span>Employées</span>
                        </a>
                    </li>

                    <li class="sidebar-item">

                        <a href="{{route('listeServices')}}" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>

                            <span>Services</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{route('listePostes')}}" class='sidebar-link '>
                            <i class="bi bi-file-earmark-medical-fill"></i>

                            <span class="">Postes</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{route('listeAffectation')}}" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Affectations</span>
                        </a>
                    </li>

                    <li class="sidebar-item  ">
                        <a href="{{route('listeAbsence')}}" class='sidebar-link'>
                            <i class="bi bi-file-earmark-medical-fill"></i>
                            <span>Absences</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="main">
        
        @yield('contenu')
    </div>
</div>

@endsection
