@extends('layouts.app')

@section('content')
<div class="home">
    <div class="hero">
        <img class="img-fluid" src="{{ asset('storage/' . $user->restaurant->cover) }}" alt=""> 
        <h1>{{ $user->name }}</h1>      
    </div>
     <div class="container ">
          <div class="row">
                @foreach($plates as $plate)
                <div class="col-4">
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

