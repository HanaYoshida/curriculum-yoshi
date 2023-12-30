@extends('layouts.layout')
@section('content')


<main>


    <div id="profile-edit-form" class="container mt-5 mb-5">
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

                <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">アカウント情報変更</div>

                    <div class="card-body mt-4" style="text-align:center;">

                        <div class='panel-body'>
                            @if($errors->any())
                            <div class='alert alert-danger'>
                                <ul>
                                    @foreach($errors->all() as $message)
                                    <li style="list-style: none;">{{ $message }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    
                        <form action="" method="POST" enctype="multipart/form-data">
                        @csrf

                            <!-- プロフィール画像 -->
                            <span class="avatar-form image-picker">
                                <label for="avatar" class="d-inline-block">
                                    @if ($user->profile === null)
                                        <img src="{{ asset('/image/user_icon.png') }}" class="rounded-circle" style="object-fit: cover; width: 200px; height: 200px;">
                                    @else
                                        <img src="{{ Storage::url($user->profile) }}" class="rounded-circle" style="object-fit: cover; width: 200px; height: 200px;">
                                    @endif
                                    <input id="profile" name="profile" type="file" class="form-control my-3 @error('profile') is-invalid @enderror" value="{{ old('profile', $user->profile) }}" accept="image/png, image/jpeg,image/gif">
                                </label>
                                @error('profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </span>

                            <!-- ユーザー情報 -->
                            <div class="form-group my-3">
                                <label for="name">氏名</label>
                                <input id="name" type="text" class="form-control m-auto" name="name" value="{{ old('name', $user->name) }}" style="width: 60%;">
                            </div>


                            <div class="form-group my-3">
                                <label for="username">ユーザー名</label>
                                <input id="username" type="text" class="form-control m-auto" name="username" value="{{ old('username', $user->username) }}" style="width: 60%;">
                            </div>


                            <div class="form-group my-3">
                                <label for="email">メールアドレス</label>
                                <input id="email" type="text" class="form-control m-auto" name="email" value="{{ old('email', $user->email) }}" style="width: 60%;">
                            </div>
                    

                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-outline-dark">
                                    保存
                                </button>
                            </div>

                        </form>
                    </div>


                    <div class="mt-3" style="text-align: center;">
                        <a href="{{ route('delete.conf') }}">アカウント削除はこちら</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>

@endsection