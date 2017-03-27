@extends('layouts.app')

@section('title') {{ __('Presupuestos') }} @parent @endsection

@section('content')
    <div class="container">
        <budgets-list :budgets="{{ $budgets }}" month="{{ $month }}" :months="{{ collect($months)->toJson() }}" :categories="{{ $categories }}"></budgets-list>
    </div>
@endsection
