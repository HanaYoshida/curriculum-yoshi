@extends('layouts.layout')
@section('content')


    <main>
        
        <div id="profile-edit-form" class="container mt-5 mb-5">
            <div class="row">
                <div class="col-8 offset-2 bg-white">
                    <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">サウナ編集</div>

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

                        <form action="/sauna/{{ $sauna->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                            <div class="form-group mb-3">
                                <label for="saunaname">施設名</label>
                                <input type="text" class="form-control m-auto" id="saunaname" name="saunaname" value="{{ old('saunaname', $sauna->saunaname) }}" style="width: 60%;" />
                            </div>

                            <div class="form-group mb-3">
                                <label for="address">施設住所</label>
                                <input type="text" class="form-control m-auto" id="address" name="address" value="{{ old('address', $sauna->address) }}" style="width: 60%;" />
                            </div>

                            <div class="form-group mb-3">
                                <label for="closed">定休日</label>
                                <input type="text" class="form-control m-auto" id="closed" name="closed" value="{{ old('closed', $sauna->closed) }}" style="width: 60%;" />
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="url">施設URL</label>
                                <input type="text" class="form-control m-auto" id="url" name="url" value="{{ old('url', $sauna->url) }}" style="width: 60%;" />
                            </div>

                            <div class="form-group mb-3">
                                <label for="temperature">サウナ温度</label>
                                <input type="text" class="form-control m-auto" id="temperature" name="temperature" value="{{ old('temperature', $sauna->temperature) }}" style="width: 60%;" />
                            </div>

                            <!-- 画像 -->
                            <span class="avatar-form image-picker">
                                <label for="avatar" class="d-inline-block">
                                    <input id="image" name="image" type="file" class="form-control my-3 @error('image') is-invalid @enderror" value="{{ old('image', $sauna->image) }}" accept="image/png, image/jpeg,image/gif">
                                </label>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </span>

                        

                            
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