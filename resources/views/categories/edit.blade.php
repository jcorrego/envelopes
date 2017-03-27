@extends('layouts.app')

@section('content')
    <div class="container">
        <categories-edit :category="{{ $category }}"></categories-edit>
    </div>
@endsection
