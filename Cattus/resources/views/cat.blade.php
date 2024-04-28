@extends('layout')
@section('title', 'Cattus')
@section('content')
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
        <div style="text-align: center">
            <h1>Upload your cat to our database: </h1>
        </div>
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
@endsection