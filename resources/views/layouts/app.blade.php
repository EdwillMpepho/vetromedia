<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Post Example</title>
        <!-- bootstrap css -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- custom css -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <!-- font-awesome style -->
        <link href="{{asset('css/all.min.css')}}" rel="stylesheet">
        <style>
            body {
                font-family:Roboto, sans-serif;
                font-weight: 700;
            }
        </style>
    </head>
    <body>
        @include('nav.navbar')
         <div class="container">
             @include('message.messages')
             @yield('content')
         </div>
        <!-- jquery js -->
        <script src="{{asset('js/jquery-3.6.0.js')}}"></script>
         <!-- bootstrap js -->
         <script src="{{asset('js/bootstrap.min.js')}}"></script>
          <!-- font awesome js -->
        <script src="{{asset('js/all.min.js')}}"></script>
   </body>
</html>
                    