<?php

namespace App\Http\Controllers;

use App\Models\Fisioterapeuta;
use Illuminate\Http\Request;

class FisioterapeutasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fisioterapeutas = Fisioterapeuta::orderBy('id','desc')->paginate(5);
        return view('fisioterapeutas.fisioterapeutas-crud', compact('fisioterapeutas'));
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
     * @param  \App\Models\Fisioterapeuta  $fisioterapeuta
     * @return \Illuminate\Http\Response
     */
    public function show(Fisioterapeuta $fisioterapeuta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fisioterapeuta  $fisioterapeuta
     * @return \Illuminate\Http\Response
     */
    public function edit(Fisioterapeuta $fisioterapeutas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fisioterapeuta  $fisioterapeuta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fisioterapeuta $fisioterapeuta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fisioterapeuta  $fisioterapeuta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fisioterapeuta $fisioterapeuta)
    {
        //
    }
}
