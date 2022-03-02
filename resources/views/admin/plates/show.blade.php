@extends('layouts.app')

@section('content')
<div class="container">

    <header class="header">
        <div class="header__content">
            <h1 class="header__content-title">{{$plate->name}}</h1>
            <ul class="header__content-list">
                {{-- <li>{{$plate->category->name}}</li> --}}
            </ul>
        </div>
        <div class="header__content header__content--right">
            <div class="header__content-button"><a href="{{route('admin.plates.edit', $plate->id)}}">Edit</a></div>
        </div>
    </header>

    <div class="row content">
        @if ($plate->image)
        <div class="col-6 content__column">
            <img class="img-fluid" src="{{asset('storage/'.$plate->image)}}" alt="{{$plate->name}}">
        </div>
        @endif
        <div class="{{ $plate->image ? 'col-md-6 content__column' : 'col content__column' }}">
            <div class="row">
                <div class="col-12 content__column">
                    <h1 class="content__column-title">{{$plate->name}}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-6 content__column content__column--small">
                    <h1 class="content__column-subtitle">€{{$plate->price}}</h1>
                </div>
            </div>
            <div class="row">
                <div class="mt-4 content__column content__column--small">
                    <p class="content__column-paragraph"><strong>Ingredienti: </strong>{{$plate->ingredients}}</p>
                </div>
            </div>
            <div class="row">
                <div class="mt-4 content__column content__column--small">
                    <div class="content__column-paragraph">
                        <strong class="mr-3">Visibile: </strong>
                        <label class="custom-switch" for="visible">
                            <input type="checkbox" name="visible" id="visible" @if ($plate->visible) checked @endif
                            disabled/>
                            <div class="custom-switch__background"></div>
                            <div class="custom-switch__switcher"></div>
                        </label>
                    </div>
                    <p class="content__column-message">Puoi modificare la visibilità editando il prodotto</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row content">
        <div class="content__column--small w-100">
            <h1 class="content__column-title mb-3">Descrizione</h1>
            <p class="content__column-paragraph">{{$plate->description}}</p>
        </div>
    </div>
    @endsection