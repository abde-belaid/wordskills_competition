@extends('Master.layouts')
<style>
    th{
        color: white !important;
    }
</style>
@section('content')

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="">
                    <form action="">
                        <div class="row">
                            <div class="col-2">

                                <input type="text" class="form-control" placeholder="Mot cle">
                            </div>
                            <div class="col-2">

                                <select name="" id="" class="form-select ">
                                    <option value="">Celebataire</option>
                                    <option value="">Celebataire</option>
                                    <option value="">Celebataire</option>
                                </select>
                            </div>
                            <div class="col-2">

                                <button class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table table-striped table-hover">
                    <thead style="background-color: rgb(48, 47, 47);" class="">
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th  >Photo</th>
                            <th>Matricule</th>
                            <th>CIN</th>
                            <th>Nom</th>
                            <th>Date <br>naissance</th>
                            <th>Etat Civil</th>
                            <th>Nombre <br> Enfants</th>
                            <th>Date <br> Recrutement</th>
                            <th>Echelle</th>
                            <th>Adresse</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                    <label for="checkbox1"></label>
                                </span>
                            </td>
                            <td><img style="border-radius: 50%; width:80px; height:auto;"
                                    src="https://cdn.pixabay.com/photo/2017/02/25/22/04/user-icon-2098873_1280.png" /></td>
                            <td>22653</td>
                            <td>UA5793</td>
                            <td>Alami</td>
                            <td>06/10/2021</td>
                            <td>Marié(e)</td>
                            <td>2</td>
                            <td>06/10/2021</td>
                            <td>06</td>
                            <td>308 Hay alwahda Ouarzazate</td>
                            <td>
                                <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons"
                                        data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons"
                                        data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="clearfix d-flex justify-content-end">
                    {{-- <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div> --}}
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
