@extends('layouts.app')

@section('content')
    <div class="container">
        <categories-list :categories="{{ $categories }}"></categories-list>
    </div>
@endsection
