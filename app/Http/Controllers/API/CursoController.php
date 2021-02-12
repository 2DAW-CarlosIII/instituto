<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CursoResource;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CursoResource|\Illuminate\Http\Response
     */
    public function index()
    {
        return CursoResource::collection(Curso::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CursoResource|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = json_decode($request->getContent(), true);

        $curso = Curso::create($curso);

        return new CursoResource($curso);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return CursoResource|\Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        $this->authorize('view', $curso);
        return new CursoResource($curso);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return CursoResource|\Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $cursoData = json_decode($request->getContent(), true);

        $curso->update($cursoData);

        return new CursoResource($curso);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
    }

    public function aulavirtual(){
        $response = Http::get('https://aulavirtual.murciaeduca.es/website/rest/server.php',[
            'wstoken' => '',
            'wsfinction' => 'core_enrol_get_users_courses',
            'moodlewrestformat' =>'json',
            'userid' => '85135']);

        return response()->json(json_decode($response));
    }
}
