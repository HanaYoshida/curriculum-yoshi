@extends('layouts.layout')
@section('content')


    <main>

        <div class="container">
            <div class="container">
                <div class="navbar justify-content-center">

                    <a href="{{ route('user.list') }}" button type="button" class="btn btn-outline-dark mx-4">ユーザー一覧</a>
                    <a href="{{ route('request.list') }}" button type="button" class="btn btn-outline-dark mx-4">リクエスト一覧</a>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="container">
                <div class="navbar justify-content-center">
                    <a href="{{ route('sauna.create') }}" button type="button" class="btn btn-outline-dark mx-4">サウナページ作成</a>
                    <a href="{{ route('sauna.index') }}" button type="button" class="btn btn-outline-dark mx-4">サウナ施設一覧</a>

                </div>
            </div>
        </div>

    </main>

@endsection