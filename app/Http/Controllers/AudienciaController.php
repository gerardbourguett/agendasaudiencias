<?php

namespace App\Http\Controllers;

use App\Models\Audiencia;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AudienciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $id = rand(1, 9999999);
        return view('audiencias.index', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        request()->validate(Audiencia::$rules);
        $audiencia = Audiencia::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Audiencia $audiencia)
    {
        //
        $audiencia = Audiencia::all();
        return response()->json($audiencia);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $audiencia = Audiencia::find($id);


        return response()->json($audiencia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Audiencia $audiencia)
    {
        //
        request()->validate(Audiencia::$rules);
        $audiencia->update($request->all());
        return response()->json($audiencia);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $audiencia = Audiencia::find($id)->delete();
        return response()->json($audiencia);
    }
}
