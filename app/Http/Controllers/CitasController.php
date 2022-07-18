<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Fisioterapeuta;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $fisioterapeutas = Fisioterapeuta::all();
        $citas = Cita::all();
        $fiste = DB::select('select `fisioterapeutas`.`id`, `fisioterapeutas`.`fiste_name`  from `citas` inner join `fisioterapeutas` on '.$citas[0]->fisioterapeuta_id.' = `fisioterapeutas`.`id`');
        // dd($pacientes);
        return view('event.index')->with(compact('fisioterapeutas', 'fiste'));
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
                'description' => "required",
                'fisioterapeuta_id' => "required",
                'resourceId' => "required",
                'flag_img' => "required",
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
        $sql = 'SELECT pacientes.pat_firstname, pacientes.pat_lastname, pacientes.pat_document, 
        fisioterapeutas.fiste_id, fisioterapeutas.fiste_name, fisioterapeutas.fiste_hexcolor, 
        citas.id, citas.paciente_id, citas.fisioterapeuta_id, citas.description, citas.flag_img, 
        citas.resourceId, citas.start, citas.end, citas.id as id_citas, citas.start as date_start FROM citas INNER JOIN pacientes 
        ON citas.paciente_id = pacientes.id INNER JOIN fisioterapeutas  ON 
        citas.fisioterapeuta_id = fisioterapeutas.id';
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
        $fiste = DB::select('select `fisioterapeutas`.`id`, `fisioterapeutas`.`fiste_name`  from `citas` inner join `fisioterapeutas` on '.$citas->fisioterapeuta_id.' = `fisioterapeutas`.`id`');
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
            'description' => 'required'
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
}
