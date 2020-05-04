@extends('welcome')
@section('content')

<div class="jumbotron">
    <div class="container">
        <h2 class="display-4">Add Category</h2>

        <hr>
        <p>
            <a href="{{route('addcategory')}}" class="btn btn-primary">Add category</a>
            <a href="{{route('categorylist')}}" class="btn btn-success">All category</a>
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
        <form method="post" action="{{route('store.category')}}" novalidate>
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control" placeholder="Post Name will go here">
            </div>
            <div class="form-group">
                <label for="titie">Slug Name </label>
                <input type="text" name='slug' class="form-control" placeholder="Post Title will go here">
            </div>
            <br>
            <div class="form-group">
                <button type="submit " class="btn btn-primary">Submit</button>
            </div>

    </div>
</div>
@endsection('content')