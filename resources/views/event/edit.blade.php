@extends('layouts.app')

@section('content')
<div class="content" style="display: flex; align-items: center; flex-direction: column;">
    <div class="card" style="width: 50%; margin-top: 5%;">
        <div class="card-body">
            <form  action="{{ route('event.update', $citas->id) }}" method="POST"> 
                @csrf
                <div class="mb-1">
                    <label for="fisioterapeuta_id" class="form-label">Fisioterapeuta</label>
                    <select class="form-select form-select-sm" id="fisioterapeuta_id" name="fisioterapeuta_id" aria-label=".form-select-sm example">
                        @if ($fiste[0]->id = $citas->fisioterapeuta_id)
                            <option selected value="{{ $fiste[0]->id }}">{{ $fiste[0]->fiste_name }}</option>
                        @endif
                        @foreach ($fisioterapeutas as $fiste)
                            <option value="{{ $fiste->id }}">{{ $fiste->fiste_name }}</option>
                        @endforeach
                    </select>
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
                <div class="mb-3">
                    <label for="description" class="form-label">Descripcion</label>
                    <textarea class="form-control form-select-sm" name="description" aria-valuetext="" id="description"  rows="2" required>{{ $citas->description }}</textarea>
                </div>
                <div class="d-flex justify-content-around">
                    <button type="submit" class="btn btn-success btn-sm"  id="btnActualizar">Actualizar</button>
                    <a href="{{ route('citas') }}" class="btn btn-danger btn-sm">Cancelar</a>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection