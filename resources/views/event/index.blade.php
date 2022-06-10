@extends('layouts.app')
@section('content')
    <style>
        h2{
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
  .fc-event-main{
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
  .content-event{
    align-items: center;
    flex-direction: column;
    display: flex;
  }
  .fc-highlight, .fc-timegrid-slot-label-frame {
    height: 47.5px;
    display: flex;
  }
  .fc .fc-toolbar.fc-header-toolbar {
    margin-bottom: 0px;
  }
  .fc .fc-daygrid-body-unbalanced .fc-daygrid-day-events{
    display: flex;
    flex-wrap: wrap;
  }
  .image-event{
    width: 15px;
  }
  .box-event{
    width:15px; 
    height: 15px;
    border: white 0.1px solid
  }
  .flag-event{
    width: 15px;
  }
    </style>

    <div class="container1">
        <div class="" id="agenda">
            schedule
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
                    <form action="" id="form">
                        {!! csrf_field() !!}
                        <div class="mb-3">
                          <label for="document" class="form-label">Documento</label>
                          <input type="text" class="form-control" name="document" id="document" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="mb-3">
                          <label for="nombre" class="form-label">Nombre</label>
                          <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="mb-3">
                          <label for="description" class="form-label">Descripcion</label>
                          <textarea class="form-control" name="description" id="description" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                          <label for="start" class="form-label">inicio</label>
                          <input type="text" class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="mb-3">
                          <label for="end" class="form-label">fin</label>
                          <input type="text" class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
                    <button type="button" class="btn btn-primary" id="btnModificar">Modificar</button>
                    <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
    
    {{-- <script>
        var modelId = document.getElementById('modelId');
    
        modelId.addEventListener('show.bs.modal', function (event) {
              // Button that triggered the modal
              let button = event.relatedTarget;
              // Extract info from data-bs-* attributes
              let recipient = button.getAttribute('data-bs-whatever');
    
            // Use above variables to manipulate the DOM
        });
    </script> --}}
    
@endsection