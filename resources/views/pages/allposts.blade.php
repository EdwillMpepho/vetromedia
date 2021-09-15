@extends('layouts.app')
@section('content')
   <h1>All Posts</h1>
   <hr/>
   @if (count($posts) > 0)
      <!-- this will display all posts in a flex style  -->
      <div class="all-posts">
          <div class="box">
          </div>
      </div>
   @else
       <h4>No posts Found</h4>
   @endif 
@endsection