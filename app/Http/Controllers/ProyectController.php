<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyects = \App\Proyect::get();
        $criterios = \App\Criteria::get();
        $objectives = \App\Objective::get();
        return view('proyects')->with('proyects', $proyects)->with('criterios', $criterios)->with('objectives', $objectives);
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
        $proyect = new \App\Proyect;
        $proyect->fill([
            'name' => $data['name']
        ]);
        $proyect->save();
        $criterios = $data['criterios'];
        foreach ($criterios as $criterio) {
            $cr = \App\Criteria::find($criterio['idCriterio']);
            $crit_proy = new \App\CriteriaProyect;
            //dd($cr);
            $crit_proy->fill([
                'idCriteria' => $cr->id,
                'idProyect' => $proyect->id,
                'valueC' => $criterio['value']
            ]);
            $crit_proy->save();
        }
        $objectives = $data['objectives'];
        foreach ($objectives as $objective) {
            $obj = \App\Objective::find($objective['idObjective']);
            $obj_proy = new \App\ObjectiveProyect;
            $obj_proy->fill([
                'idObjective' => $obj->id,
                'idProyect' => $proyect->id
            ]);
            $obj_proy->save();
        }
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
        $proyect = \App\Proyect::find($id);
        $criterios = $proyect->criterios;
        $objectives = $proyect->objectives;
        return view('proyect_show')->with('proyect', $proyect)->with('criterios', $criterios)->with('objectives', $objectives);
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
        //
    }
    public function proyectfinal()
    {
        $proyects = \App\Proyect::get();
        foreach ($proyects as $p) {
            $crit_proy = $p->criterios;
            $p->value = 0;
            foreach ($crit_proy as $cp) {
                //dd($cp->criteria);
                $p->value += $cp->valueC * $cp->criteria->peso;    
            }
        }
        return view('proyects_value')->with('proyects', $proyects);
    }
}
