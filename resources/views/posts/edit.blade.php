@section('title')
create
@endsection



@extends('layouts.main')

@section('content')
<form action="post">
<div class="mb-3 mt-5">
  <label for="exampleFormControlInput1" class="form-label">Title</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Description</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Post Creator</label>
  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
</div>
<button class="btn btn-primary">update</button>
</form>
@endsection