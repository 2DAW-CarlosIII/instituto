<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Materiamatriculada;
use Illuminate\Http\Request;
use App\Http\Resources\MateriamatriculadaResource;


class MateriamatriculadaController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Materiamatriculada::class, 'materiamatriculada');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MateriamatriculadaResource::collection(Materiamatriculada::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materiamatriculada = json_decode($request->getContent(), true);

        $materiamatriculada = Materiamatriculada::create($materiamatriculada);

        return new MateriamatriculadaResource($materiamatriculada);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materiamatriculada  $materiamatriculada
     * @return \Illuminate\Http\Response
     */
    public function show(Materiamatriculada $materiamatriculada)
    {
        return new MateriamatriculadaResource($materiamatriculada);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materiamatriculada  $materiamatriculada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materiamatriculada $materiamatriculada)
    {
        $materiamatriculadaData = json_decode($request->getContent(), true);
        $materiamatriculada->update($materiamatriculadaData);

        return new MateriamatriculadaResource($materiamatriculada);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materiamatriculada  $materiamatriculada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materiamatriculada $materiamatriculada)
    {
        $materiamatriculada->delete();
    }
}
