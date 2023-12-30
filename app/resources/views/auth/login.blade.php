@extends('layouts.layout')

@section('content')
  <div class="container mt-5 mb-5">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card">
          <div class="card-header" style="text-align:center;">ログイン</div>

          <div class="mt-2 mainlogo" style="text-align: center;">
            <img src="/image/logo.PNG" width="30%">
          </div>

          <div class="card-body" style="text-align:center;">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif


            <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group mb-3">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control m-auto" id="email" name="email" value="{{ old('email') }}" style="width: 80%;"/>
              </div>
              <div class="form-group mb-3">
                <label for="password">パスワード</label>
                <input type="password" class="form-control m-auto" id="password" name="password" style="width: 80%;"/>
              </div>
              <div class="text-right">
                <button type="submit" class='btn btn-outline-dark'>送信</button>
              </div>
            </form>
            

          </div>


        </nav>
        <div class="text-center">
          <a href="{{ route('password.request') }}">パスワード忘れた方はこちらから</a>
        </div>
      </div>
    </div>
  </div>
@endsection