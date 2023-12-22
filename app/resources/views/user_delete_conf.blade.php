@extends('layouts.layout')
@section('content')

<main>
    <div id="profile-edit-form" class="container mt-5">
        <div class="row">
            <div class="col-8 offset-2 bg-white">
                <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">アカウント削除確認</div>
                    <div class="navbar justify-content-center">

                        <div class="form-group mt-3 mx-4">
                            <a href="{{ route('user.edit') }}" button type="submit" class="btn btn-outline-primary">
                            戻る
                            </a>
                        </div>

                        <div class="form-group mt-3 mx-4">
                            <form action="{{ route('delete.comp') }}" method="post">
                            @csrf
                            @method('delete')
                                <button type="submit" class="btn btn-outline-danger">
                                    削除
                                </button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>    
</main>


@endsection
