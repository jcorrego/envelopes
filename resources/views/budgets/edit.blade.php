@extends('layouts.app')

@section('content')
    <div class="container">
        <envelopes-edit :envelope="{{ $envelope }}" :categories="{{ $categories }}"></envelopes-edit>
    </div>
@endsection
