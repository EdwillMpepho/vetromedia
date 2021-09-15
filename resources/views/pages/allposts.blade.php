@extends('layouts.app')
@section('content')
   <h1>All Posts</h1>
   <hr/>
   @if (count($posts) > 0)
     <!-- check if authorized in order to create post -->
      @if (Auth::check())
          <a class="btn btn-warning" href="{{ route('post.create')}}">create post</a>
      @else
          <h5>Please login in order to create posts or edit post</h5> 
      @endif
      <!-- this will display all posts in a flex style  -->
      <div class="all-posts">
          @foreach ($posts as $post)
            <div class="box">
                <h5>{{ $post->title }}</h5>
                 <p>{{ $post->body }}</p>
                 @for ($i = 0; $i <  $post->rate ; $i++)
                    <i class="fas fa-star"></i> 
                 @endfor
                 <!-- check if user is authorized  to peform operation -->
                   @if(Auth::check())
                   <p>
                     <a class="btn btn-warning" href="/post/{{$post->id}}">
                     <i class="fas fa-pen"></i>edit post
                    </a>
                     <form action="/post/{{ $post->id }}" method="POST">
                        @csrf
                         <input type="hidden" name="_method" value="delete">
                         <button  type="submit" class="btn btn-danger"><i class="fas fa-trash"></i>delete</button>
                    </form>
                    </p>
                   @endif
            </div>
          @endforeach
      </div>
   @else
       <h4>No posts Found</h4>
   @endif 
@endsection