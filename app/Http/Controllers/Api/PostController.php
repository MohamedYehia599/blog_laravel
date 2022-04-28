<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index(){
   $posts=Post::with('user')->get();
   return  PostResource::collection($posts) ;
    }

  public function show($postId){
   $post= Post::find($postId);
   return new PostResource($post);
  }

  public function store(StorePostRequest $request){
    $input = $request->all();
    $post=Post::create([
        'title'=>$input['title'],
        'description'=>$input['description'],
        'user_id'=>$input['user_id'],
    ]);

    return new PostResource($post);
  }


}
