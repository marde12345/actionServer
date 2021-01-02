<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function store(Request $request)
    {
        $platform = Platform::create($request->all());

        return response($platform);
    }
}
