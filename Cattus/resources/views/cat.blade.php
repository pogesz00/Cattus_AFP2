@extends('layout')
@section('title', 'Cattus')
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
<div class="container">
        <div class="mt-5 ">
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
        <div style="text-align: center">
            <h1>Upload your cat to our database: </h1>
        </div>
        <div class="rainbow-row rainbow-box">
            <div class="rainbow-column ">
            <iframe src="https://giphy.com/embed/aMJ0pH0asL7OPtyHol" width="480" height="480" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
            </div>
            <div class="rainbow-column">
            <form action="{{route('cat.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Cat name</label>
                <input type="text" class="form-control" name="name" maxlength="255">
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <button type="submit" class="btn btn-success" style="margin-bottom: 50px;">Register cat</button>
        </form>
            </div>
            <div class="rainbow-column ">
            
        </div>
        
        
</div>
@endsection