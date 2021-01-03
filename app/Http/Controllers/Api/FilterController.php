<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InfluencerResource;
use App\Models\Platform;
use App\Models\User;
use Illuminate\Http\Request;
use stdClass;

class FilterController extends Controller
{
    public function filterPopuler()
    {
        $user_platforms = [];
        $users = Platform::all()->groupBy("user_id", true);

        $average = [];
        foreach ($users as $user) {
            $temp = [];
            foreach ($user as $platform) {
                $user_id = $platform->user_id;
                array_push($temp, $platform->follower);
            }
            $average = array_sum($temp) / count($temp);
            $data = [];
            $data['user_id'] = $user_id;
            $data['avg'] = $average;
            array_push($user_platforms, $data);
        }

        // function cmp($a, $b)
        // {
        //     return $b['avg'] - $a['avg'];
        // }

        // usort($user_platforms, "cmp");
        usort($user_platforms, function ($a, $b) {
            return $b['avg'] - $a['avg'];
        });

        $ids = [];
        foreach ($user_platforms as $user) {
            array_push($ids, $user['user_id']);
        }

        $jadi = [];
        foreach ($ids as $id) {
            $temp = new InfluencerResource(User::find($id));
            array_push($jadi, $temp);
        }

        $res = new stdClass();
        $res->data = $jadi;
        return json_encode($res);
        // return new InfluencerResource(User::find($ids[0]));

        // return InfluencerResource::collection(User::find($ids));
    }
}
