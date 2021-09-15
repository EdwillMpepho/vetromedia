@if(count($errors) > 0)
   <ul>
     @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
          <li>{{ $error }}</li>
        </div>
     @endforeach
  </ul>
@endif

<!-- successfull messages -->
@if (session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message')}}
    </div>
@endif

<!-- error messages -->
@if (session()->has('error_message'))
    <div class="alert alert-danger">
        {{ session()->get('error_message')}}
    </div>
@endif