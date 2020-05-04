@extends('welcome')
@section('content')

<div class="jumbotron">
    <div class="container">
        <p>
            <a href="{{route('addcategory')}}" class="btn btn-primary">Add category</a>
            <a href="{{route('categorylist')}}" class="btn btn-success">All category</a>
            <a href="{{route('allpost')}}" class="btn btn-success">All Post</a>
        </p>
        <hr>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="{{route('store.post')}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="titie">Post Title</label>
                <input type="text" name='title' class="form-control" placeholder="Post Title will go here">
            </div>
            <div class="form-group">
                <label for="category">Select category</label>
                <select class="form-control" name="category_id" id="category">
                    @foreach($category as $data)
                    <option value="{{$data->name}}">{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Post Image</label>
                <input type="file" name='image' class="form-control">
            </div>

            <div class="form-group">
                <label for="details">Post Details</label>
                <textarea class="form-control" name='details' rows="5"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </div>
</div>
@endsection('content')