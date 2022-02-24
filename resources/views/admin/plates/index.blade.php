@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="d-flex align-items-center justify-content-between">
        <div></div>
        <a href="{{route('admin.plates.create')}}">Add New</a>
    </nav>
</div>
@endsection