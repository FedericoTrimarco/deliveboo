@extends('layouts.app')

@section('content')
<div class="container">

    @if (session('deleted'))
    <div class="alert alert-success">Il piatto: {{session('deleted')}} è stato rimosso con successo</div>
    @endif

    <nav class="d-flex align-items-center justify-content-between my-5">
        <h1>
            Elenco piatti
        </h1>
        <a class="btn btn-warning" href="{{route('admin.plates.create')}}">Add New</a>
    </nav>

    {{-- <table class="table table-bordered">
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
                        <li class="list-unstyled ml-3"><a class="btn btn-link p-0 m-0"
                                href="{{route('admin.plates.show', $plate->id)}}">Show</a>
                        </li>
                        <li class="list-unstyled ml-3"><a class="btn btn-link p-0 m-0"
                                href="{{route('admin.plates.edit', $plate->id)}}">Edit</a>
                        </li>
                        <li class="list-unstyled ml-3">
                            <form action="{{route('admin.plates.destroy', $plate->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link p-0 m-0" type="submit">Delete</button>
                            </form>
                        </li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table> --}}

    {{-- Plates Cards --}}
    <section class="row plates-cards justify-content-between">
        @foreach($plates as $plate)
            <div class="col-4 mb-4">
                <Card
                class="mb-5 h-100"
                img="{{$plate->image}}"
                name="{{$plate->name}}"
                price="{{$plate->price}}"
                description="{{$plate->ingredients}}"
                {{-- :showProduct="{{route('admin.plates.show', $plate->id)}}" --}}
                > 
                </Card>
            </div>
        @endforeach
    </section>


</div>
@endsection