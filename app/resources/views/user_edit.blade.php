@extends('layouts.layout')
@section('content')


<main class="py-4">


<div id="profile-edit-form" class="container">
        <div class="row">
            <div class="col-8 offset-2">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 bg-white">

                <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">プロフィール編集</div>

                <div class="card-body" style="text-align:center;">
                <form action="" method="POST">
                    @csrf

                    {{-- アバター画像 --}}
                    <span class="avatar-form image-picker">
                        <input type="file" name="avatar" class="d-none" accept="image/png,image/jpeg,image/gif" id="avatar" />
                        <label for="avatar" class="d-inline-block">
                            <img src="/image/user_icon.png" class="rounded-circle" style="object-fit: cover; width: 200px; height: 200px;">
                        </label>
                    </span>

                    {{-- ユーザー情報 --}}
                    <div class="form-group my-3">
                        <label for="name">氏名</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                    </div>


                    <div class="form-group my-3">
                        <label for="username">ユーザー名</label>
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username', $user->user_name) }}">
                    </div>


                    <div class="form-group my-3">
                        <label for="email">メールアドレス</label>
                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                    </div>
                    

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-outline-dark">
                            保存
                        </button>
                    </div>

                </form>
                </div>
            </div>
        </div>
    </div>


</main>

@endsection