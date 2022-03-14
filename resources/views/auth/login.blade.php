@extends('layouts.page')

@section('content')
{{-- <div class="form-wrapper">
    <div class="form">
        <div class="form-header">
            <h1 class="form-header-title">{{ __('Login') }}</h1>
        </div>
        <div class="form-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-row focusin">
                    <div class="form-box">
                        <div class="form-box-header">
                            <h1 class="form-box-header-title">Indirizzo Email <strong>*</strong></h1>
                            <div class="form-box-header-content">
                                <label class="input" for="email">
                                    <div class="input-field">
                                        <input type="email" id="email" placeholder="Inserisci un indirizzo email"
                                            autocomplete="off" value="{{ old('email') }}" required name="email" />
                                    </div>
                                </label>
                                <p class="error"> @error('email') {{ $message }} @enderror </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-box">
                        <div class="form-box-header">
                            <h1 class="form-box-header-title">Password <strong>*</strong></h1>
                            <div class="form-box-header-content">
                                <label class="input" for="password">
                                    <div class="input-field">
                                        <input type="password" id="password" name="password"
                                            placeholder="Inserisci una password" required autocomplete="off" />
                                    </div>
                                </label>
                                <p class="error"> @error('password') {{ $message }} @enderror </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-box">
                        <label class="form-checkbox" for="remember">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <div class="checkbox">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span>{{ __('Ricordami') }}</span>
                        </label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-box">
                        <button type="submit" class="form-box-button site-primary-btn">{{ __('Login') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> --}}
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
            <form class="custom-container-wrapper-panel-form" action="{{ route('login') }}" method="POST">
                @csrf

                <h1 class="custom-container-wrapper-panel-form-title">{{ __('Login') }}</h1>
                <div class="custom-container-wrapper-panel-form-group">
                    <div class="custom-container-wrapper-panel-form-group-title"></div>

                    <div class="custom-container-wrapper-panel-form-group-row" style="--grid-in-row: 1">
                        <label class="custom-container-wrapper-panel-form-group-row-label" for="email">
                            <h3 class="custom-container-wrapper-panel-form-group-row-label-title">Email
                                <strong>*</strong>
                            </h3>
                            <input type="email" name="email" id="email" placeholder="Email" autocomplete="off"
                                value="{{ old('email') }}" class="@error('email') error @enderror" required>

                            <span class="custom-container-wrapper-panel-form-group-row-label-error">
                                @error('email'){{$message}}@enderror
                            </span>

                        </label>
                    </div>

                    <div class="custom-container-wrapper-panel-form-group-row" style="--grid-in-row: 1">
                        <label class="custom-container-wrapper-panel-form-group-row-label" for="password">
                            <h3 class="custom-container-wrapper-panel-form-group-row-label-title">Password
                                <strong>*</strong>
                            </h3>
                            <input type="password" name="password" id="password" placeholder="Password"
                                autocomplete="off" class="@error('password') error @enderror" required>
                            <span
                                class="custom-container-wrapper-panel-form-group-row-label-error">@error('password'){{$message}}@enderror</span>
                        </label>
                    </div>

                    <div class="custom-container-wrapper-panel-form-group-row" style="--grid-in-row: 2">
                        <label class="custom-container-wrapper-panel-form-group-row-label" for="remember">
                            <div class="custom-checkbox">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked'
                                    : '' }} />
                                <span class="custom-checkbox-field">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                                <span class="custom-checkbox-label">Resta collegato</span>
                            </div>
                            <span class="custom-container-wrapper-panel-form-group-row-label-error"></span>
                        </label>
                        <label class="custom-container-wrapper-panel-form-group-row-label">
                            <div class="custom-links">
                                <span class="custom-links-label">Nuovo utente?</span>
                                <a class="custom-links-link" href="{{ route('register') }}">Registrati</a>
                            </div>
                            <span class="custom-container-wrapper-panel-form-group-row-label-error"></span>
                        </label>
                    </div>

                    <div class="custom-container-wrapper-panel-form-group-row" style="--grid-in-row: 2">
                        <label class="custom-container-wrapper-panel-form-group-row-label"></label>
                        <label class="custom-container-wrapper-panel-form-group-row-label">
                            <div class="custom-button"><button type="submit"><span>Login</span></button></div>
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection