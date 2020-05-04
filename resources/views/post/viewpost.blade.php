@extends('welcome')
@section('content')

<div class="jumbotron">
    <div class="container">
        <h2 class="display-4"> Post View</h2>

        <hr>
        <p>
            <a href="{{route('write.post')}}" class="btn btn-success">Write Post</a>

            <a href="{{route('allpost')}}" class="btn btn-success">All Post</a>

        </p>
        <hr>
        <div>
            <ol>
                <p>Category Name: {{$post->name}}</p>
                <h3 class="display-4">{{$post->title}}</h3>
                <p>Created at {{$post->created_at}}</p>
                <img src="{{URL::to($post->image)}}" alt="" height="200px" width="300px">
                <p>{{$post->details}}</p>
            </ol>
        </div>

    </div>
</div>
@endsection('content')