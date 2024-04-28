@extends('layout')
@section('title', 'My profile')
@section('content')

@php
    use App\Models\Cat;
    $user = Auth::user();
    $user_cats = Cat::where('user_id', $user->id)->get();
@endphp
<div style="text-align: center">
    <h1>My profile: </h1>
</div>
<form action="{{route('myprofile.post')}}" method="POST" class="ms-auto me-auto mt-3" style="width: 500px">
    @csrf

    <div class="mb-3">
        <label class="form-label">Username</label>
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