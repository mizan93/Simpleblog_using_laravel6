@extends('welcome')
@section('content')

<div class="jumbotron">
    <div class="container">
        <h2 class="display-4"> Category View</h2>

        <hr>
        <p>
            <a href="{{route('addcategory')}}" class="btn btn-primary">Add category</a>
            <a href="{{route('categorylist')}}" class="btn btn-success">All category</a>
        </p>
        <hr>
        <div>
            <ol>
                <li>Category Name: {{$catid->name}}</li>
                <li>Category Slug: {{$catid->slug}}</li>
                <li>Category created at: {{$catid->created_at}}</li>
</ol>
        </div>
        
    </div>
</div>
@endsection('content')