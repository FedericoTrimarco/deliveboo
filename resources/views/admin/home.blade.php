@extends('layouts.app')

@section('content')
<div class="home">
    <div class="hero mb-4">
        <img class="img-fluid" src="{{ asset('storage/' . $user->restaurant->cover) }}" alt=""> 
        <h1 class="mb-5">{{ $user->name }}</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            @foreach($plates as $plate)
            <div class="col-2 mb-5">
                <Card
                    class="mb-5 h-100"
                    img="{{asset('storage/' .$plate->image)}}"
                    name="{{$plate->name}}"
                    price="{{$plate->price}}"
                    description="{{$plate->ingredients}}"
                    show="{{route('admin.plates.show', $plate->id)}}"
                    plate="{{$plate->image}}"
                    visible="{{$plate->visible}}"
                >
                </Card>
            </div>
            @endforeach
        </div>
     </div>  
</div>
@endsection

