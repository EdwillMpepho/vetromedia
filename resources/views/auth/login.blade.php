@extends('layouts.app')
@section('content')
    <h1>Login</h1>
    <hr/>
    <form action="{{route('user.login')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>email</label>
            <input type="email" name="email" placeholder="enter your email" class="form-control">
        </div>
        <div class="form-group">
            <label>password</label>
            <input type="password" name="password" placeholder="enter your password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary btn-block">login</button>
    </form>
@endsection