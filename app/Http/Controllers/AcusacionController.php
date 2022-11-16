<?php

namespace App\Http\Controllers;

use App\Models\Acusacion;
use App\Models\Acusado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcusacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cedulaAcusado)
    {
        $datos['acusaciones'] = Acusacion::where('cedulaAcusado', '=', $cedulaAcusado)->paginate(5);
        $datos['acusado'] = $cedulaAcusado;
        return view('acusaciones.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cedulaAcusado)
    {
        
        $data['acusado'] = Acusado::findOrFail($cedulaAcusado);
        return view('acusaciones.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $campos = [
        //     'cedulaAcusado'=>'required|String',
        //     'descripcion'=>'required|string|max:40',
        //     'culpable'=>'required|string|max:14'
        // ];
        // $mensaje=[
        //     'required'=>'El :attribute es requerido',
        // ];
        // $this->validate($request,$campos,$mensaje);
        $datosAcusacion = request()->except('_token');
        Acusacion::insert($datosAcusacion);
        return redirect('acusados')->with('mensaje', 'Acusacion agregada exitosamente');
    }

    
    public function juzgar($cedulaAcusado){
        $resultados = DB::table('acusaciones')
                ->select('*')
                ->where('cedulaAcusado', '=', $cedulaAcusado)
                ->get()
                ->toArray();
        $acusado = DB::table('acusados')
                ->select('*')
                ->where('cedula', '=', $cedulaAcusado)
                ->get()
                ->toArray();
        $data["acusado"] = $acusado[0];
        $data["totalAcusaciones"] = count($resultados);
        $data["acusacionesCulpable"] = 0;
        $data["acusacionesInocente"] = 0;
        foreach($resultados  as $acusacion){
            if($acusacion->Culpable == 1){
                $data["acusacionesCulpable"]++;
            }else{
                $data["acusacionesInocente"]++;
            }
        }
        if($data["acusacionesCulpable"]/$data["totalAcusaciones"] >= 0.75){
            $data["esCulpable"] = true;
        }else{
            $data["esCulpable"] = false;
        }
        
        return view('acusaciones.juzgar', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acusacion  $acusacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Acusacion $acusacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Acusacion  $acusacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acusacion $acusacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acusacion  $acusacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acusacion $acusacion)
    {
        //
    }
}
