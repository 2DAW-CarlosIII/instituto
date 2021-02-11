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
            'user_id' => $this->user, // Esto llama al modelo nota funcion user
            'materia_id' => $this->materia, // Esto llama al modelo nota funcion materia
            'evaluacion' => $this->evaluacion,
            'nota' => $this->nota
        ];
    }
}
