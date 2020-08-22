@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">{{ __('Register') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input
                            type="text"
                            id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}"
                            required autocomplete="name" autofocus
                        />
                        <label class="form-label" for="name">{{ __('Name') }}</label>
                        @error('name')
                        <div class="form-text mb-3 invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-outline mb-4">
                        <input
                            type="email"
                            id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}"
                            required autocomplete="email"
                        />
                        <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                        @error('email')
                        <div class="form-text mb-3 invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <input
                            type="password"
                            id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            required autocomplete="new-password"
                        />
                        <label class="form-label" for="password">{{ __('Password') }}</label>
                        @error('password')
                        <div class="form-text mb-3 invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <input
                            type="password"
                            id="password-confirm"
                            class="form-control"
                            name="password_confirmation"
                            required autocomplete="email"
                        />
                        <label class="form-label" for="password-confirm">{{ __('Confirm password') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
