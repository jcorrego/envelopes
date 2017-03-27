@extends('layouts.app')
@section('title') {{ __('Categorías') }} @parent @endsection
@section('content')
    <div class="container">
        <categories-list :categories="{{ $categories }}"></categories-list>
    </div>
@endsection
