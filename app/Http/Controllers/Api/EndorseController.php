<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EndorseResource;
use App\Http\Resources\InfluencerResource;
use App\Models\Endorse;
use App\Models\Platform;
use App\Models\User;
use Illuminate\Http\Request;

class EndorseController extends Controller
{
    public function storeEndorse(Request $request)
    {
        // cust_id, inf_id, plat_id, begin, end
        $endorse = Endorse::create($request->all());

        return response($endorse);
    }

    public function getEndorseByInfId(Request $request)
    {
        $endorseId = Endorse::where('inf_id', $request->inf_id)->get();

        $endorse = EndorseResource::collection($endorseId);

        return response($endorse);
    }
}
