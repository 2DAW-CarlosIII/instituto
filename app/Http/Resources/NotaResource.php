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
        
        // return parent::toArray($request);

        return [
            'id' => $this->id,
            'user_id' => $this->user, // user
            'materia_id' => $this->materia, // materia
            'evaluacion' => $this->evaluacion,
            'nota' => $this->nota,
        ];

    }
}
