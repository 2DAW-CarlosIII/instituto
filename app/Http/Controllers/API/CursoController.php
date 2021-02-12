<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CursoResource;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CursoResource::collection(Curso::paginate());
    }

    public function aulavirtual(){
        /*url: https://aulavirtual.murciaeduca.es/webservice/rest/server.php

        'wstoken' => token almacenado en variables de entorno,

        'wsfunction' => 'core_enrol_get_users_courses',

        'moodlewsrestformat' => 'json',

        'userid' => el valor del atributo usuarioAV del usuario autenticado*/

        $response = Http::get('https://aulavirtual.murciaeduca.es/webservice/rest/server.php', [

            'wstoken' => 'https://aulavirtual.murciaeduca.es/login/token.php?username=1793960&password=647639515pa&service=moodle_mobile_app',

            'wsfunction' => 'core_enrol_get_users_courses',

            'moodlewsrestformat' => 'json',

            'userid' => Auth::user()->usuario_av,
        ]);

        return response()->json(json_decode($response));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        $this->authorize('show', $curso);

        return new CursoResource($curso);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
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
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
    }
}
