<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'サウナ') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

  <body>
    <div id="app">
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">

          <a href="{{ url('/') }}">
            <img src="/image/headerlogo.jpg" style="
                object-fit: cover;
                width: 135px;
                height: 45px;
            ">
          </a>
        
          
          <div class="my-navbar-control">
            @if(Auth::check())
              <a href="{{ route('mypage') }}" button type="button" class="btn btn-outline-dark">マイページ</a>
              <a href="#" id="logout" button type="button" class="btn btn-outline-dark">ログアウト</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              </form>
              <script>
              document.getElementById('logout').addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('logout-form').submit();
              });
              </script>
            @else

              <a href="{{ route('register') }}" button type="button" class="btn btn-outline-dark">会員登録</a>
              <a href="{{ route('login') }}" button type="button" class="btn btn-outline-dark">ログイン</a>
                
            @endif
          </div>


        </div>
      </nav>
    @yield('content')
    </div>
  </body>

  
</html>