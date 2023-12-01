@extends('layouts.layout')
@section('content')


<main class="py-4">
    <div class=mainlogo style="text-align: center;">
        <img src="/image/mainlogo.jpg" width="45%">
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-md-6">
            <form method="get">
                <div class="input-group"> 
                    <input class="form-control" type="search" placeholder="店舗名を入力...">
                    <button type="submit" class='btn btn-outline-dark'>検索</button>
                </div>
            </form>

        </div>
    </div>



</main>

@endsection