<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Fisioterapeuta;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $document = trim($request->get('pat_document'));
        $paciente = Paciente::where('pat_document', '='. $document)->get();
        // dd($paciente);

        $fisioterapeutas = Fisioterapeuta::all();
        $citas = Cita::all();
        $fiste = DB::select('select `fisioterapeutas`.`id`, `fisioterapeutas`.`fiste_name`  from `citas` inner join `fisioterapeutas` on '.$citas[0]->fisioterapeuta_id.' = `fisioterapeutas`.`id`');
        // dd($pacientes);
        return view('event.index')->with(compact('fisioterapeutas', 'fiste', 'paciente', 'document'));
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
        request()->validate(Cita::$rules);
        $citas =  Cita::create($request->validate([
                'paciente_id' => "required",
                'fisioterapeuta_id' => "required",
                'observations' => "required",
                'type_visit' => "required",
                'contact_name' => "required",
                'contact_relationship' => "required",
                'contact_cell_phone' => "required",
                'process' => "required",
                'resourceId' => "required",
                'start' => "required",
                'end' => "required",
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $citas
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        // $sql = 'SELECT * FROM citas';
        $sql = 'SELECT entidades.entity_name, pacientes.pat_firstname, pacientes.pat_secondname, pacientes.pat_lastname, 
        pacientes.pat_second_lastname, pacientes.pat_document, pacientes.pat_gender, pacientes.pat_birth_date, 
        pacientes.pat_entity_id, pacientes.pat_number_policy, pacientes.pat_phone, pacientes.pat_cell_phone, 
        pacientes.pat_email, fisioterapeutas.fiste_phone, fisioterapeutas.fiste_name, fisioterapeutas.fiste_hexcolor, 
        citas.id, citas.paciente_id, citas.fisioterapeuta_id, citas.type_visit, citas.process, citas.observations,
        citas.contact_name, citas.contact_relationship, citas.contact_cell_phone, citas.resourceId, 
        citas.start, citas.end, citas.id as id_citas, citas.start as date_start FROM citas INNER JOIN pacientes 
        ON citas.paciente_id = pacientes.id INNER JOIN fisioterapeutas ON citas.fisioterapeuta_id = fisioterapeutas.id 
        INNER JOIN entidades ON pacientes.pat_entity_id = entidades.id';
        $citas = DB::select($sql);
        // dd($citas);
        return response()->json($citas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $citas = Cita::findOrFail($id);
        $fisioterapeutas = Fisioterapeuta::all();
        $fiste = DB::select('`fisioterapeutas`.`id`, `fisioterapeutas`.`fiste_name`  from `citas` inner join `fisioterapeutas` on '.$citas->fisioterapeuta_id.' = `fisioterapeutas`.`id`');
        // dd($fiste);
       
        return view('event.edit', compact('citas', 'fisioterapeutas', 'fiste'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $citas = Cita::find($id);
        $this->validate($request, [
            'fisioterapeuta_id' => 'required',
            'observations' => 'required'
        ]);
    
        $input = $request->all();
    
        $citas->fill($input)->save();
        $citas->save();
        return redirect()->route('citas');
    }
    public function updateDrop(Request $request, $id)
    {
        //
        $citas = Cita::find($id);
        $cita = $request->all();
        $citas->fill($cita);
        $citas->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $cita = Cita::find($id)->delete();
        // dd($cita);
        $cita = DB::statement('DELETE FROM `citas` WHERE `citas`.`id` ='.$id);
        
        return response()->json($cita);
    }

    public function busqueda(Request $request)
    {
        $document = $request->pat_document;
        $paciente = Paciente::where('pat_document', '=', $document)->get();
        $data = [
                "paciente"=>$paciente,
            ];
        return response()->json($data);
        
    }
}
