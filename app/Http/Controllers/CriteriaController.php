<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criterios = \App\Criteria::get();
        return view('criterios')->with('criterios', $criterios);
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
        $data = $request->all();
        unset($data["_token"]);
        $criterio = new \App\Criteria;
        $criterio->fill([
            'name' => $data['name'],
            'peso' => $data['peso']
        ]);
        $criterio->save();
        $criterios = \App\Criteria::get();
        return view('criterios')->with('criterios', $criterios);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $criterio = \App\Criteria::find($id);
        $criterios = $criterio->proyects;
        foreach ($criterios as $crit) {
            $crit->delete();
        }
        $criterio->delete();
        $criterios = \App\Objective::get();
        return view('criterios')->with('criterios', $criterios);
    }
}
