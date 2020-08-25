@extends('layouts.app')

@section('content')
    @include('admin.users._nav')
    <div class="row d-flex justify-content-center">
        <div class="col-4">
            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')

                <div class="form-outline mb-4">
                    <input id="name" class="form-control @error('name') is-invalid'@enderror" name="name" value="{{ old('name', $user->name) }}" required>
                    <label for="name" class="form-label">Name</label>
                    @error('email')
                    <div class="invalid-feedback">
                        <strong class="text-danger">{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <div class="form-outline mb-2">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required>
                    <label for="email" class="form-label">E-Mail Address</label>
                    @error('email')
                        <span class="invalid-feedback">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="role" class="col-form-label">Role</label>
                    <select id="role" class="form-control @error is-invalid @enderror" name="role">
                        @foreach ($roles as $value => $label)
                            <option value="{{ $value }}"{{ $value === old('role', $user->role) ? ' selected' : '' }}>{{ $label }}</option>
                        @endforeach;
                    </select>
                    @error('role')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $('select').select2({
            theme: 'bootstrap4',
        });
    </script>
@endpush
