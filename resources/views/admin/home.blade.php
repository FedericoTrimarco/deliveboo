@extends('layouts.app')

@section('content')
<div class="home">
    {{--Hero--}}
    <div class="hero">
        <img src="{{ asset('storage/' . $user->restaurant->cover) }}" alt=""> 
        <h1>{{ $user->name }}</h1>      
    </div>
    {{--Plates Cards--}}
    <div class="container myPlates">
        <h1>I MIEI PIATTI</h1>
          <div class="row">
                @foreach($plates as $plate)
                <div class="col-3">
                    <Card img="{{asset('storage/' .$plate->image)}}" name="{{$plate->name}}"
                        price="{{$plate->price}}" description="{{$plate->ingredients}}"
                        link="{{route('admin.plates.show', $plate->id)}}">
                    </Card>
                </div>
                @endforeach
          </div>
     </div>  
</div>
@endsection

