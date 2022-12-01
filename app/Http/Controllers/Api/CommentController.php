<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\CommentResourse;
use App\Models\Comment;
use Validator;

class CommentController extends BaseController
{
    public function get_comment($blog_id){
        $blog  = Blog::find($blog_id);
        $res =  CommentResourse::collection($blog->comments);
        return $this->sendResponse($res,'جميع التعتليقات');
    }
    public function store(Request $request){
        $validation = Validator::make($request->all(), [
            'blog_id'=>'required',
            'body' => 'required',
        ]);
        if ($validation->fails()) {
            return $this->sendError($validation->messages()->all());
        }
        $comment  = new Comment();
        $comment->blog_id = $request->blog_id;
        $comment->body = $request->body;
        $comment->user_id = auth('api')->id();
        $comment->save();
        $res = new CommentResourse($comment);
        return $this->sendResponse($res,'تم اضافة التعليق بنجاح');

        

    }
}
