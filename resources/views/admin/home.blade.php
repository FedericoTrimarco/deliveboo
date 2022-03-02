@extends('layouts.app')

@section('content')
<div class="home">

    {{--Hero--}}
    <div class="hero mb-4">
        <img class="img-fluid" src="{{ asset('storage/' .    $user->restaurant->cover) }}" alt=""> 
        <h1 class="mb-5">{{ $user->name }}</h1>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#FB8500" fill-opacity="1" d="M0,256L26.7,261.3C53.3,267,107,277,160,288C213.3,299,267,309,320,304C373.3,299,427,277,480,256C533.3,235,587,213,640,218.7C693.3,224,747,256,800,256C853.3,256,907,224,960,224C1013.3,224,1067,256,1120,266.7C1173.3,277,1227,267,1280,266.7C1333.3,267,1387,277,1413,282.7L1440,288L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path></svg>
    </div>

    {{--My Plates--}}   
    <div class=" myPlates">   
        <div class="nav container-fluid">
            <h1>I miei piatti</h1>
            <div class="site-primary-btn">
                <a class="menù" href="{{ route('admin.plates.index') }}">
                    Menù
                </a>
            </div>
        </div>

    {{--My Cards--}}
        <div class="myCards" >
            @foreach($plates as $plate)
            <div class="col-3 mb-5 pics">
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

