@extends('Master.layouts')
@section('content')
    <div class="container mt-5 m-auto p-auto ">

        <form class="p-5 bg-light">
            <div class="bg-transparent p-2 text-light">
                <h4>Gestion Absence</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Matricule</label>
                    <select name="" id="" class="form-select">
                        <option value="">112233</option>
                        <option value="">112233</option>
                        <option value="">112233</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Raison</label>
                    <textarea>Entrez la raison d'absence !</textarea>
                </div>
                <div class="form-group">
                    <label>Date Debut</label>
                    <input type="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Date Fin</label>
                    <input type="date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Justification</label> <br>
                    <input type="file" class="form-file" required>
                </div>
            </div>
            <div class="modal-footer text-start d-flex justify-content-center ">
                <input type="submit" class="btn btn-success" value="Valider"> &nbsp;&nbsp;
                <input type="button" class="btn btn-default btn-outline-danger" value="Annuler">
            </div>
        </form>
    </div>
    <script src="https://cdn.tiny.cloud/1/vmcqdfrs3qyhxjqg4stnit6qa10kzou1yfp29zmekdtl26cq/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
        });
    </script>
@endsection
