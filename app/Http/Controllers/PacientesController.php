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
        $pacientes = Paciente::orderBy('id','desc')->paginate(5);
        return view('pacientes.pacientes-crud', compact('pacientes'));
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
        $request->validate([
            'pat_firstname' => 'required',
            'pat_secondname' => 'required',
            'pat_lastname' => 'required',
            'pat_second_lastname' => 'required',
            'pat_document' => 'required',
            'pat_gender' => 'required',
            'pat_birth_date' => 'required',
            'pat_location' => 'required',
            'pat_entity_id' => 'required',
            'pat_number_policy' => 'required',
            'pat_phone' => 'required',
            'pat_cell_phone' => 'required',
            'pat_email' => 'required',
        ]);
      
        Paciente::create($request->all());
       
        return redirect()->route('pacientes.crud')
                        ->with('success','Product created successfully.');
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

    
}
