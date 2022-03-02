@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <form method="POST" action="{{ route('admin.plates.store') }}" enctype="multipart/form-data" autocomplete="off">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="category_id"></label>
            <select class="form-control" name="category_id" id="category_id">
                <option value="">Uncategorized</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <div class="d-flex text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">{{ __('Description') }}</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                id="description" rows="5">
                {{ old('description') }}
            </textarea>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">{{ __('Price') }}</label>
            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                value="{{old('price')}}">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input type="hidden" name="visible" class="switch-input" value="0" {{ old('visible')
                    ? 'checked="checked"' : '' }} />
                <input type="checkbox" name="visible" class="switch-input" value="1" {{ old('visible')
                    ? 'checked="checked"' : '' }} />
                <label class="form-check-label" for="visible">Visible</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">{{ __('Ingredients') }}</label>
            <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients"
                id="ingredients" rows="5">
                {{ old('ingredients') }}
            </textarea>
            @error('ingredients')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="image">{{ __('Image') }}</label>
            <input class="form-control-file" type="file" name="image" id="image">
            @error('image')
            <div class="d-flex text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Create') }}
                </button>
            </div>
        </div>
    </form>
</div> --}}

<div class="form-wrapper create-form">
    <div class="form">
        <div class="form-header">
            <h1 class="form-header-title">{{ __('Crea un nuovo piatto') }}</h1>
        </div>
        <div class="form-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('admin.plates.store') }}">
                @csrf

                <div class="form-box">
                    <div class="form-box-header">
                        <p class="form-box-header-message"><strong>*</strong> Questi campi sono obbligatori</p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-box">
                        <div class="form-box-header">
                            <h1 class="form-box-header-title">Nome Piatto <strong>*</strong></h1>
                            <div class="form-box-header-content">
                                <label class="input" for="name">
                                    <div class="input-field">
                                        <input type="text" id="name" placeholder="Inserisci il nome del piatto"
                                            autocomplete="off" required value="{{ old('name') }}" name="name" />
                                    </div>
                                </label>
                                <p class="error"> @error('name') {{ $message }} @enderror </p>
                            </div>
                        </div>
                    </div>

                    <div class="form-box">
                        <div class="form-box-header">
                            <h1 class="form-box-header-title">Categoria <strong>*</strong></h1>
                            <div class="form-box-header-content">
                                <label class="input" for="category_id">
                                    <div class="input-field">
                                        <select name="categories" name="category_id" id="category_id">
                                            <option value="">Nessuna Categoria</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if ($category->id ==
                                                old('category_id')) selected @endif>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </label>
                                <p class="error"> @error('categories') {{ $message }} @enderror </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-box">
                        <div class="form-box-header">
                            <h1 class="form-box-header-title">Descizione <strong>*</strong></h1>
                            <div class="form-box-header-content">
                                <label class="input" for="description">
                                    <div class="input-field">
                                        <textarea name="description" id="description" rows="5">
                                            {{ old('description') }}
                                        </textarea>
                                    </div>
                                </label>
                                <p class="error"> @error('description') {{ $message }} @enderror </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-box">
                        <div class="form-box-header">
                            <h1 class="form-box-header-title">Prezzo <strong>*</strong></h1>
                            <div class="form-box-header-content">
                                <label class="input" for="price">
                                    <div class="input-field">
                                        <input id="price" type="text" name="price" value="{{old('price')}}"
                                            autocomplete="off" required pattern="[0-9]+">
                                    </div>
                                </label>
                                <p class="error"> @error('price') {{ $message }} @enderror </p>
                            </div>
                        </div>
                    </div>

                    <div class="form-box">
                        <div class="form-box-header">
                            <h1 class="form-box-header-title">Scegli un'immagine per il Piatto <strong>*</strong></h1>
                            <div class="form-box-header-content">
                                <label class="input" for="image">
                                    <div class="input-field">
                                        <input type="file" id="image" name="image" placeholder="Inserisci una cover"
                                            autocomplete="off" />
                                    </div>
                                </label>
                                <p class="error"> @error('image') {{ $message }} @enderror </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-box">
                        <div class="form-box-header">
                            <h1 class="form-box-header-title">Ingredienti <strong>*</strong></h1>
                            <div class="form-box-header-content">
                                <label class="input" for="ingredients">
                                    <div class="input-field">
                                        <textarea name="ingredients" id="ingredients" rows="5">
                                            {{ old('ingredients') }}
                                        </textarea>
                                    </div>
                                </label>
                                <p class="error"> @error('ingredients') {{ $message }} @enderror </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-box">
                        <div class="form-box-header">
                            <h1 class="form-box-header-title">Rendere Visibile?<strong>*</strong></h1>
                            <div class="form-box-header-content">
                                <label class="custom-switch" for="visible">
                                    <input type="hidden" name="visible" class="switch-input" value="0" {{ old('visible')
                                        ? 'checked="checked"' : '' }} />
                                    <input type="checkbox" name="visible" class="switch-input" value="1" {{
                                        old('visible') ? 'checked="checked"' : '' }} id="visible" />
                                    <div class="custom-switch__background"></div>
                                    <div class="custom-switch__switcher"></div>
                                </label>
                                <p class="error"> @error('visible') {{ $message }} @enderror </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-box">
                        <button type="submit" class="form-box-button site-primary-btn">{{ __('Aggiungi') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection