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
    <div class="container mt-0">
      <div class="row g-0 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card cascading-right" style="
              background: hsla(0, 0%, 100%, 0.55);
              backdrop-filter: blur(30px);
              ">
            <div class="card-body p-5 shadow-5 text-center">
              <h2 class="fw-bold mb-5">LOGIN</h2>
              <form method="POST" action="{{ route('login') }}">
                @csrf  
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <input type="email" placeholder="{{ __('Email Address') }}"  id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                  @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
  
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" placeholder="{{ __('Password') }}" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
                  @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                @if (Route::has('password.request'))
                <a  href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
                </div>
  
                <!-- Checkbox -->
                <div class="row mb-3">
                      <div>
                          <input class="form-check-input me-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                          <label class="form-check-label" for="remember">
                              {{ __('Recuerdame') }}
                          </label>
                      </div>             
              </div>


                <!-- Submit button -->
                <div class="row mb-0">
                  <div class="col-md-4 offset-md-4">
                      <button type="submit" class="btn btn-primary btn-block mb-4">
                          {{ __('Login') }}
                      </button>
                  </div>
              </div>
             <p class="text-center text-muted mt-5 mb-0">Nuevo en TradeVibes? <a href="{{ route('register') }}"
              class="fw-bold text-body"><u>{{ __('Crear cuenta.') }}</u></a></p>

                <!-- Register buttons -->
                <div class="text-center">
                  <p>or login with:</p>
                    <a href="https://es-es.facebook.com"><i class="bi bi-facebook"></i></a>
                    <a href="https://myaccount.google.com/?utm_source=sign_in_no_continue&pli=1"><i class="bi bi-google"></i></a>
                    <a href="https://twitter.com/i/flow/login"><i class="bi bi-twitter"></i></a>
                    <a href="https://github.com/login"><i class="bi bi-github"></i></a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </form>
        <div class="col-lg-6 mb-5 mb-lg-0">
          <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/035.jpg" class="w-100 rounded-4 shadow-4"
            alt="" />
        </div>

      </div>
    </div>
    
    <!-- Jumbotron -->
  </section> 
  <!-- Section: Design Block -->
@endsection
