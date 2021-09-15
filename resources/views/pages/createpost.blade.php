@extends('layouts.app')
@section('content')
    <h1>Create Post</h1>
    <form action="{{route('post.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Tile</label>
            <input type="text" name="title" placeholder=" enter post" class="form-control">
        </div>
        <div class="form-group">
            <label>Body</label>
            <input type="text" name="body" placeholder=" enter post body" class="form-control">
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