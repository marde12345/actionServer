<?php

namespace App\Http\Resources;

use App\Models\Influencer;
use App\Models\Platform;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class InfluencerResource extends JsonResource
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
            'user' => User::find($this->id),
            'platforms' => Platform::where('user_id', $this->id)->get()
        ];
    }
}
