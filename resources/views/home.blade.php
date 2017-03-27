@extends('layouts.app')

@section('title') {{ __('Inicio') }} @parent @endsection

@section('content')
<div class="container">
    <div class="row justify-content-md-center m-t">
        <div class="col ">
            <div class="card text-center card-inverse card-info">
                <h3 class="card-header">Destacado</h3>
                <div class="card-block">
                    <h4 class="card-title">Dashboard</h4>
                    <p class="card-text">Has iniciado sesión!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
