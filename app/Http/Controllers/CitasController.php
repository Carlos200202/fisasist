<?php

namespace App\Http\Controllers;

use App\Models\Citas;
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
        $search = trim($request->get('search'));
        $citas = DB::table('citas')
        ->select('id', 'pat_document', 'pat_firstname', 'pat_lastname', 'start', 'fist_name')
        ->where('pat_document', 'LIKE', '%'.$search.'%')
        ->orWhere('pat_firstname', 'LIKE', '%'.$search.'%')
        ->orWhere('pat_lastname', 'LIKE', '%'.$search.'%')
        ->orderBy('start', 'asc');
        // dd($search);
        return view('event.index', compact('citas', 'search'));
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
        request()->validate(Citas::$rules); //$request->all()
        $citas =  Citas::create($request->validate([
                'pat_document' => "required",
                'pat_firstname' => "required",
                'pat_lastname' => "required",
                'description' => "required",
                'fist_name' => "required",
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
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function show(Citas $citas)
    {
        //
        $citas = Citas::all();
        return response()->json($citas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $citas = Citas::find($id);
        return response()->json($citas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citas $citas)
    {
        //
        request()->validate(Citas::$rules);
        $citas->update($request->all());
        return response()->json($citas);
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
        $citas = Citas::find($id)->delete();
        return response()->json($citas);
    }
}
