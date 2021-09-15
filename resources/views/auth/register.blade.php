@extends('layouts.app')
@section('content')
    <h1>Register</h1>
    <hr/>
    <form action="{{route('user.register')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>name</label>
            <input type="text" name="name" placeholder="enter your name" class="form-control">
        </div>
        <div class="form-group">
            <label>email</label>
            <input type="email" name="email" placeholder="enter your email" class="form-control">
        </div>
        <div class="form-group">
            <label>password</label>
            <input type="password" name="password" placeholder="enter your password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary btn-block">register</button>
    </form>
@endsection