@extends('layouts.layout')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            
        
            <div class="card">
                <div class="card-header" style="text-align:center;">{{ __('Reset Password') }}</div>

                <div class="mt-2 mainlogo" style="text-align: center;">
                    <img src="/image/logo.PNG" width="30%">
                </div>

                <div class="card-body" style="text-align:center;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control m-auto @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="width: 80%;">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                       

                        <!-- 送信ボタン -->
                        <div class="text-right">
                            <button type="submit" class='btn btn-outline-dark'>メール送信</button> 
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
