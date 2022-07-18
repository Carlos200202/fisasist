@extends('layouts.app')

@section('content')
<div class="content" style="display: flex; align-items: center; flex-direction: column;">
    <div class="card" style="width: 50%; margin-top: 5%;">
        <div class="card-body">
            <form  action="{{ route('pacientes.update', $paciente->id) }}" method="POST"> 
                {!! csrf_field() !!}
                <div class="mb-1">
                    <input type="text" class="form-control form-control-sm" name="pat_firstname" id="pat_firstname"
                        aria-describedby="helpId" value="{{ $paciente->pat_firstname }}">
                </div>
                <div class="mb-1">
                    <input type="text" class="form-control form-control-sm" name="pat_lastname" id="pat_lastname"
                        aria-describedby="helpId" value="{{ $paciente->pat_lastname }}">
                </div>
                <div class="mb-1">
                    <input type="text" class="form-control form-control-sm" name="pat_document" id="pat_document"
                        aria-describedby="helpId" value="{{ $paciente->pat_document }}">
                </div>
                <div class="mb-1">
                    <input type="text" class="form-control form-control-sm" name="pat_ages" id="pat_ages"
                        aria-describedby="helpId" value="{{ $paciente->pat_ages }}">
                </div>
                <input type="submit" class="btn btn-primary btn-sm" value="Actualizar">
            </form>
        </div>
    </div>
</div>
@endsection