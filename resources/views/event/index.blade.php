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
                        {{-- <div class="mb-3 inputId">
                          <label for="id" class="form-label">id</label>
                          <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                        </div> --}}
                        <div class="mb-3">
                            <label for="document" class="form-label">Documento</label>
                            <input type="number" class="form-control" name="document" id="document"
                                aria-describedby="helpId" placeholder="" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                                placeholder="" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripcion</label>
                            <textarea class="form-control" name="description" id="description" rows="2" required></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="resourceId" class="form-label">Espacio</label>
                            <input type="text" class="form-control" name="resourceId" id="resourceId" rows="2" required>
                            {{-- <select class="form-select" id="resourceId" name="resourceId"
                                aria-label="Example select with button addon" required>
                                <option selected disabled>Choose...</option>
                                <option value='01'>AB0</option>
                                <option value='02'>AB1</option>
                                <option value='03'>AB2</option>
                                <option value='04'>AB3</option>
                                <option value='05'>AB4</option>
                                <option value='06'>MIX5</option>
                                <option value='07'>MIX6</option>
                                <option value='08'>CER7</option>
                                <option value='09'>CER8</option>
                                <option value='10'>CER8</option>
                                <option value='11'>MAN1</option>
                                <option value='12'>MAN2</option>
                                <option value='13'>MAN3</option>
                                <option value='14'>MAN4</option>
                                <option value='15'>MAN5</option>
                                <option value='16'>MAN6</option>
                                <option value='17'>MAN7</option>
                                <option value='18'>MAN8</option>
                                <option value='19'>GIM1</option>
                                <option value='20'>GIM2</option>
                                <option value='21'>GIM3</option>
                                <option value='22'>GIM4</option>
                                <option value='23'>GIM5</option>
                                <option value='24'>GIM6</option>
                                <option value='25'>GIM7</option>
                                <option value='26'>GIM8</option>
                                <option value='27'>GIM9</option>
                                <option value='28'>PIS1</option>
                                <option value='29'>PIS2</option>
                                <option value='30'>PIS3</option>
                                <option value='31'>AC1</option>
                                <option value='32'>AC2</option>
                                <option value='33'>AC3</option>
                                <option value='34'>COM1</option>
                                <option value='35'>COM2</option>
                                <option value='36'>COM3</option>
                                <option value='37'>COM4</option>
                                <option value='38'>COM5</option>
                            </select> --}}
                        </div>
                        <div class="mb-3">
                            <label for="start" class="form-label">inicio</label>
                            <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId"
                                placeholder="" required>
                        </div>
                        <div class="mb-3">
                            <label for="end" class="form-label">fin</label>
                            <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId"
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
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Vista de la Cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formView">
                        {!! csrf_field() !!}
                        <div class="mb-3 inputId">
                        <label for="id" class="form-label">id</label>
                        <input type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="" disabled>
                      </div>
                        <div class="mb-3">
                            <label for="document" class="form-label">Documento</label>
                            <input type="number" class="form-control" name="document" id="document"
                                aria-describedby="helpId" placeholder="" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                                placeholder="" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripcion</label>
                            <textarea class="form-control" name="description" id="description" rows="2" disabled></textarea>
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
@endsection
