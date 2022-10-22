<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FolloweResource;
use App\Models\Followr;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;

class FollowController extends BaseController
{
    public function index(){
        $follower = Followr::where('user_id',auth('api')->id())->get();
        $res = FolloweResource::collection($follower);
        return $this->sendResponse($res,'all followes');
    }
}
