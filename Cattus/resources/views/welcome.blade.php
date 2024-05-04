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

<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h2>Welcome to Cattus</h2>
            <p>Paws up and😚 welcome to 💩Cattus, where🤯 every feline🙀 friend finds 🫡a place to shine! 🐾 Whether your 😺whiskered companion😺 is a playful🙈 purr-machine (😻😻😻) or a regal 😤observer of the world🌍, Cattus is here to 🥂celebrate all things cat🥂.</p>
            @auth
            @else
            <p>Join our👨‍👨‍👦community👨‍👨‍👦of devoted cat💦 enthusiasts 🌭and register your🤢 furry companions👾 to embark on a😙 journey of fun and rewards! 💨💨💨</p>
            <a href="{{route('registration')}}" class="btn">Join Now</a>
            @endauth
        </div>
    </div>
</section>

<form action="{{route('position.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px" enctype="multipart/form-data">
    @csrf
    <div style="text-align: center; margin-top: 20px; margin-bottom: 20px;">
        <button type="submit" class="btn btn-light">Simulate time</button>
    </div>
</form>
@php
foreach ($cats as $cat) {
    $sum = 0;
    foreach ($cat->position as $position) {
        $sum += $position->x;
        $sum += $position->y;
    }
    $cat->distance_traveled = $sum;
}

$cats = $cats->sortByDesc('distance_traveled');
@endphp
<table style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th style="border: 1px solid #000; padding: 8px;">Owner</th>
            <th style="border: 1px solid #000; padding: 8px;">Name</th>
            <th style="border: 1px solid #000; padding: 8px;">Distance traveled</th>
            <th style="border: 1px solid #000; padding: 8px;">Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cats as $cat)
            <tr>
                <td style="border: 1px solid #000; padding: 8px;">{{ $cat->user->username }}</td>
                <td style="border: 1px solid #000; padding: 8px;"><a  href="{{route('viewcat',['id' => $cat->id])}}">{{ $cat->name }}</a></td>
                <td style="border: 1px solid #000; padding: 8px;">{{ $cat->distance_traveled }} meters</td>
                <td style="border: 1px solid #000; padding: 8px;"><img class="br5" src="{{ asset('storage/'.$cat->image) }}" width="150px" height="150px" style="object-fit: cover"></td>
            </tr>
        @endforeach
    </tbody>
</table>


</body>
</html>
@endsection
