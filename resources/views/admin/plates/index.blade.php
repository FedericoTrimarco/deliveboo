@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="d-flex align-items-center justify-content-between mb-5">
        <div></div>
        <a href="{{route('admin.plates.create')}}">Add New</a>
    </nav>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Visible</th>
                <th scope="col">Ingredients</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($plates as $plate)
            <tr>
                <th scope="row">{{$plate->id}}</th>
                <td>{{$plate->name}}</td>
                <td>{{$plate->price}}</td>
                <td>{{$plate->visible}}</td>
                <td>{{$plate->ingredients}}</td>
                <td>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-unstyled ml-3"><a href="{{route('admin.plates.show', $plate->id)}}">Show</a>
                        </li>
                        <li class="list-unstyled ml-3"><a href="{{route('admin.plates.edit', $plate->id)}}">Edit</a>
                        </li>
                        <li class="list-unstyled ml-3"><a href="">Delete</a></li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection