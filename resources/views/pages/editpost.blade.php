@extends('layouts.app')
@section('content')
    <h1>Edit Post</h1>
    <form action="/post/{{ $post->id }}" method="POST">
        @csrf
        <!-- spoofing -->
           <input type="hidden" name="_method" value="PUT">
           <input type="hidden" name="id" value="{{$post->id}}">
         <div class="form-group">
            <label>Tile</label>
           <input type="text" name="title" value="{{ $post->title }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Body</label>
            <input type="text" name="body" value="{{ $post->body }}" class="form-control">
        </div>
        <!-- I just added a variable for rating post under post table-->
        <div class="form-group">
            <label>Rate post</label>
            <select name="rate" class="form-control">
                @for ($i = 1; $i < 6; $i++)
                   <option value="{{ $i }}">{{ $i }}</option> 
                @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">save</button>
    </form>
@endsection