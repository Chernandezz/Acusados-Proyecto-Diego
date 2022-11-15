<?php

namespace App\Http\Controllers;

use App\Models\Acusado;
use Illuminate\Http\Request;

class AcusadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['acusados'] = Acusado::paginate(10);
        return view('acusados.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('acusados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {dd("juancho");
        $campos = [
            'cedula'=>'required|numeric',
            'nombre'=>'required|string|max:40',
            'telefono'=>'required|string|max:14'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'cedula.required'=>'La cedula es requerida',
            'numeric'=>'El :attribute debe ser un numero',
            'cedula.numeric'=>'La :attribute debe ser un numero'
        ];
        $this->validate($request,$campos,$mensaje);
        $datosAcusado = request()->except('_token');
        Acusado::insert($datosAcusado);
        return redirect('acusados')->with('mensaje', 'Acusado agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Acusado  $acusado
     * @return \Illuminate\Http\Response
     */
    public function show(Acusado $acusado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Acusado  $acusado
     * @return \Illuminate\Http\Response
     */
    public function edit($cedula)
    {
        $data['isEdit'] = True;
        $data['acusado'] = Acusado::findOrFail($cedula);
        return view('acusados.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Acusado  $acusado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cedula)
    {

         $campos = [
            'nombre'=>'required|string|max:40',
            'telefono'=>'required|string|max:14'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'numeric'=>'El :attribute debe ser un numero'
        ];
        $this->validate($request,$campos,$mensaje);
        $datosAcusado = request()->except('_token','_method');
        Acusado::where('cedula','=',$cedula)->update($datosAcusado);

        $data['isEdit'] = True;
        $data['acusado'] = Acusado::findOrFail($cedula);
        return redirect('acusados')->with('mensaje', 'Acusado editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Acusado  $acusado
     * @return \Illuminate\Http\Response
     */
    public function destroy($cedula)
    {
        //
        Acusado::destroy($cedula);
        return redirect('acusados')->with('mensaje', 'Acusado eliminado exitosamente');
    }
}
