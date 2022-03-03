@extends('layouts.app')

@section('content')
<div class="container">

    <header class="header">
        <div class="header__content">
            <h1 class="header__content-title">{{$plate->name}}</h1>
            <ul class="header__content-list">
                <li class="site-badge">{{$plate->category->name}}</li>
            </ul>
        </div>
        <div class="header__content header__content--right">
            <div class="header__content-form">
                <div class="header__content-button"><a href="{{route('admin.plates.edit', $plate->id)}}">Edit</a></div>
                <form action="{{route('admin.plates.destroy', $plate->id)}}" method="POST">
                    <button type="submit" class="header__content-button delete-btn">
                        @csrf
                        @method('DELETE')
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </form>
            </div>
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