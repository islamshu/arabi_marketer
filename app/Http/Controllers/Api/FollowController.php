<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FolloweResource;
use App\Models\Followr;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Models\User;

class FollowController extends BaseController
{
    public function index()
    {
        $follower = Followr::where('user_id', auth('api')->id())->get();
        $res = FolloweResource::collection($follower);
        return $this->sendResponse($res, 'all followes');
    }
    public function store($id)
    {
        $user = User::find($id);
        if ($user->type != 'marketer') {
            return  $this->sendError('هذا المستخدم غير صانع محتوى !');
        }
        $fo = Followr::where('user_id', auth('api')->id())->where('marketer_id', $id)->first();
        if ($fo) {
            return   $this->sendError('انت بالفعل متابع هذا صناع المحتوى !');
        }
        $follower = new Followr();
        $follower->marketer_id = $id;
        $follower->user_id = auth('api')->id();
        $follower->save();
        $res = new FolloweResource($follower);
        return $this->sendResponse($res, 'add followe');
    }
    public function delete($id)
    {
        $followr = Followr::where('user_id',auth('api')->id())->where('marketer_id',$id)->first();
        if (!$followr) {
            $this->sendError('هناك خطأ ما !');
        }
        $followr->delete();
        return $this->sendResponse('delete', 'delete followr');
    }
}
