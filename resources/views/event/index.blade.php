@extends('layouts.app')
@section('content')
    <style>
        h2 {
            font-size: 20px !important;
        }

        a {
            text-decoration: none;
        }

        .fc-col-header-cell-cushion {
            font-size: 10px;
        }

        .fc-timegrid-slot-label-frame,
        .fc-scrollgrid-shrink-frame {
            height: 100%;
        }

        .fc-event-time {
            display: none;
        }

        .fc-event-main {
            overflow: hidden;
        }

        .fc .fc-toolbar.fc-header-toolbar {
            margin: none;
        }

        .fc .fc-toolbar-title {
            font-size: 30px;
        }

        .fc-event-resizer.fc-event-resizer-end {
            display: none;
        }

        .content-event {
            align-items: center;
            flex-direction: column;
            display: flex;
        }

        .fc-highlight,
        .fc-timegrid-slot-label-frame {
            height: 47.5px;
            display: flex;
        }

        .fc .fc-toolbar.fc-header-toolbar {
            margin: 10px 20px;
        }

        .fc .fc-daygrid-body-unbalanced .fc-daygrid-day-events {
            display: flex;
            flex-wrap: wrap;
        }

        .image-event {
            width: 15px;
        }

        .box-event {
            width: 15px;
            height: 15px;
            border: white 0.1px solid
        }

        .flag-event {
            width: 15px;
        }

        .swal2-actions {
            justify-content: space-around !important;
            margin: 1.25em 70px 0 !important;
        }

        .noneValue {
            display: none
        }

        textarea {
            resize: none;
        }

        .content table tbody tr td thead tr th,
        .content table tbody,
        .content table td,
        .content table th {
        border: none !important;
        padding: 3px !important;
        }
    </style>

    <div class="container1">
        <div class="" id="agenda"></div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="mb-1 pb-1 pb-md-2 mb-md-2 px-md-2">Agendamiento</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="px-md-2" id="form" method="POST">
                        {!! csrf_field() !!}
                        <div class="content d-flex align-items-start">
                            <table class="table" cellspacing="0">
                                <p id="content"></p>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <h6>Documento</h6>
                                        </th>
                                        <td>
                                            <input type="text" id="pat_document" name="pat_document"
                                            class="form-control form-control-sm" />
                                        </td>
                                    </tr>

                                    <tr class="noneValue">
                                        <th scope="row">
                                            <h6>Pat id</h6>
                                        </th>
                                        <td>
                                            <input type="number" id="paciente_id" name="paciente_id"
                                                class="form-control form-control-sm" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <h6>1er Nombre</h6>
                                        </th>
                                        <td>
                                            <input type="text" id="pat_firstname" name="pat_firstname"
                                                class="form-control form-control-sm" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <h6>2do Nombre</h6>
                                        </th>
                                        <td>
                                            <input type="text" id="pat_secondname" name="pat_secondname"
                                                class="form-control form-control-sm" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <h6>1er Apellido</h6>
                                        </th>
                                        <td>
                                            <input type="text" id="pat_lastname" name="pat_lastname"
                                                class="form-control form-control-sm" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <h6>2do Apellido</h6>
                                        </th>
                                        <td>
                                            <input type="text" id="pat_second_lastname" name="pat_second_lastname"
                                                class="form-control form-control-sm" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <h6>Sexo</h6>
                                        </th>
                                        <td>
                                            <input type="text" name="pat_gender" id="pat_gender" class="form-control form-control-sm">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <h6>Nacimiento</h6>
                                        </th>
                                        <td>
                                            <input type="date" id="pat_birth_date" name="pat_birth_date"
                                                class="form-control form-control-sm" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <h6>Edad</h6>
                                        </th>
                                        <td>
                                            <input type="number" id="pat_ages" style="width: 40px;"
                                                name="pat_ages" class="form-control form-control-sm " disabled />
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                            <table class="table">
                                <tbody>


                                    <tr>
                                        <th scope="row">
                                            <h6>Direccion</h6>
                                        </th>
                                        <td>
                                            <input type="text" id="pat_location" name="pat_location"
                                                class="form-control form-control-sm" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <h6>Celular</h6>
                                        </th>
                                        <td>
                                            <input type="text" id="pat_cell_phone" name="pat_cell_phone"
                                                class="form-control form-control-sm" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <h6>Teléfono</h6>
                                        </th>
                                        <td>
                                            <input type="text" id="pat_phone" name="pat_phone"
                                                class="form-control form-control-sm" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <h6>E-mail</h6>
                                        </th>
                                        <td>
                                            <input type="email" id="pat_email" name="pat_email"
                                                class="form-control form-control-sm" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <h6>Entidad</h6>
                                        </th>
                                        <td>
                                            <input type="text" name="entity_name" id="entity_name" class="form-control form-control-sm">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <h6>Nº Póliza</h6>
                                        </th>
                                        <td>
                                            <input type="number" id="pat_number_policy" name="pat_number_policy"
                                                class="form-control form-control-sm" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <h6>Remite</h6>
                                        </th>
                                        <td>
                                            <select class="form-select form-select-sm" id="pat_medical"
                                                name="pat_medical">
                                                <option selected disabled>Seleccionar</option>
                                                @foreach ($medicos as $med)
                                                    <option value="{{ $med->id }}">{{ $med->med_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                        <div class="content d-flex align-items-start">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <h6>Tipo Visita</h6>
                                        </th>
                                        <td>
                                            <input type="text" id="type_visit" name="type_visit"
                                                class="form-control form-control-sm" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <h6>Procedimiento</h6>
                                        </th>
                                        <td>
                                            <select class="form-select form-select-sm" id="process" name="process">
                                                <option value="1" disabled selected>...</option>
                                                <option value="2">COLUMNA CERVICAL</option>
                                                <option value="3">PIERNA</option>
                                                <option value="4">Other</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <h6>Fisioterapeuta</h6>
                                        </th>
                                        <td>
                                            <select class="form-select form-select-sm" id="fisioterapeuta_id"
                                                name="fisioterapeuta_id">
                                                <option selected disabled>Seleccionar</option>
                                                @foreach ($fisioterapeutas as $fiste)
                                                    <option value="{{ $fiste->id }}">{{ $fiste->fiste_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table">
                                <tbody>
                                    <td>
                                        <div class="form-floating">
                                            <div>
                                                <h6>Observaciones</h6>
                                                <textarea class="form-control" style="resize: none;" name="observations" rows="2" cols="20"
                                                    id="observations"></textarea>
                                            </div>
                                        </div>
                                    </td>
                                </tbody>
                            </table>
                        </div>
                        <div class="content">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <h5>Contacto de Emergencia</h5>
                                        <td>
                                            <thead>
                                                <tr>
                                                    <th scope="col">
                                                        <h6>Nombre</h6>
                                                    </th>
                                                    <th scope="col">
                                                        <h6>Parentesco</h6>
                                                    </th>
                                                    <th scope="col">
                                                        <h6>Teléfono</h6>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" id="contact_name" name="contact_name"
                                                            class="form-control form-control-sm" />
                                                    </td>
                                                    <td>
                                                        <select class="form-select form-select-sm" id="contact_relationship"
                                                            name="contact_relationship">
                                                            <option value="1" disabled selected>Seleccionar</option>
                                                            <option value="2">Esposa</option>
                                                            <option value="3">Hijo</option>
                                                            <option value="4">Other</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" id="contact_cell_phone" name="contact_cell_phone"
                                                            class="form-control form-control-sm" />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mb-1 noneValue">
                            <label for="start" class="form-label">inicio</label>
                            <input type="text" class="form-control form-control-sm" name="start" id="start"
                                aria-describedby="helpId" placeholder="" required>
                        </div>
                        <div class="mb-1 noneValue">
                            <label for="end" class="form-label">fin</label>
                            <input type="text" class="form-control form-control-sm" name="end" id="end"
                                aria-describedby="helpId" placeholder="" required>
                        </div>
                        <div class="mb-1 noneValue">
                            <label for="resourceId" class="form-label">Espacio</label>
                            <input type="text" class="form-control form-control-sm" name="resourceId" id="resourceId"
                                rows="2">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm" id="btnGuardar">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="eventView" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cita</h5>
                    <button type="button" id="btnClose" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formView">
                        {!! csrf_field() !!}
                        <div class="mb-1 inputId">
                            <input type="hidden" class="form-control  form-select-sm" value="" name="id"
                                id="id" aria-describedby="helpId" disabled>
                        </div>
                        <div class="">
                            <div class="d-flex justify-content-between" style="margin: 0">
                                <div class="mb-1 col-4">
                                    <label for="pat_document" class="form-label">Documento</label>
                                    <input type="text" class="form-control  form-select-sm" name="pat_document"
                                        id="pat_document" aria-describedby="helpId" disabled>
                                </div>
                                <div class="mb-1 col-3">
                                    <label for="pat_firstname" class="form-label">Nombre</label>
                                    <input type="text" class="form-control  form-select-sm" name="pat_firstname"
                                        id="pat_firstname" aria-describedby="helpId" disabled>
                                </div>
                                <div class="mb-1 col-3">
                                    <label for="pat_lastname" class="form-label">Apellido</label>
                                    <input type="text" class="form-control  form-select-sm" name="pat_lastname"
                                        id="pat_lastname" aria-describedby="helpId" disabled>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm" id="btnEditarPaciente">editar <i
                                    class='bx bxs-user-rectangle'></i></button>
                        </div>


                        <div class="mb-1 col-3">
                            <label for="fiste_name" class="form-label">Fisioterapeuta</label>
                            <input type="text" class="form-control  form-select-sm" name="fiste_name" id="fiste_name"
                                aria-describedby="helpId" disabled>
                        </div>
                        <div class="mb-1">
                            <label for="description" class="form-label">Observaciones</label>
                            <textarea class="form-control form-select-sm" name="description" id="description" rows="2" disabled></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" id="btnEditar" aria-label="editar"><i
                            class='bx bx-edit'></i></button>
                    <button type="button" class="btn btn-danger btn-sm" id="btnEliminar"><i
                            class='bx bxs-trash'></i></button>
                </div>
            </div>
        </div>
    </div>
    
@endsection
