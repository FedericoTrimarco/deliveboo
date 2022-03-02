@extends('layouts.app')

@section('content')
<div class="home">

    {{--Hero--}}
    <div class="hero mb-4">
        <img class="img-fluid img" src="{{ asset('storage/' .    $user->restaurant->cover) }}" alt=""> 
        <h1 class="mb-5 smallTit">{{ $user->name }}</h1>
    </div>

    {{--My Plates--}}   
    <div class=" myPlates">   
        <div class="nav container-fluid flex-column flex-lg-row">
            <h1 class="text" >I miei piatti</h1>
            <div class="site-primary-btn but">
                <a class="menù" href="{{ route('admin.plates.index') }}">
                    Menù
                </a>
            </div>
        </div>

    {{--My Cards--}}
        <div class="myCards" >
            @foreach($plates as $plate)
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-5 pics">
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

