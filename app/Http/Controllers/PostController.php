<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts=[

        ["id"=>1,"title"=>"Learn php" , "name"=>"Ahmed","date"=>'2014-04-10'],
        ["id"=>2,"title"=>"Learn laravel" , "name"=>"mohamed","date"=>'2014-04-12'],
        ["id"=>3,"title"=>"solid principles" , "name"=>"ali","date"=>'2014-04-14'],
        ["id"=>4,"title"=>"design patterns" , "name"=>"adel","date"=>'2014-04-15']
        ];

        return view('posts.index',['posts'=>$posts]);
    }


    public function create(){
        return view('posts.create');
    }


    public function edit(){
        return view('posts.edit');
    }
    public function show($postId){
        return $postId;
    }
}
