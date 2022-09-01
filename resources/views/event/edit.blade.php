@extends('layouts.app')

@section('content')
    <div class="content" style="display: flex; align-items: center; flex-direction: column;">
        <div class="card" style="width: 50%; margin-top: 5%;">
            <div class="card-body">
                <form autocomplete="off" action="{{ route('event.update', $citas->id) }}" method="POST">
                    @csrf
                    <div class="content d-flex align-items-start">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <h6>Remite</h6>
                                    </th>
                                    <td>
                                        <input class="form-control form-control-sm" id="med_name" name="med_name" value="{{ $citas->pat_medical }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h6>Tipo Visita</h6>
                                    </th>
                                    <td>
                                        <input type="text" id="type_visit" name="type_visit"
                                            class="form-control form-control-sm" value="{{ $citas->type_visit }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h6>Procedimiento</h6>
                                    </th>
                                    <td>
                                        <input class="form-control form-control-sm" id="process" name="process"
                                        value="{{ $citas->process }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <h6>Fisioterapeuta</h6>
                                    </th>
                                    <td>
                                        <select class="form-select form-select-sm" id="fisioterapeuta_id" name="fisioterapeuta_id"
                                            aria-label=".form-select-sm example">
                                            @if ($fiste[0]->id = $citas->fisioterapeuta_id)
                                                <option selected value="{{ $fiste[0]->id }}">{{ $fiste[0]->fiste_name }}</option>
                                            @endif
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
                                            <textarea class="form-control" style="resize: none;" name="observations" rows="6" cols="30" id="observations"
                                                >{{ $citas->observations }}</textarea>
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
                                                        class="form-control form-control-sm" value="{{ $citas->contact_name }}"/>
                                                </td>
                                                <td>
                                                    <input class="form-control form-control-sm" id="contact_relationship"
                                                        name="contact_relationship" value="{{ $citas->contact_relationship }}"/>
                                                </td>
                                                <td>
                                                    <input type="number" id="contact_cell_phone" name="contact_cell_phone"
                                                        class="form-control form-control-sm" value="{{ $citas->contact_cell_phone }}"/>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="d-flex justify-content-around">
                <button type="submit" class="btn btn-success btn-sm" id="btnActualizar">Actualizar</button>
                <a href="{{ route('citas') }}" class="btn btn-danger btn-sm">Cancelar</a>
            </div>

            </form>
        </div>
    </div>
    </div>
@endsection
