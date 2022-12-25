<?php

namespace App\Http\Resources;

use App\Models\Vrsta;
use App\Models\Vinarija;
use Illuminate\Http\Resources\Json\JsonResource;

class VinoResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $vrsta = Vrsta::find($this->vrstaId);
        $vinarija = Vinarija::find($this->vinarijaId);

        return [
            'id' => $this->id,
            'naziv' => $this->naziv,
            'ambalaza' => $this->ambalaza,
            'vrsta' => $vrsta->vrsta,
            'vinarija' => $vinarija->vinarija
        ];
    }
}
