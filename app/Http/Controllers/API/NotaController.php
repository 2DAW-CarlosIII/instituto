<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Nota;
use Illuminate\Http\Request;
use App\Http\Resources\NotaResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $notasDelUsuarioAutenticado = Auth::user()->notas;
        return NotaResource::collection($notasDelUsuarioAutenticado);*/

        $gruposDelUsuarioAutenticado = Auth::user()->grupos;
        return NotaResource::collection($gruposDelUsuarioAutenticado);

        //return NotaResource::collection(Nota::paginate(20));
    }

    public function sacarMedia($materia_id) {

        $media = DB::table('notas')
                        ->where('user_id', Auth::user()->id)
                        ->where('materia_id', $materia_id)
                        ->avg('nota');

        $materia = DB::table('materias')
                        ->where('id', $materia_id)
                        ->value('nombre');

        return response()->json("Media de la materia ". $materia. ": ". $media);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Nota::class);
        $nota = json_decode($request->getContent(), true);

        $nota = Nota::create($nota);

        return new NotaResource($nota);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        return new NotaResource($nota);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        $this->authorize('update', $nota);
        $notaData = json_decode($request->getContent(), true);
        $nota->update($notaData);

        return new NotaResource($nota);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        $this->authorize('delete', $nota);
        $nota->delete();
    }
}
