@extends('layout')
@section('title', 'My profile')
@section('content')

@php
    use App\Models\Cat;
    $user = Auth::user();
    $user_cats = Cat::where('user_id', $user->id)->get();
@endphp
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
    <h1 class="rainbow-text">My profile: </h1>
</div>
<div class="flex-row">
    <div class="flex-column">
    <div  class="tenor-gif-embed" data-postid="4153958422723068991" data-share-method="host" data-aspect-ratio="1" data-width="40%"><a  href="https://tenor.com/view/mcisti-gif-4153958422723068991">Mcisti GIF</a>from <a href="https://tenor.com/search/mcisti-gifs">Mcisti GIFs</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
    </div>
    <div class="flexbox-column">
    <form action="{{route('myprofile.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px">
    @csrf

    <div class="mb-3">
        <label class="form-label rainbow-text">Username</label>
        <input type="text" class="form-control" name="username" value="{{ $user->username }}"></input>
    </div>
    <button type="submit" class="btn btn-success">Update profile</button>
</form>


<form action="{{ route('myprofile.delete') }}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirmDelete()">Delete Account</button>
</form>
<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete your account?');
    }
</script>
    </div>
</div>

</div>


<div class="container" style="margin-left: 10%; margin-right: 10%;">
    <h2>My cats: </h2>
    @foreach($user_cats as $cat)
        <div class="col-12 shadow-sm bg-white p-2 d-flex mb-2 br5">
            <div class="image bg-info">
                <img class="br5" src="{{ asset('storage/'.$cat->image) }}" width="150px" height="150px" style="object-fit: cover">
            </div>
            <div class="px-2 content">
                <p class="mb-1 text-cl fw400">{{ $cat->name }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection