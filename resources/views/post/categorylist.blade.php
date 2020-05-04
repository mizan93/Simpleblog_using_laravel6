@extends('welcome')
@section('content')

<div class="jumbotron">
    <div class="container">
        <h2 class="display-4"> Category List</h2>

        <hr>
        <p>
            <a href="{{route('addcategory')}}" class="btn btn-primary">Add category</a>
            <a href="{{route('categorylist')}}" class="btn btn-success">All category</a>
        </p>
        <hr>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Category name</th>
                    <th>Slug name</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $data)
                <tr>
                    <td scope="row">{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->slug}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                        <a href="{{URL::to('view/category/'.$data->id)}}" class="btn btn-success">View</a>
                        <a href="{{URL::to('edit/category/'.$data->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{URL::to('delete/category/'.$data->id)}}" id="delete" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection('content')