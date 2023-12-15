@extends('layouts.layout')
@section('content')


    <main>
        
        <div id="profile-edit-form" class="container">
            <div class="row">
                <div class="col-8 offset-2 bg-white">
                    <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">サウナ編集</div>

                    <div class="mt-5" style="text-align:center;">
                        <form action="" method="POST">
                        @csrf

                            <div class="form-group mb-3">
                                <label for="name">施設名</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $sauna->name) }}" />
                            </div>

                            <div class="form-group mb-3">
                                <label for="address">施設住所</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $sauna->address) }}" />
                            </div>

                            <div class="form-group mb-3">
                                <label for="closed">定休日</label>
                                <input type="text" class="form-control" id="closed" name="closed" value="{{ old('closed', $sauna->closed) }}" />
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="url">施設URL</label>
                                <input type="text" class="form-control" id="url" name="url" value="{{ old('url', $sauna->url) }}" />
                            </div>

                            <div class="form-group mb-3">
                                <label for="temperature">サウナ温度</label>
                                <input type="text" class="form-control" id="temperature" name="temperature" value="{{ old('temperature', $sauna->temperature) }}" />
                            </div>

                            <div class="form-group mb-3">
                                <label for="image">サウナ画像</label>
                                <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $sauna->image) }}" />
                            </div>

                            
                            <div class="text-right">
                                <button type="submit" class='btn btn-outline-dark'>送信</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </main>
@endsection