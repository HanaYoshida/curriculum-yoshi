@extends('layouts.layout')
@section('content')


<main class="py-4">
    <div class=mainlogo style="text-align: center;">
        <img src="/image/mainlogo.jpg" width="50%">
    </div>

    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-6">
            <form method="get">
                <div class="input-group"> 
                    <input class="form-control" type="search" placeholder="店舗名を入力...">
                    <button type="submit" class='btn btn-outline-dark'>検索</button>
                </div>
            </form>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-4 mb-2" style="font-size: 30px;font-weight: bold;color: DodgerBlue;text-align: center;">
                新着サウナ
            </div>
        </div>


        @foreach ($saunas as $sauna)
        <div class="row justify-content-center mb-3">
            <div class="col-md-8 p-5 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3">
                <p style="font-size: 22px;font-weight: bold;">{{ $sauna['name'] }}</p>
                <p>{{ $sauna['address'] }}</p>
            </div>
        </div>
        @endforeach
        
    </div>



</main>

@endsection