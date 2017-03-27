@extends('layouts.app')
@section('title') {{ __('Sobres') }} @parent @endsection
@section('content')
    <div class="container">
        <envelopes-list :envelopes="{{ $envelopes }}" :categories="{{ $categories }}"></envelopes-list>
    </div>
@endsection
