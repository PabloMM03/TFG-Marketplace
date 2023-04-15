@extends('layouts.app')

@section('content')
<!-- Section: Design Block -->
<section class="text-center text-lg-start">
    <style>
      .cascading-right {
        margin-right: -50px;
      }
  
      @media (max-width: 991.98px) {
        .cascading-right {
          margin-right: 0;
        }
      }
    </style>
  
    <!-- Jumbotron -->
    <div class="container py-4">
      <div class="row g-0 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card cascading-right" style="
              background: hsla(0, 0%, 100%, 0.55);
              backdrop-filter: blur(30px);">
            <div class="card-body p-5 shadow-5 text-center">
              <h2 class="fw-bold mb-5">CREATE AN ACCOUNT</h2>
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input type="text" id="name" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus" />
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  <label class="form-label" for="form3Example1cg">{{ __('Name') }}</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <label class="form-label" for="form3Example3cg">{{ __('Email Address') }}</label>
                    </div>
                  </div>
                </div>
  
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <label class="form-label" for="form3Example4cg">{{ __('Password') }}</label>
                </div>
  
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                    <label class="form-label" for="form3Example4cdg">{{ __('Confirm Password') }}</label>
                </div>
  
                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                    <label class="form-check-label" for="form2Example3g">
                      I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                    </label>
                  </div>
  
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                    {{ __('Register') }}
                </button>
  
                <p class="text-center text-muted mt-5 mb-0" >Have already an account? <a href="{{ route('login') }}"
                    class="fw-bold text-body"><u>{{ __('Login here.') }}</u></a></p>
              
                <!-- Register buttons -->
                <div class="text-center">
                    <p>or sign up with:</p>
                    <button type="button" class="btn btn-link btn-floating mx-1">
                      {{-- <i class="fab fa-facebook-f"></i> --}}
                      <a href="https://es-es.facebook.com"><i class="bi bi-facebook"></i></a>
                    </button>
    
                    <button type="button" class="btn btn-link btn-floating mx-1">
                      <a href="https://myaccount.google.com/?utm_source=sign_in_no_continue&pli=1"><i class="bi bi-google"></i></a>
                    </button>
    
                    <button type="button" class="btn btn-link btn-floating mx-1">
                      <a href="https://twitter.com/i/flow/login"><i class="bi bi-twitter"></i></a>
                    </button>
    
                    <button type="button" class="btn btn-link btn-floating mx-1">
                      <a href="https://github.com/login"><i class="bi bi-github"></i></a>
                    </button>
                  </div>
              </form>
            </div>
          </div>
        </div>
    </form>
        <div class="col-lg-6 mb-5 mb-lg-0">
          <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/048.jpg" class="w-70 rounded-4 shadow-4"
            alt="" />
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
  </section>
  <!-- Section: Design Block -->

@endsection


