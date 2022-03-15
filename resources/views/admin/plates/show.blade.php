@extends('layouts.page')

@section('content')
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
                        <li class="custom-sidebar-routes-list-item selected">
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
                            <div class="custom-editor-container-header-route-name">Piatti</div>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
    
                    <div class="custom-editor-container-filters">
                        <div class="custom-editor-container-filters-button">
                            <a href="{{route('admin.plates.destroy', $plate->id)}}" class="custom-editor-container-filters-button-icon" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></span>
                            </a>
                            <form hidden id="delete-form" action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
    
                    <div class="custom-editor-container-content">
                        <div class="custom-editor-container-content-wrapper">
                            <div class="custom-editor-container-content-wrapper-row">
                                <div class="custom-editor-container-content-wrapper-row-box">
                                    <div class="custom-editor-container-content-wrapper-row-box-image">
                                        @if ($plate->image)
                                            <img src="{{asset('storage/'.$plate->image)}}" alt="plate-image">
                                        @else
                                            <img src="https://lightwidget.com/wp-content/uploads/local-file-not-found.png" alt="img-not-found">
                                        @endif
                                    </div>
                                </div>
                                <div class="custom-editor-container-content-wrapper-row-box">
                                    <div class="custom-editor-container-content-wrapper-row-box-labels">
                                        <div class="custom-editor-container-content-wrapper-row-box-labels-header">
                                            <div class="custom-editor-container-content-wrapper-row-box-labels-header-name">{{$plate->name}}</div>
                                            <div class="custom-editor-container-content-wrapper-row-box-labels-header-price" id="field-price"><span>{{$plate->price}}</span></div>
                                        </div>
                                        @if ($plate->visible != 1)
                                        <div class="custom-editor-container-content-wrapper-row-box-labels-info">
                                            <div class="custom-editor-container-content-wrapper-row-box-labels-info-icon"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg></span></div>
                                            <div class="custom-editor-container-content-wrapper-row-box-labels-info-text">Questo piatto non sarà visibile al pubblico fino a quando non cambierai le impostazioni di visibilità. Usa il menu edit per modificare le sue impostazioni.</div>
                                        </div>
                                        @endif
                                        <div class="custom-editor-container-content-wrapper-row-box-labels-ingredients">
                                            <div class="custom-editor-container-content-wrapper-row-box-labels-ingredients-label">Ingredienti</div>
                                            <div class="custom-editor-container-content-wrapper-row-box-labels-ingredients-text">{{$plate->ingredients}}</div>
                                        </div>
                                        <div class="custom-editor-container-content-wrapper-row-box-labels-ingredients">
                                            <div class="custom-editor-container-content-wrapper-row-box-labels-ingredients-label">Categoria</div>
                                            <div class="custom-editor-container-content-wrapper-row-box-labels-ingredients-text">{{$plate->category->name}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="custom-editor-container-content-wrapper-row full">
                                <div class="custom-editor-container-content-wrapper-row-box">
                                    <div class="custom-editor-container-content-wrapper-row-box-description">
                                        <div class="custom-editor-container-content-wrapper-row-box-description-label">Descrizione</div>
                                        <div class="custom-editor-container-content-wrapper-row-box-description-text">{{$plate->description}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <form class="custom-form" action="{{route('admin.plates.update', $plate->id)}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PATCH')
                <div class="custom-form-wrapper">
                    <div class="custom-form-wrapper-header">
    
                        <div class="close-button">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                  </svg>
                            </span>
                        </div>
    
                        <h1 class="custom-form-wrapper-header-title">Modifica</h1>
    
                        <label class="custom-switch" for="visible">
                            <input type="hidden" name="visible" value="0" {{ old('visible', $plate->visible) ? 'checked="checked"' : '' }} />
                            <input type="checkbox" name="visible" value="1" {{ old('visible', $plate->visible) ? 'checked="checked"' : '' }} id="visible" />
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
                                    <input type="text" name="name" id="name" placeholder="Nome" autocomplete="off" value="{{ old('name', $plate->name) }}" class="@error('password') error @enderror" required>
                                    <span class="custom-form-wrapper-form-group-row-label-error"> @error('name'){{$message}}@enderror </span>
                                </label>
                            </div>
    
                            <div class="custom-form-wrapper-form-group-row" style="--grid-in-row: 1">
                                <label class="custom-form-wrapper-form-group-row-label" for="name">
                                    <h3 class="custom-form-wrapper-form-group-row-label-title">Ingredienti <em>(Separati da una virgola)</em> </h3>
                                    <input type="text" name="ingredients" id="ingredients" placeholder="Ingredienti" autocomplete="off" value="{{ old('ingredients', $plate->ingredients) }}" class="@error('password') error @enderror" required>
                                    <span class="custom-form-wrapper-form-group-row-label-error"> @error('ingredients'){{$message}}@enderror </span>
                                </label>
                            </div>
    
                            <div class="custom-form-wrapper-form-group-row" style="--grid-in-row: 1">
                                <label class="custom-form-wrapper-form-group-row-label" for="name">
                                    <h3 class="custom-form-wrapper-form-group-row-label-title">Descrizione</h3>
                                    <textarea name="description" id="description" placeholder="Descrizione" autocomplete="off" class="@error('password') error @enderror">{{ old('description', $plate->description) }}</textarea>
                                    <span class="custom-form-wrapper-form-group-row-label-error"> @error('description'){{$message}}@enderror </span>
                                </label>
                            </div>
    
                            <div class="custom-form-wrapper-form-group-row" style="--grid-in-row: 1">
                                <label class="custom-form-wrapper-form-group-row-label" for="price">
                                    <h3 class="custom-form-wrapper-form-group-row-label-title">Prezzo <strong>*</strong></h3>
                                    <input type="text" name="price" id="price" placeholder="Prezzo" autocomplete="off" value="{{ old('price', $plate->price) }}" class="@error('password') error @enderror" required>
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
                                            <option value="{{ $category->id }}" @if ($category->id == old('category_id',$plate->category_id)) selected @endif> {{ $category->name }} </option>
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
                                        <input type="file" name="image" id="image" placeholder="Immagine" value="{{old('image', $plate->image)}}" />
                                        <span class="custom-file-label placeholder">Seleziona una cover</span>
                                    </div>
                                    <span class="custom-container-wrapper-panel-form-group-row-label-error">@error('image'){{$message}}@enderror</span>
                                </label>
                            </div>
    
    
                        </div>
                        <div class="custom-form-wrapper-form-group-row" style="--grid-in-row: 2">
                            <label class="custom-form-wrapper-form-group-row-label"></label>
                            <div class="custom-form-wrapper-form-group-row-label forbutton">
                                <div class="custom-button"><button type="submit"><span>Modifica</span></button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection