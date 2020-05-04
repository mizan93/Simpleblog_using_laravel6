@extends('welcome')
@section('content')

<div class="jumbotron">
    <div class="container">
        <h3 class="display-4">Edit Post</h3>
        <p>
            <a href="{{route('write.post')}}" class="btn btn-success">Write Post</a>

            <a href="{{route('allpost')}}" class="btn btn-success">all Post</a>
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
        <form method="post" action="{{url('update/post'.$post->id)}}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="titie">Post Title</label>
                <input type="text" name='title' class="form-control" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="category">Select category</label>
                <select class="form-control" name="category_id" id="category">
                    @foreach($category as $data)
                    <option value="{{$data->id}}" <?php if ($data->id == $post->category_id) echo 'selected'; ?>>{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Post Image</label>
                <input type="file" name="image" class="form-control">
                <br>
                Old photo: 
                <img src="{{URL::to($post->image)}}" alt="Old image" width="300px" height="200px">
                <input type="hidden" name="oldphoto" value="{{$post->image}}">
            </div>

            <div class=" form-group">
                <label for="details">Post Details</label>
                <textarea class="form-control" name='details' rows="5">
                {{$post->details}}
                </textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
    </div>
</div>
@endsection('content')