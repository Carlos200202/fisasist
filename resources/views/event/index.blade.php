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

        .swal2-actions{
            justify-content: space-around !important;
            margin: 1.25em 70px 0 !important;
        }
        .noneValue{
            display: none
        }
    </style>

    <div class="container1">
        <div class="" id="agenda">
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agendar Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        {!! csrf_field() !!}
                        <div class="mb-1">
                            <label for="pat_document" class="form-label">Documento</label>
                            <input type="number" class="form-control form-control-sm" name="pat_document" id="pat_document"
                                aria-describedby="helpId" placeholder="" required>
                        </div>
                        <div class="mb-1">
                            <label for="pat_firstname" class="form-label">Nombre</label>
                            <input type="text" class="form-control form-control-sm" name="pat_firstname" id="pat_firstname" aria-describedby="helpId"
                                placeholder="" required>
                        </div>
                        <div class="mb-1">
                            <label for="pat_lastname" class="form-label">Apellido</label>
                            <input type="text" class="form-control form-control-sm" name="pat_lastname" id="pat_lastname" aria-describedby="helpId"
                                placeholder="" required>
                        </div>
                        <div class="mb-1">
                            <label for="fist_name" class="form-label">Fisioterapeuta</label>
                            <select class="form-select form-select-sm" id="fist_name" name="fist_name" aria-label=".form-select-sm example">
                                <option selected disabled>Seleccionar</option>
                                <option>Bob Dylan</option>
                                <option>Freddie Mercury</option>
                                <option>David Bowie</option>
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="description" class="form-label">Descripcion</label>
                            <textarea class="form-control form-control-sm" name="description" id="description" rows="2" required></textarea>
                        </div>
                        <div class="mb-1 noneValue">
                            <label for="resourceId" class="form-label">Espacio</label>
                            <input type="text" class="form-control form-control-sm" name="resourceId" id="resourceId" rows="2">
                        </div>
                        
                        <div class="mb-1">
                            <label for="flag_img" class="form-label">Riesgo</label>
                            <select class="form-select form-select-sm" name="flag_img" id="flag_img" aria-label=".form-select-sm example">
                                <option selected disabled>Seleccionar</option>
                                <option value="cdn-icons-png.flaticon.com/512/395/395841.png">Alto</option>
                                <option value="cdn-icons-png.flaticon.com/512/148/148880.png">Intermedio</option>
                                <option value="cdn-icons-png.flaticon.com/512/2107/2107961.png">Bajo</option>
                            </select>
                        </div>
                        <div class="mb-1 noneValue">
                            <label for="start" class="form-label">inicio</label>
                            <input type="text" class="form-control form-control-sm" name="start" id="start" aria-describedby="helpId"
                                placeholder="" required>
                        </div>
                        <div class="mb-1 noneValue">
                            <label for="end" class="form-label">fin</label>
                            <input type="text" class="form-control form-control-sm" name="end" id="end" aria-describedby="helpId"
                                placeholder="" required>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"  id="btnGuardar">Guardar</button>
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
                    <h5 class="modal-title">Vista de la Cita</h5>
                    <button type="button" id="btnClose" onclick="window.location='/citas'" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formView">
                        {!! csrf_field() !!}
                        <div class="mb-1 inputId">
                            <label for="id" class="form-label">id</label>
                            <input type="text" class="form-control  form-select-sm" name="id" id="id" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="mb-1">
                            <label for="pat_document" class="form-label">Documento</label>
                            <input type="number" class="form-control form-control-sm" name="pat_document" id="pat_document"
                                aria-describedby="helpId" placeholder="" required>
                        </div>
                        <div class="mb-1">
                            <label for="pat_firstname" class="form-label">Nombre</label>
                            <input type="text" class="form-control form-select-sm" name="pat_firstname" id="pat_firstname" aria-describedby="helpId"
                                placeholder="">
                        </div>
                        <div class="mb-1">
                            <label for="pat_lastname" class="form-label">Apellido</label>
                            <input type="text" class="form-control form-control-sm" name="pat_lastname" id="pat_lastname" aria-describedby="helpId"
                                placeholder="">
                        </div>
                        <div class="mb-1">
                            <label for="description" class="form-label">Descripcion</label>
                            <textarea class="form-control form-select-sm" name="description" id="description" rows="2"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnModificar">Modificar</button>
                    <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="eventUpdate" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Cita</h5>
                    <button type="button" onclick="window.location='/citas'" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formUpdate">
                        {!! csrf_field() !!}
                        <div class="mb-3">
                            <label for="pat_document" class="form-label">Documento</label>
                            <input type="number" class="form-control form-select-sm" name="pat_document" id="pat_document"
                                aria-describedby="helpId" placeholder="" required>
                        </div>
                        <div class="mb-3">
                            <label for="pat_firstname" class="form-label">Nombre</label>
                            <input type="text" class="form-control form-select-sm" name="pat_firstname" id="pat_firstname" aria-describedby="helpId"
                                placeholder="" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripcion</label>
                            <textarea class="form-control form-select-sm" name="description" id="description" rows="2" required></textarea>
                        </div>
                        <div class="mb-2 noneValue">
                            <label for="resourceId" class="form-label">Espacio</label>
                            <input type="text" class="form-control form-select-sm" name="resourceId" id="resourceId" rows="2" required>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"  id="btnActualizar">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
