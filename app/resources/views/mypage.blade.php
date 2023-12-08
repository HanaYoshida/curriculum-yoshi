@extends('layouts.layout')
@section('content')


    <main class="py-4">

        <div class="container">
            <div class="container">
                <div class="navbar justify-content-center">

                    <a href="{{ route('user.edit') }}" button type="button" class="btn btn-outline-dark mx-4">情報変更</a>
                    <a href="" button type="button" class="btn btn-outline-dark mx-4">口コミ一覧</a>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="container">
                <div class="navbar justify-content-center">
                    <a href="{{ route('request.form') }}" button type="button" class="btn btn-outline-dark mx-4">リクエスト</a>
                    <a href="" button type="button" class="btn btn-outline-dark mx-4">お気に入り</a>

                </div>
            </div>
        </div>

    </main>



@endsection