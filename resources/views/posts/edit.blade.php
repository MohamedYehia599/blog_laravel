@section('title')
edit
@endsection



@extends('layouts.app')
@section('content')
<form enctype="multipart/form-data" action="{{route('posts.update',['post'=>$post])}}" method="post">
@method('PUT')
    @csrf

<div class="mb-3 mt-5">
  <label for="exampleFormControlInput1" class="form-label">Title</label>
  <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$post->title}}">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
  <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" value="">{{$post->description}}</textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Image</label>
  <input type="file" name="image" class="form-control" id="exampleFormControlTextarea1" rows="3"></input>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Post Creator</label>
  <select  name="user_id" class="form-select" aria-label="Default select example">
    <option value="{{$post->user_id}}" name="user_id">{{$post->user->name}}</option>
   
  @foreach ($users as $user)
  
  <option value ="{{$user->id}}" name="user_id">{{$user->name}}</option> 
  @endforeach
  
</select>
</div>
<button type="submit" class="btn btn-primary">update</button>
</form>
@endsection