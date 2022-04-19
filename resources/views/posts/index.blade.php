@extends('layouts.main')

@section('title')
index
@endsection


 @section('content')   

<div class="d-flex justify-content-center my-5">
    <a class="btn btn-success" href="{{route('posts.create')}}">Create post</a>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Title</th>
      <th scope="col">Posted by</th>
      <th scope="col">Created at</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    
    @foreach ($posts as $post)
    <tr>
      
      <td>{{$post['id']}}</td>
      <td>{{$post['title']}}</td>
      <td>{{$post['name']}}</td>
      <td>{{$post['date']}}</td>
      <td><div class="d-flex justify-content-start">
    <a class="btn btn-info mx-1" href="{{route('posts.show',['post'=>$post['id']])}}">View</a>
    <a class="btn btn-primary mx-1" href="{{route('posts.edit',['post'=>$post['id']])}}">Edit</a>
    <a class="btn btn-danger mx-1" href="">Delete</a>


</div></td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection


