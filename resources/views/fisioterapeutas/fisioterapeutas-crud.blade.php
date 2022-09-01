@extends('layouts.app')

@section('content')
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            box-sizing: border-box;
        }
        .table-responsive::-webkit-scrollbar {
            width: 7px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: #7d5a43;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: white;
        }

        .navbar-nav {
            align-items: center
        }
        .table-responsive {
            margin: 10px 0;
            border-radius: 10px 0 0 10px;
            background: #fff;
        }
        .table-wrapper {
            padding: 20px 25px;
            width: 100%;
            height: 85vh;
        }
        .table-title {
            padding-bottom: 15px;
            background: #7d5a43;
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
            position: sticky;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        .table-title .btn-group {
            float: right;
        }
        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }
        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }
        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }
        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }
        .modal .modal-title {
            display: inline-block;
        }
        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }
        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }
        .modal form label {
            font-weight: normal;
        }
        .container-fiste {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }
        .card-fiste {
            width: 320px;
            height: 390px;
            background: #fff;
            border-radius: 10px;
            position: relative;
            display: flex;
            cursor: pointer;
            margin-top: 15px;
            justify-content: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.13);
        }
        .card-fiste::before {
            content: "";
            position: absolute;
            top: 2%;
            width: 95%;
            height: 120px;
            z-index: 1;
            background: var(--hex-color-fiste);
            border-radius: 10px 10px 0 0;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.13);
        }
        .card-fiste .img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            z-index: 10;
            transform: translateY(50px);
            border: 5px solid #fff;
            overflow: hidden;
            position: absolute;
            background: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.13);
        }
        .card-fiste .img img {
            width: 120%;
            height: 120%;
            transform: translate(-8%, -8%);
        }
        .content-fiste {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: flex-end;
            flex-direction: column;
            z-index: 20;
            align-items: center;
        }
        .content-fiste p {
            margin: 0 0;
        }
        .center-fiste {
            width: 100%;
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: 10px;
        }
        .box-fiste {
            padding: 10px 25px;
            border-radius: 10px;
            text-align: center;
        }
        .box-fiste h1 {
            font-size: 20px;
        }
        .box-fiste:hover {
            background-color: rgba(128, 128, 128, 0.137);
        }
        .btn-option {
            width: 80%;
            margin: 0 5px;
            padding: 10px;
            border-radius: 10px;
            outline: none;
            border: none;
            transform: translateY(10px);
            color: #fff;
            font-weight: 600;
            font-size: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.13);
            cursor: pointer;
        }
        .btn-option:hover {
            background: rgb(255, 159, 130);
        }
        .buttons-options {
            display: flex;
            justify-content: space-between;
        }
    </style>
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Administrador de <b>Fisioterapeutas</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a id="addEmployeeBtn" class="btn btn-success" data-toggle="modal"><i
                                    class='bx bx-folder-plus'></i><span> Nuevo Fisioterapeuta</span></a>
                        </div>
                    </div>
                </div>
                <div class="container-fiste">
                    @foreach ($fisioterapeutas as $fisioterapeuta)
                        <div class="card-fiste" style="--hex-color-fiste: {{ $fisioterapeuta->fiste_hexcolor }}">
                            <div class="img">
                                <img src="https://tse3.mm.bing.net/th?id=OIP.zc3XRPZxUt4Xt7zDZYLa_wHaHa&pid=Api&P=0"
                                    alt="">
                            </div>
                            <div class="content-fiste">
                                <h2>{{ $fisioterapeuta->fiste_name }}</h2>
                                <p>Fiste</p>
                                <div class="center-fiste">
                                    <div class="box-fiste">
                                        <h1>Email</h1>
                                        <p>{{ $fisioterapeuta->fiste_email }}</p>
                                    </div>
                                    <div class="box-fiste">
                                        <h1>Phone</h1>
                                        <p>{{ $fisioterapeuta->fiste_cell_phone }}</p>
                                    </div>
                                </div>
                                <div class="buttons-options">
                                    <button class="btn-option" style="
                                    background: #728cff;">View</button>
                                    <button class="btn-option" style="
                                    background: #fdff72;">Edit</button>
                                    <button class="btn-option" style="
                                    background: #ff9472;">Delete</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="modalPaciente" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form autocomplete="off">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar paciente</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form autocomplete="off">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form autocomplete="off">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
