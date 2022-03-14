@extends('layouts.page')

@section('content')
{{-- <div class="mx-5">
    <nav class="d-flex flex-column flex-md-row flex-wrap align-items-center justify-content-between my-5">
        <h2 class="my-3 small-title">
            Elenco piatti
        </h2>
        <a class="site-primary-btn small-font" href="{{route('admin.plates.create')}}">Aggiungi Piatto</a>
    </nav>
</div>
<div class="card-container px-4 pl-md-4 pl-lg-4">
    <div class="container-fluid">

        @if (session('deleted'))
        <div class="alert alert-success">Il piatto: {{session('deleted')}} è stato rimosso con successo</div>
        @endif
        
        @if(!$plates->isEmpty() )
            <section class="row plates-cards justify-content-start">
                @foreach($plates as $plate)
                    <div class="col-sm-6 col-md-6 col-lg-3 px-3 mb-5">
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
            </section>
        @else
            <section class="no-plates p-3">
                <h3 class="mb-3">Nessun piatto inserito</h3>
                <p>Al momento non hai inserito nessun piatto. Clicca su "Aggiungi Piatto" per aggiungerne uno, oppure <a href="{{route('admin.plates.create')}}">clicca su questo link</a>.</p>
            </section>
        @endif
    </div>
</div> --}}

<div class="custom-page">
    <div class="custom-page-grid">

        <div class="custom-sidebar">
            <div class="custom-sidebar-title">
                <div class="custom-sidebar-title-logo">
                    <img src="{{asset('./images/deliveboo-admin-logo.svg')}}" alt="deliveboo-logo">
                </div>
            </div>
            <div class="custom-sidebar-routes">
                <ul class="custom-sidebar-routes-list">
                    <li class="custom-sidebar-routes-list-item @if (Request::route()->getName() == 'admin.plates.index') selected @endif ">
                        <a class="custom-sidebar-routes-list-item-link" href="{{route('admin.home')}}">
                            <span class="custom-sidebar-routes-list-item-link-text">Piatti</span>
                            <span class="custom-sidebar-routes-list-item-link-icon">
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </span>
                            </span>
                        </a>
                    </li>
                    <li class="custom-sidebar-routes-list-item @if (Request::route()->getName() == 'admin.orders.index') selected @endif ">
                        <a class="custom-sidebar-routes-list-item-link" href="{{route('admin.orders.index')}}">
                            <span class="custom-sidebar-routes-list-item-link-text">Ordini</span>
                            <span class="custom-sidebar-routes-list-item-link-icon">
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </span>
                            </span>
                        </a>
                    </li>
                    <li class="custom-sidebar-routes-list-item @if (Request::route()->getName() == 'admin.statistics.index') selected @endif ">
                        <a class="custom-sidebar-routes-list-item-link" href="{{route('admin.statistics.index')}}">
                            <span class="custom-sidebar-routes-list-item-link-text">Statistiche</span>
                                <span class="custom-sidebar-routes-list-item-link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="custom-sidebar-user">
                <div class="custom-sidebar-user-image">
                    <img src="{{asset('storage/' . $user->restaurant->cover)}}" alt="user-profile">
                </div>
                <div class="custom-sidebar-user-name">{{$user->name}}</div>
                <div class="custom-sidebar-user-action">
                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">               
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                        </span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
        </div>

        <div class="custom-editor">
            <div class="custom-editor-container">

                <div class="custom-editor-container-header">
                    <div class="custom-editor-container-header-route">
                        <div class="custom-editor-container-header-route-icon"></div>
                        <div class="custom-editor-container-header-route-name">{{$title}}</div>
                    </div>

                    <div class="custom-editor-container-header-actions">
                        <div class="custom-editor-container-header-actions-button">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </span>
                        </div>
                        <div class="custom-editor-container-header-actions-button primary" id="sidebtn">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="custom-editor-container-filters">
                    <div class="custom-editor-container-filters-button">
                        <span class="custom-editor-container-filters-button-text">Visualizza</span>
                        <span class="custom-editor-container-filters-button-icon">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </span>
                        </span>
                    </div>
                    <div class="custom-editor-container-filters-button">
                        <span class="custom-editor-container-filters-button-icon">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                            </span>
                        </span>
                    </div>
                </div>

                <div class="custom-editor-container-table">
                    <div class="custom-editor-container-table-container">
                        <div class="custom-editor-container-table">
                            <div class="custom-editor-container-table-container">
                                <div class="custom-editor-container-table-container-header">
                                    <div class="custom-editor-container-table-container-header-row">
                                        <div class="custom-editor-container-table-container-header-row-data">#</div>
                                        <div class="custom-editor-container-table-container-header-row-data selected">
                                            <span>Nome</span>
                                            <div class="custom-editor-container-table-container-body-row-data-icon"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg></span></div>
                                        </div>
                                        <div class="custom-editor-container-table-container-header-row-data"><span>Visibile</span></div>
                                        <div class="custom-editor-container-table-container-header-row-data"><span>Prezzo</span></div>
                                        <div class="custom-editor-container-table-container-header-row-data"><span>Categoria</span></div>
                                        <div class="custom-editor-container-table-container-header-row-data"><span>Creato il</span></div>
                                        <div class="custom-editor-container-table-container-header-row-data"></div>
                                    </div>
                                </div>
                                <div class="custom-editor-container-table-container-body">
                                    @foreach ($plates as $plate)                
                                    <div class="custom-editor-container-table-container-body-row">
                                        <div class="custom-editor-container-table-container-body-row-data"><span>#{{$plate->id}}</span></div>
                                        <div class="custom-editor-container-table-container-body-row-data"><span>{{$plate->name}}</span></div>
                                        <div class="custom-editor-container-table-container-body-row-data @if ($plate->visible === 1) status-success @else status-error @endif" >
                                            @if ($plate->visible === 1)
                                            <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></span>
                                            @else 
                                            <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            @endif
                                        </span>
                                        </div>
                                        <div class="custom-editor-container-table-container-body-row-data" id="field-price"><span>{{$plate->price}}</span></div>
                                        <div class="custom-editor-container-table-container-body-row-data"><span>{{$plate->category->name}}</span></div>
                                        <div class="custom-editor-container-table-container-body-row-data" id="field-date"><span>{{$plate->created_at}}</span></div>
                                        <div class="custom-editor-container-table-container-body-row-data">
                                            <a href="{{route('admin.plates.show', $plate->id)}}" class="custom-editor-container-table-container-body-row-data-button">
                                                <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg></span>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>

        <form class="custom-form" action="{{route('admin.plates.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf

            <div class="custom-form-wrapper">
                <div class="custom-form-wrapper-header">

                    <div class="close-button">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                              </svg>
                        </span>
                    </div>

                    <h1 class="custom-form-wrapper-header-title">Aggiungi</h1>

                    <label class="custom-switch" for="visible">
                        <input type="hidden" name="visible" value="0" {{ old('visible') ? 'checked="checked"' : '' }} />
                        <input type="checkbox" name="visible" value="1" {{ old('visible') ? 'checked="checked"' : '' }} id="visible" />
                        <div class="custom-switch-switcher">
                            <div class="custom-switch-switcher-button">
                                <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg></span>
                            </div>
                            <div class="custom-switch-switcher-button">
                                <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg></span>
                            </div>
                        </div>
                    </label>  
                </div>
                <div class="custom-form-wrapper-form"> 
                    <div class="custom-form-wrapper-form-group">
                        <div class="custom-form-wrapper-form-group-title"></div>

                        <div class="custom-form-wrapper-form-group-row" style="--grid-in-row: 1">
                            <label class="custom-form-wrapper-form-group-row-label" for="name">
                                <h3 class="custom-form-wrapper-form-group-row-label-title">Nome <strong>*</strong></h3>
                                <input type="text" name="name" id="name" placeholder="Nome" autocomplete="off" value="{{ old('name') }}" class="@error('password') error @enderror" required>
                                <span class="custom-form-wrapper-form-group-row-label-error"> @error('name'){{$message}}@enderror </span>
                            </label>
                        </div>

                        <div class="custom-form-wrapper-form-group-row" style="--grid-in-row: 1">
                            <label class="custom-form-wrapper-form-group-row-label" for="name">
                                <h3 class="custom-form-wrapper-form-group-row-label-title">Ingredienti <strong>*</strong> <em>(Separati da una virgola)</em> </h3>
                                <input type="text" name="ingredients" id="ingredients" placeholder="Ingredienti" autocomplete="off" value="{{ old('ingredients') }}" class="@error('password') error @enderror" required>
                                <span class="custom-form-wrapper-form-group-row-label-error"> @error('ingredients'){{$message}}@enderror </span>
                            </label>
                        </div>

                        <div class="custom-form-wrapper-form-group-row" style="--grid-in-row: 1">
                            <label class="custom-form-wrapper-form-group-row-label" for="name">
                                <h3 class="custom-form-wrapper-form-group-row-label-title">Descrizione</h3>
                                <textarea name="description" id="description" placeholder="Descrizione" autocomplete="off" class="@error('password') error @enderror" >{{ old('description') }}</textarea>
                                <span class="custom-form-wrapper-form-group-row-label-error"> @error('description'){{$message}}@enderror </span>
                            </label>
                        </div>

                        <div class="custom-form-wrapper-form-group-row" style="--grid-in-row: 1">
                            <label class="custom-form-wrapper-form-group-row-label" for="price">
                                <h3 class="custom-form-wrapper-form-group-row-label-title">Prezzo <strong>*</strong></h3>
                                <input type="text" name="price" id="price" placeholder="Prezzo" autocomplete="off" value="{{ old('price') }}" class="@error('password') error @enderror" required>
                                <span class="custom-form-wrapper-form-group-row-label-error"> @error('price'){{$message}}@enderror </span>
                            </label>
                        </div>

                        <div class="custom-form-wrapper-form-group-row" style="--grid-in-row: 1">
                            <label class="custom-form-wrapper-form-group-row-label" for="category_id">
                                <h3 class="custom-form-wrapper-form-group-row-label-title">Categoria <strong>*</strong></h3>
                                <div class="custom-select">
                                    <div class="custom-select-label">Seleziona una tipologia</div>
                                    <div class="custom-select-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                    <select name="category_id" id="category_id">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif> {{ $category->name }} </option>
                                        @endforeach
                                     </select>
                                     <ul class="custom-select-dropdown">
                                        @foreach ($categories as $category)
                                        <li class="custom-select-dropdown-item">
                                            <div class="custom-select-dropdown-item-text">{{ $category->name }}</div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>   
                                <span class="custom-form-wrapper-form-group-row-label-error"> @error('categories'){{$message}}@enderror </span>  
                             </label>
                        </div>
                        
                        <div class="custom-form-wrapper-form-group-row" style="--grid-in-row: 1">
                            <label class="custom-container-wrapper-panel-form-group-row-label" for="image">
                                <h3 class="custom-container-wrapper-panel-form-group-row-label-title">{{__('Immagine')}}</h3>
                                <div class="custom-file">
                                    <input type="file" name="image" id="image" placeholder="Immagine" value="{{old('image')}}" />
                                    <span class="custom-file-label placeholder">Seleziona una cover</span>
                                </div>
                                <span class="custom-container-wrapper-panel-form-group-row-label-error">@error('image'){{$message}}@enderror</span>
                            </label>
                        </div>


                    </div>
                    <div class="custom-form-wrapper-form-group-row" style="--grid-in-row: 2">
                        <label class="custom-form-wrapper-form-group-row-label"></label>
                        <div class="custom-form-wrapper-form-group-row-label forbutton">
                            <div class="custom-button"><button type="submit"><span>Salva</span></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection