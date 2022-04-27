@extends('layouts.app')

@section('title')
show
@endsection



@section('content')
<div class="card my-5">
  <div class="card-header">
    Post info
  </div>
  <div class="card-body">
    <h5 class="card-title">Title :-</h5>
    <p class="card-text">{{$post->title}}</p>
    <h5 class="card-title">Description :-</h5>
    <p class="card-text">{{$post->description}}</p>
    <h5>Image : </h5>
    <div style="width:100px;height:100px;">
    <img style="width:100%;" src="{{Storage::url($post->image)}}" alt="">
    </div>
  </div>
</div>



<div class="card my-5">
  <div class="card-header">
    Post Creator info
  </div>
  <div class="card-body">
    <h5 class="card-title">Name :-</h5>
    @if($post->user_id)
    <p class="card-text">{{$post->user->name}}</p>
    <h5 class="card-title">Email :-</h5>
    <p class="card-text">{{$post->user->email}}</p>
    @else
    <p class="card-text">Anonymous</p>
    <h5 class="card-title">Email :-</h5>
    <p class="card-text">Anonymous</p>
    @endif
    <h5 class="card-title">Created at :-</h5>
    <p class="card-text"> {{$post->created_at->format('l jS \\of F Y h:i:s A')}}</p>
  </div>
</div>





<a class="btn btn-success" href="{{route('comments.create',['post'=>$post['id']])}}">Create a Comment</a>




@if($comments)
@foreach($comments as $comment)
<div class="comment col-6 my-3 bg-light">
<div class="row mb-2 ms-3 ">
<div class="d-flex justify-content-between ">
<p class="mt-3">{{$comment->body}}</p>







</div>

</div>

<div class="row">
<div class="d-flex justify-content-evenly fw-lighter">
  
@if($comment->user_id)
      <p> Written by :  {{$comment->user->name}}</p>
      @else 
      <p>Written by :Anonymous</p>
      @endif
      <p> Created at :  {{date('Y-m-d',strtotime($comment->created_at))}}</p>

      <div class="d-flex justify-content-start">
      <a class="btn btn-primary mx-1" href="{{route('comments.edit',['comment'=>$comment['id']])}}">Edit</a>
      <button data-id="{{$comment['id']}}" class="btn btn-danger mx-1 " type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>

     
        
</div>
      </div>
</div>

</div>
@endforeach
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete ?!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you really  want to delete this post ?!
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</a>
        
         <form id="deleteForm" action="{{route('comments.destroy', ['comment' => 1])}}" method="POST">
        @method('DELETE')
    @csrf 
        <button type="submit" class="btn btn-danger">Delete</button>
        
        </form>
       
       </div>
    </div>
  </div>
</div> 



@endsection