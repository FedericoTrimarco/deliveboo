@extends('layouts.app')

@section('content')
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
                                        <select name="category_id" id="category_id">
                                            <option value="">Nessuna Categoria</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if ($category->id ==
                                                old('category_id')) selected @endif>
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <div class="input-field-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
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
                            <h1 class="form-box-header-title">Descrizione <strong>*</strong></h1>
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
                            <h1 class="form-box-header-title">Rendere Visibile?</h1>
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