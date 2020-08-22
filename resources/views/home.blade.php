@extends('layouts.app')

@section('breadcrumbs', '')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header">{{ __('Card header') }}</div>
            <div class="card-body">
                {{ __('Это ваш сайт !') }}
            </div>
        </div>
    </div>
</div>
@endsection
