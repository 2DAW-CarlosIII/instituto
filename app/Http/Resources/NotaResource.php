<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

      

        return [
           'user_id' => $this->user,
           'materia_id' => $this->materia,
           'evaluacion' => $this->evaluacion,
           'nota' => $this->nota,
        ];

/*
        return [
           'user_id' => $this->user_id,
           'materia_id' => $this->materia_id,
           'evaluacion' => $this->evaluacion,
           'nota' => $this->nota,
        ];
*/
    }
}
