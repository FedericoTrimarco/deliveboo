@extends('layouts.app')

@section('content')
<div class="form-wrapper">
    <div class="form">
        <div class="form-header">
            <h1 class="form-header-title">{{ __('Registra il tuo ristorante') }}</h1>
            <p class="form-header-links"><span>Oppure</span><a href="{{route('login')}}">Accedi</a></p>
        </div>
        <div class="form-body">
            <form enctype="multipart/form-data" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-box">
                    <div class="form-box-header">
                        <p class="form-box-header-message"><strong>*</strong> Questi campi sono obbligatori</p>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-box">
                        <div class="form-box-header">
                            <h1 class="form-box-header-title">Nome Ristorante <strong>*</strong></h1>
                            <div class="form-box-header-content">
                                <label class="input" for="name">
                                    <div class="input-field">
                                        <input type="text" id="name" placeholder="Inserisci il nome del ristorante"
                                            autocomplete="off" value="{{ old('name') }}" name="name" />
                                    </div>
                                </label>
                                <p class="error"> @error('name') {{ $message }} @enderror </p>
                            </div>
                        </div>
                    </div>
                    <div class="form-box">
                        <div class="form-box-header">
                            <h1 class="form-box-header-title">P.Iva <strong>*</strong></h1>
                            <div class="form-box-header-content">
                                <label class="input" for="vat_number">
                                    <div class="input-field">
                                        <input type="text" id="vat_number" placeholder="Inserisci la tua partita iva"
                                            autocomplete="off" value="{{ old('vat_number') }}" name="vat_number" />
                                    </div>
                                </label>
                                <p class="error"> @error('vat_number') {{ $message }} @enderror </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-box">
                        <div class="form-box-header">
                            <h1 class="form-box-header-title">Indirizzo <strong>*</strong></h1>
                            <div class="form-box-header-content">
                                <label class="input" for="address">
                                    <div class="input-field">
                                        <input type="text" id="address"
                                            placeholder="Inserisci l'indirizzo del ristorante" autocomplete="off"
                                            value="{{ old('address') }}" name="address" />
                                    </div>
                                </label>
                                <p class="error"> @error('address') {{ $message }} @enderror </p>
                            </div>
                        </div>
                    </div>

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
                        <div class="form-box-header">
                            <h1 class="form-box-header-title">Conferma Password <strong>*</strong></h1>
                            <div class="form-box-header-content">
                                <label class="input" for="password_confermation">
                                    <div class="input-field">
                                        <input type="password" id="password_confermation" name="password_confermation"
                                            placeholder="Conferma la tua password" autocomplete="off" />
                                    </div>
                                </label>
                                <p class="error"> @error('password_confermation') {{ $message }} @enderror </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-box">
                        <div class="form-box-header">
                            <h1 class="form-box-header-title">Scegli un'immagine di Copertina <strong>*</strong></h1>
                            <div class="form-box-header-content">
                                <label class="input" for="cover">
                                    <div class="input-field">
                                        <input type="file" id="cover" name="cover" placeholder="Inserisci una cover"
                                            autocomplete="off" />
                                    </div>
                                </label>
                                <p class="error"> @error('cover') {{ $message }} @enderror </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-box">
                        <button type="submit" class="form-box-button">{{ __('Registrati') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

</html>