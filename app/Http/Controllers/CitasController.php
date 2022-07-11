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

        return view('event.index')->with(compact('fisioterapeutas'));
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
        request()->validate(Cita::$rules); //$request->all()
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
        $sql = 'SELECT * FROM citas';
        $citas = DB::select($sql);
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
        $fiste = DB::select('select `fisioterapeutas`.`fiste_name` from `citas` inner join `fisioterapeutas` on `citas`.`fisioterapeuta_id` = `fisioterapeutas`.`id`');
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
        // request()->validate(Cita::$rules);
        // $cita->update($request->all());
        // dd(response()->json($cita));
        // return response()->json($cita);
        $cita = Cita::find($id);
        $cita->name = $request->input('fisioterapeuta_id');
        $cita->email = $request->input('description');
        // $cita->course = $request->input('course');
        // $cita->section = $request->input('section');
        $cita->save();
        return redirect('/citas')->with('success', 'Cita updated.');
        // return redirect()->back()->with('status','Student Updated Successfully');
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
        $cita = Cita::find($id)->delete();
        return response()->json($cita);
    }
}
