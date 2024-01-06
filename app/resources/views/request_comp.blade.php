@extends('layouts.layout')
@section('content')

<main>
    <div id="profile-edit-form" class="container mt-5">
        <div class="row">
            <div class="col-8 offset-2 bg-white">

                <div class="font-weight-bold text-center pt-3" style="font-size: 20px">リクエストありがとうございました！</div>
                <div class="font-weight-bold text-center border-bottom pb-3" style="font-size: 20px">確認後掲載させていただきますので今しばらくお待ちください</div>

                <div class="navbar justify-content-center">

                    <div class="form-group mt-3 mx-4">
                        <a href="/" button type="submit" class="btn btn-outline-dark">
                            トップページへ
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>

</main>


@endsection