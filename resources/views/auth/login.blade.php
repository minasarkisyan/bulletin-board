@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">

                    <form class="needs-validation" method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input id="email" type="email" name="email" class="form-control was-invalid " value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label class="form-label" for="email">{{ __('E-Mail Address') }}</label>
                            @error('email')
                            <div class="invalid-feedback" role="alert">Bud ili yr</div>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input id="password" type="password" name="password" class="form-control @error('password') was-invalid @enderror" name="password" required autocomplete="current-password">
                            <label class="form-label" for="password">{{ __('Password') }}</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- 2 column grid layout for inline styling -->
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-center">
                                <!-- Checkbox -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                            </div>

                            <div class="col text-center">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
//         // Example starter JavaScript for disabling form submissions if there are invalid fields
//         (function () {
//             'use strict';
//
// // Fetch all the forms we want to apply custom Bootstrap validation styles to
//             let forms = document.querySelectorAll('.needs-validation');
//
// // Loop over them and prevent submission
//             Array.prototype.slice.call(forms).forEach(function (form) {
//                 form.addEventListener(
//                     'submit',
//                     function (event) {
//                         if (!form.checkValidity()) {
//                             event.preventDefault();
//                             event.stopPropagation();
//                         }
//
//                         form.classList.add('was-validated');
//                     },
//                     false
//                 );
//             });
//         })();

    </script>
@endpush
