@extends('layouts.layout')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="card">
                <div class="card-header" style="text-align:center;">{{ __('Reset Password') }}</div>

                <div class="mt-2 mainlogo" style="text-align: center;">
                    <img src="/image/logo.PNG" width="30%">
                </div>
        
                <div class="card-body" style="text-align:center;">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">


                        <div class="form-group mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control m-auto @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus style="width: 80%;">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control m-auto @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="width: 80%;">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control m-auto" name="password_confirmation" required autocomplete="new-password" style="width: 80%;">
                            
                        </div>


                        <!-- 送信ボタン -->
                        <div class="text-right">
                            <button type="submit" class='btn btn-outline-dark'>{{ __('Reset Password') }}</button> 
                        </div>


                    </form>
                </div>


            </nav>
        </div>
    </div>
</div>
@endsection
