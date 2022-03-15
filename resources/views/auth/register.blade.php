@extends('layouts.page')

@section('content')
<div class="custom-container">
    <div class="custom-container-wrapper">
        <div class="custom-container-wrapper-panel">
            <div class="custom-container-wrapper-panel-logo">
                <img src="{{asset('./images/deliveboo-admin-logo.svg')}}" alt="deliveboo-logo">
            </div>
            <div class="custom-container-wrapper-panel-quotes">
                <div class="custom-container-wrapper-panel-quotes-text">
                    <p class="custom-container-wrapper-panel-quotes-text-quote">
                        <span class="custom-container-wrapper-panel-quotes-text-quote-character">“</span>
                        <span class="custom-container-wrapper-panel-quotes-text-quote-sentence">
                            Uno dei migliori servizi che ho trovato sul mercato. Mi permette di gestire la mia
                            attività con comodità e in tutta sicurezza.
                        </span>
                        <span class="custom-container-wrapper-panel-quotes-text-quote-character">”</span>
                    </p>
                </div>
                <div class="custom-container-wrapper-panel-quotes-user">
                    <div class="custom-container-wrapper-panel-quotes-user-name">- Luigi Ragusa</div>
                    {{-- <div class="custom-container-wrapper-panel-quotes-user-image">
                        <img src="{{ asset('./images/luigiragusa.jpg') }}" alt="user-image">
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="custom-container-wrapper-panel">
            <form class="custom-container-wrapper-panel-form" action="{{ route('register') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <h1 class="custom-container-wrapper-panel-form-title">{{ __('Registrati') }}</h1>
                <div class="custom-container-wrapper-panel-form-group">
                    <div class="custom-container-wrapper-panel-form-group-title"></div>

                    <div class="custom-container-wrapper-panel-form-group-row" style="--grid-in-row: 2">
                        <label class="custom-container-wrapper-panel-form-group-row-label" for="name">
                            <h3 class="custom-container-wrapper-panel-form-group-row-label-title">Nome
                                <strong>*</strong>
                            </h3>
                            <input type="text" name="name" id="name" placeholder="Username" autocomplete="off"
                                value="{{ old('name') }}" class="@error('name') error @enderror" required>
                            <span class="custom-container-wrapper-panel-form-group-row-label-error">
                                @error('name'){{$message}}@enderror
                            </span>
                        </label>
                        <label class="custom-container-wrapper-panel-form-group-row-label" for="email">
                            <h3 class="custom-container-wrapper-panel-form-group-row-label-title">{{__('Email')}}
                                <strong>*</strong>
                            </h3>
                            <input type="text" name="email" id="email" placeholder="Email" autocomplete="off"
                                value="{{ old('email') }}" class="@error('email') error @enderror" required>
                            <span class="custom-container-wrapper-panel-form-group-row-label-error">
                                @error('email'){{$message}}@enderror
                            </span>
                        </label>
                    </div>

                    <div class="custom-container-wrapper-panel-form-group-row" style="--grid-in-row: 1">
                        <label class="custom-container-wrapper-panel-form-group-row-label" for="address">
                            <h3 class="custom-container-wrapper-panel-form-group-row-label-title">
                                {{__('Indirizzo')}}
                                <strong>*</strong>
                            </h3>
                            <input type="text" name="address" id="address" placeholder="Indirizzo"
                                autocomplete="off" class="@error('address') error @enderror"
                                value="{{ old('address') }}" required>
                            <span
                                class="custom-container-wrapper-panel-form-group-row-label-error">@error('address'){{$message}}@enderror</span>
                        </label>
                    </div>

                    <div class="custom-container-wrapper-panel-form-group-row" style="--grid-in-row: 1">
                        <label class="custom-container-wrapper-panel-form-group-row-label" for="vat_number">
                            <h3 class="custom-container-wrapper-panel-form-group-row-label-title">{{__('P.Iva')}}
                                <strong>*</strong>
                            </h3>
                            <input type="text" name="vat_number" id="vat_number" placeholder="P.Iva"
                                autocomplete="off" value="{{ old('vat_number') }}"
                                class="@error('password') error @enderror" required>
                            <span class="custom-container-wrapper-panel-form-group-row-label-error">
                                @error('vat_number'){{$message}}@enderror
                            </span>
                        </label>
                    </div>

                    <div class="custom-container-wrapper-panel-form-group-row" style="--grid-in-row: 2">
                        <label class="custom-container-wrapper-panel-form-group-row-label" for="password">
                            <h3 class="custom-container-wrapper-panel-form-group-row-label-title">{{__('Password')}}
                                <strong>*</strong>
                            </h3>
                            <input type="password" name="password" id="password" placeholder="Password"
                                autocomplete="off" class="@error('password') error @enderror" required>
                            <span class="custom-container-wrapper-panel-form-group-row-label-error">
                                @error('password'){{$message}}@enderror
                            </span>
                        </label>
                        <label class="custom-container-wrapper-panel-form-group-row-label" for="password-confirm">
                            <h3 class="custom-container-wrapper-panel-form-group-row-label-title">{{__('Conferma
                                password')}}
                                <strong>*</strong>
                            </h3>
                            <input type="password" name="password_confirmation" id="password-confirm"
                                placeholder="Conferma password" autocomplete="off" required>
                            <span class="custom-container-wrapper-panel-form-group-row-label-error"></span>
                        </label>
                    </div>

                    <div class="custom-container-wrapper-panel-form-group-row" style="--grid-in-row: 2">
                        <label class="custom-container-wrapper-panel-form-group-row-label" for="category">
                            <h3 class="custom-container-wrapper-panel-form-group-row-label-title">
                                {{__('Categoria')}}
                                <strong>*</strong>
                            </h3>
                            <div class="custom-select-register">
                                <div class="custom-select-register-label">Seleziona una tipologia</div>
                                <div class="custom-select-register-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                                <ul class="custom-select-register-dropdown">
                                    @foreach ($typologies as $typology)
                                    <li class="custom-select-register-dropdown-item">
                                        <label class="custom-select-register-dropdown-item-label"
                                            for="typ-{{$typology->name}}">
                                            <div class="custom-checkbox">
                                                <input type="checkbox" name="typologies[]" value="{{$typology->id}}"
                                                    id="typ-{{$typology->name}}" @if (in_array($typology->id,
                                                old('typologies', []))) checked @endif >
                                                <div class="custom-checkbox-field">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <div class="custom-checkbox-label">{{$typology->name}}</div>
                                            </div>
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <span class="custom-container-wrapper-panel-form-group-row-label-error">
                                @error('category'){{$message}}@enderror
                            </span>
                        </label>

                        <label class="custom-container-wrapper-panel-form-group-row-label" for="cover">
                            <h3 class="custom-container-wrapper-panel-form-group-row-label-title">{{__('Immagine')}}
                                <strong>*</strong>
                            </h3>
                            <div class="custom-file">
                                <input type="file" name="cover" id="cover" placeholder="Immagine" />
                                <span class="custom-file-label placeholder">Seleziona un file</span>
                            </div>
                            <span class="custom-container-wrapper-panel-form-group-row-label-error"></span>
                        </label>
                    </div>

                    <div class="custom-container-wrapper-panel-form-group-row" style="--grid-in-row: 2">
                        <label class="custom-container-wrapper-panel-form-group-row-label"></label>
                        <label class="custom-container-wrapper-panel-form-group-row-label">
                            <div class="custom-links">
                                <span class="custom-links-label">{{__('Già registrato?')}}</span>
                                <a class="custom-links-link" href="{{ route('login') }}">Login</a>
                            </div>
                            <span class="custom-container-wrapper-panel-form-group-row-label-error"></span>
                        </label>
                    </div>

                    <div class="custom-container-wrapper-panel-form-group-row" style="--grid-in-row: 2">
                        <label class="custom-container-wrapper-panel-form-group-row-label"></label>
                        <div class="custom-container-wrapper-panel-form-group-row-label">
                            <div class="custom-button"><button type="submit"><span>Registrati</span></button></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

</html>