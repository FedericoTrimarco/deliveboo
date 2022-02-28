@extends('layouts.app')

@section('content')
<div class="mx-5">
    <nav class="d-flex align-items-center justify-content-between my-5">
        <h2 class="my-3">
            Elenco piatti
        </h2>
        <a class="site-primary-btn" href="{{route('admin.plates.create')}}">Aggiungi Piatto</a>
    </nav>
</div>


<div class="container-fluid card-container">
    
    @if (session('deleted'))
    <div class="alert alert-success">Il piatto: {{session('deleted')}} è stato rimosso con successo</div>
    @endif
    
    @if(!$plates->isEmpty() )
            {{-- Plates Cards --}}
            <section class="row plates-cards justify-content-start">
                @foreach($plates as $plate)
                    <div class="col-3 mb-5">
                        <Card
                        class="mb-5 h-100"
                        img="{{asset('storage/' .$plate->image)}}"
                        name="{{$plate->name}}"
                        price="{{$plate->price}}"
                        description="{{$plate->ingredients}}"
                        link="{{route('admin.plates.show', $plate->id)}}"
                        > 
                        </Card>
                    </div>
                @endforeach
            </section>
    @else
            <section class="no-plates p-3">
                <h3>Nessun piatto inserito</h3>
                <p>Al momento non hai inserito nessun piatto. Clicca su "Aggiungi Piatto" per aggiungerne uno, oppure <a href="{{route('admin.plates.create')}}">clicca su questo link</a>.</p>
            </section>
    @endif
    
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
</div>
@endsection