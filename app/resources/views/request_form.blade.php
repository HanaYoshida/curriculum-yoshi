@extends('layouts.layout')
@section('content')

<main>
    <div id="profile-edit-form" class="container mt-5 mb-5">
        <div class="row">
            <div class="col-8 offset-2 bg-white">
                <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">サウナリクエスト</div>

                    <div class="mt-5" style="text-align:center;">

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

                        <form action="{{ route('request.form') }}" method="POST">
                        @csrf

                            <div class="form-group mb-3">
                                <label for="saunaname">施設名</label>
                                <input type="text" class="form-control m-auto" id="saunaname" name="saunaname" value="{{ old('saunaname') }}" style="width: 60%;" />
                            </div>

                            <div class="form-group mb-3">
                                <label for="address">施設住所</label>
                                <input type="text" class="form-control m-auto" id="address" name="address" value="{{ old('address') }}" style="width: 60%;" />
                            </div>

                            <div class="form-group mb-3">
                                <label for="url">施設URL</label>
                                <input type="text" class="form-control m-auto" id="url" name="url" value="{{ old('url') }}" style="width: 60%;" />
                            </div>

                            <div class="text-right">
                                <button type="submit" class='btn btn-outline-dark'>送信</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>


@endsection