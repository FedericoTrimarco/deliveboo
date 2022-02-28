@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="form">
        <div class="form-header">
            <h1 class="form-header-title">{{ __('Login') }}</h1>
            <p class="form-header-links"><span>Oppure</span><a href="{{route('register')}}">Registrati</a></p>
        </div>
        <div class="form-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-row">
                    <div class="form-box">
                        <div class="form-box-header">
                            <h1 class="form-box-header-title">Indirizzo Email <strong>*</strong></h1>
                            <div class="form-box-header-content">
                                <label class="input" for="email">
                                    <div class="input-field">
                                        <input type="email" id="email" placeholder="Inserisci un indirizzo email"
                                            autocomplete="off" value="{{ old('email') }}" name="email" />
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
                                            placeholder="Inserisci una password" autocomplete="off" />
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
                            <div class="checkbox"></div>
                            <span>{{ __('Ricordami') }}</span>
                        </label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-box">
                        <button type="submit" class="form-box-button">{{ __('Login') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection