@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($post as $data)
            <div class="post-preview">
                <a href="{{URL::to('view/post/'.$data->id)}}">

                    <img src="{{URL::to($data->image)}}" alt="Post image" height="300px">
                    <h2 class="post-title">
                        {{$data->title}}
                    </h2>
                </a>
                <p class="post-meta">Category
                    <a href="#">{{$data->name}}</a>
                    on slug {{$data->slug}}</p>
            </div>
            <hr>
            @endforeach
            {{$post->links()}}
           
        </div>
    </div>
</div>

<hr>

@endsection('content')