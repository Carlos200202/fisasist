@extends('layouts.app')

@section('content')
<div class="row container">
    {{-- id="formUpdate" --}}
    <form  action="" method="POST"> 
        @method('PATCH') 
        @csrf
        <div class="mb-1">
            <label for="fisioterapeuta_id" class="form-label">Fisioterapeuta</label>
            <select class="form-select form-select-sm" id="fisioterapeuta_id" name="fisioterapeuta_id" aria-label=".form-select-sm example">
                <option selected>{{ $fiste->fiste_name }}</option>
                @foreach ($fisioterapeutas as $fiste)
                    <option value="{{ $fiste->id }}">{{ $fiste->fiste_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripcion</label>
            <textarea class="form-control form-select-sm" name="description" aria-valuetext="" id="description"  rows="2" required>{{ $citas->description }}</textarea>
        </div>
    </form>
    <button type="submit" class="btn btn-success"  id="btnActualizar">Actualizar</button>
</div>
@endsection