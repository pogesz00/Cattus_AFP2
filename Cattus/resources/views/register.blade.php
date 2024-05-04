@extends('layout')
@section('title', 'Registration')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cattus</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> <!-- Custom styles -->
</head>
<div style="text-align: center">
    <h1 class="rainbow-text">Registration</h1>
</div>
    <div class="container">
        <div class="mt-5">
            @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif

            @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
        </div>
        <div class="flexbox-row">

            <div class="flexbox-column">
        <iframe src="https://giphy.com/embed/ArAgo5dU2z2xO" width="416" height="480" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>

            </div>
            <div class="flexbox-column">
            <form action="{{route('registration.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px">
            @csrf
            <div class="mb-3">
                <label class="form-label rainbow-text">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label class="form-label rainbow-text">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label rainbow-text">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label class="form-label rainbow-text">Permission (user/admin)</label>
                <input type="text" class="form-control" name="permission">
            </div>
            <button type="submit" class="btn btn-success">Register</button>
        </form>
        <div class="flexbox-column">
        <iframe src="https://giphy.com/embed/UmO1IuCwW14k" width="480" height="332" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>

            </div>
            <div class="flexbox-column">
            <iframe src="https://giphy.com/embed/sQC0wOu7b2Lrtu0lEz" width="480" height="480" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>

            </div>

        </div>
        
    </div>
@endsection