@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card text-center" style="width: 300px;">
                <div class="card-header h5 text-white bg-black">{{ __('Reset Password') }}</div>
                @if (session('status'))
                   <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                 @endif
                 <form method="POST" action="{{ route('password.email') }}">
                     @csrf
                <div class="card-body px-5">
                    <p class="card-text py-2">
                        Enter your email address and we'll send you an email with instructions to reset your password.
                    </p>
                    <div class="form-outline">
                        <input type="email" id="typeEmail" class="form-control my-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label class="form-label" for="typeEmail">{{ __('Email Address') }}</label>
                    </div>
                    <button type="submit" class="btn btn-secondary">
                        {{ __('Send Password') }}
                    </button>
                    <div class="d-flex justify-content-between mt-4">
                    <p class="text-center text-muted mt-5 mb-0"><a href="{{ route('login') }}"
                        class="fw-bold text-body"><u>{{ __('Login') }}</u></a></p>

                    <p class="text-center text-muted mt-5 mb-0"><a href="{{ route('register') }}"
                        class="fw-bold text-body"><u>{{ __('Register') }}</u></a></p>
        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
