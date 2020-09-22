@extends('layouts.app')

@section('content')
<ul class="nav nav-tabs mb-3">
    <li class="nav-item"><a class="nav-link active" href="{{ route('cabinet.home') }}">Dashboard</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('cabinet.adverts.index') }}">Adverts</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('cabinet.profile.home') }}">Profile</a></li>
</ul>
    <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}</div>
            <div class="card-body">
                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
</div>
@endsection
