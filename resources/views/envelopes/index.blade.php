@extends('layouts.app')

@section('content')
    <div class="container">
        <envelopes-list :envelopes="{{ $envelopes }}"></envelopes-list>
    </div>
@endsection
