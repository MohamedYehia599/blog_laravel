<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Arr;
use League\CommonMark\Extension\Attributes\Node\Attributes;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Comment;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use  Illuminate\Support\Facades\Validator;
use  Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    public function index(){
        $posts=Post::with('user')->paginate(5);
        
        return view('posts.index',['posts'=>$posts]);
    }


    public function create(){
        $users=User::all();
        
        return view('posts.create',['users'=>$users]);
    }


    public function store(StorePostRequest $request){
       
          
        $input = $request->all();
        
       
            
            $user = User::find($input['user_id']);
            $path=$request->file('image')->store('public');
            if ($user) {
                $post=Post::create([
            'title'=>$input['title'],
            'description'=>$input['description'],
            'user_id'=>$input['user_id'],
            'image'=>$path,
        ]);
            }
        return to_route('posts.index');
    
    }   
   
    
    
    


    public function edit($postId){
        $post=Post::find($postId);
        $users=User::all();
        return view('posts.edit',['users'=>$users,'post'=>$post]);
    }
    public function show($postId){
        $post=Post::find($postId);
        
        $comments=$post->comments;
        return view('posts.show',['post'=>$post,'comments'=>$comments]);
    }

public function destroy($postId){
    $post=Post::find($postId);
    if($post->image){Storage::delete($post->image);}
    
    Post::where('id', $postId)->delete();
    return to_route('posts.index');
}

public function update( UpdatePostRequest $request ,$postId ){
    $post=Post::find($postId);
    Storage::delete($post->image);
    $path=$request->file('image')->store('public');
    $input = $request->all();
    
       $user = User::find($input['user_id']);
       if($user){
        Post::where('id', $postId)->update([
            'title'=>$input['title'],
            'description'=>$input['description'],
            'user_id'=>$input['user_id'] ,
            'image'=>$path
            ]);
            
            return to_route('posts.index');
       }   
    


}




}
