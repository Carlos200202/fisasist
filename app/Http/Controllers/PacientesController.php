<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('event.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pacientes  $pacientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente, $id)
    {
        //
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.edit-paciente', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $paciente = Paciente::find($id);
        $request->validate([
            'pat_firstname' => 'required',
            'pat_lastname' => 'required',
            'pat_document' => 'required',
            'pat_ages' => 'required',
        ]);
        $paciente->update($request->all());

        return redirect()->route('citas')
            ->with('success','Paciente updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
    }

    public function autocompletePat(Request $request)
    {
        $term = $request->get('term');
        $querys = Paciente::where('pat_document', 'LIKE', '%'.$term.'%')->get();
        $data = [];
        foreach ($querys as $querys){
            $data[] = [
                'label' => $querys->pat_document,
                'value' => $querys->id
            ];
        }
        return $data;
    }
}
