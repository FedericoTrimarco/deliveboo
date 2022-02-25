@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('admin.plates.update', $plate->id) }}" enctype="multipart/form-data"
        autocomplete="off">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name',$plate->name) }}">
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
                <option value="{{ $category->id }}" @if ($category->id == old('category_id', $category->id)) selected
                    @endif
                    >{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="d-flex text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">{{ __('Description') }}</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                id="description" rows="5">{{ old('description',$plate->description) }}</textarea>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">{{ __('Price') }}</label>
            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                value="{{old('price',$plate->price)}}">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <div class="form-check">
                <input type="hidden" name="visible" class="switch-input" value="0" {{ old('visible', $plate->cover)
                ? 'checked="checked"' : '' }} />
                <input type="checkbox" name="visible" class="switch-input" value="1" {{ old('visible', $plate->visible)
                ? 'checked="checked"' : '' }} />
                <label class="form-check-label" for="visible">Visible</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">{{ __('Ingredients') }}</label>
            <textarea class="form-control @error('ingredients') is-invalid @enderror" name="ingredients"
                id="ingredients" rows="5">{{ old('ingredients', $plate->ingredients) }}</textarea>
            @error('ingredients')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            @if ($plate->image)
            <img width="300px" class="img-fluid mb-3" src="{{asset('storage/'.$plate->image)}}" alt="{{$plate->title}}">
            @endif
            <label class="form-label" for="image"></label>
            <input class="form-control" type="file" name="image" id="image">
            @error('image')
            <div class="d-flex text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <div class="col">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection