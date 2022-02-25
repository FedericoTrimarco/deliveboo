@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        @if ($plate->image)
        <div class="col-6">
            <img class="img-fluid" src="{{asset('storage/'.$plate->image)}}" alt="{{$plate->name}}">
        </div>
        @endif
        <div class="{{ $plate->image ? 'col-md-6' : 'col' }}">
            <div class="row">
                <div class="col-6">
                    <h1>{{$plate->name}}</h1>
                </div>
                <div class="col-6">
                    <h1>€{{$plate->price}}</h1>
                </div>
            </div>
            <p>{{$plate->description}}</p>
            <p><strong>Ingredients: </strong>{{$plate->ingredients}}</p>
        </div>
    </div>

</div>
@endsection