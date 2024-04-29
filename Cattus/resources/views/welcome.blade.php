@extends('layout')
@section('title', 'Cattus')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cattus</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}"> <!-- Custom styles -->
</head>
<body>
<header class="header">
    <div class="container">
        <div class="logo">
            <a href="#"><img src="{{ asset('img/logo.png') }}" alt="Cattus Logo"></a>
        </div>
    </div>
</header>

<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h2>Welcome to Cattus</h2>
            <p>Paws up and😚 welcome to 💩Cattus, where🤯 every feline🙀 friend finds 🫡a place to shine! 🐾 Whether your 😺whiskered companion😺 is a playful🙈 purr-machine (😻😻😻) or a regal 😤observer of the world🌍, Cattus is here to 🥂celebrate all things cat🥂.</p>
            <p>Join our👨‍👨‍👦community👨‍👨‍👦of devoted cat💦 enthusiasts 🌭and register your🤢 furry companions👾 to embark on a😙 journey of fun and rewards! 💨💨💨</p>
            <a href="{{route('registration')}}" class="btn">Join Now</a>
        </div>
    </div>
</section>


<script src="js/script.js"></script>
</body>
</html>
@endsection
