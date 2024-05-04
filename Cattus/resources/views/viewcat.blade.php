@extends('layout')
@section('title', $cat->name)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $cat->name }}</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('storage/'.$cat->image) }}" class="img-fluid" alt="{{ $cat->name }}">
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Cat registered at:</strong> {{ $cat->created_at }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mt-3">
            <div class="col-md-12">
                <h4>Positions:</h4>
                @foreach($cat->position as $position)
                <p>{{ $position->x }} {{ $position->y }} at {{ $position->created_at }}</p>
                @endforeach
            </div>   
        </div>
                </div>
                @if(auth()->check() && auth()->user()->id === $cat->user_id)
                <div class="card" style="text-align: center; margin-top: 10px;">
                    <form method="POST" action="{{ route('cat.delete', $cat->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="margin-bottom: 20px;">Delete Cat</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection