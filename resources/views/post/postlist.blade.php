@extends('welcome')
@section('content')

<div class="jumbotron">
    <div class="container">
        <h2 class="display-4">Post List</h2>

        <hr>
        <p>
            <a href="{{route('write.post')}}" class="btn btn-success">Write Post</a>
        </p>
        <hr>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Category </th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($post as $data)
                <tr>
                    <td scope="row">{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->title}}</td>
                    <td><img src="{{URL::to($data->image)}}" style="height:40px; widht:70px;" alt=""></td>
                    <td>
                        <a href="{{URL::to('view/post/'.$data->id)}}" class="btn  btn-success">View</a>
                        <a href="{{URL::to('edit/post/'.$data->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{ URL::to('delete/post/'.$data->id) }}" id="delete" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection('content')