<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <!-- Add Google login button here -->
                        <a href="{{ route('auth.google') }}" class="btn btn-primary">Login with Google</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
