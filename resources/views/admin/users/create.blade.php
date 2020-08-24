@extends('layouts.app')

@section('content')
    @include('admin.users._nav')
    <div class="row d-flex justify-content-center">
        <div class="col-4">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <div class="form-outline mb-4">
                    <input id="name" class="form-control @error('name') is-invalid'@enderror" name="name" value="{{ old('name') }}" required>
                    <label for="name" class="form-label">Name</label>
                    @error('email')
                    <div class="invalid-feedback">
                        <strong class="text-danger">{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <div class="form-outline mb-4">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                    <label for="email" class="form-label">E-Mail Address</label>
                    @error('email')
                        <span class="invalid-feedback">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
