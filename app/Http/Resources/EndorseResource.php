<?php

namespace App\Http\Resources;

use App\Models\Platform;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class EndorseResource extends JsonResource
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
            'cust' => User::find($this->cust_id),
            // 'inf' => new InfluencerResource(User::find($this->inf_id)),
            'plat' => Platform::find($this->plat_id),
            'begin' => $this->begin,
            'end' => $this->end
        ];
    }
}
