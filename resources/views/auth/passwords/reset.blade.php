@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="card-body p-0 bg-black auth-header-box rounded-top">
                        <div class="text-center p-3">
                            <a href="index.html" class="logo logo-admin">
                                <img src="assets/images/logo-sm.png" height="50" alt="logo" class="auth-logo">
                            </a>
                            <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Reset Password</h4>   
                            <p class="text-muted fw-medium mb-0">Enter your Email and instructions will be sent to you!</p>  
                        </div>
                    </div>
                    <div class="card-body pt-0">                                    
                        <form class="my-4" action="https://mannatthemes.com/rizz/default/index.html">            
                            <div class="form-group mb-2">
                                <label class="form-label" for="username">Email</label>
                                <input type="text" class="form-control" id="userEmail" name="Email" placeholder="Enter Email Address">                               
                            </div><!--end form-group-->             
                                        
                            <div class="form-group mb-0 row">
                                <div class="col-12">
                                    <div class="d-grid mt-3">
                                        <button class="btn btn-primary" type="button">Reset <i class="fas fa-sign-in-alt ms-1"></i></button>
                                    </div>
                                </div><!--end col--> 
                            </div> <!--end form-group-->                           
                        </form><!--end form-->
                        <div class="text-center  mb-2">
                            <p class="text-muted">Remember It ?  <a href="auth-register.html" class="text-primary ms-2">Sign in here</a></p>
                        </div>
                    </div><!--end card-body-->
            </div><!--end card-->

            {{-- <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
