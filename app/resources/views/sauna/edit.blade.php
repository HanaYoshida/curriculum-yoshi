@extends('layouts.layout')
@section('content')


    <main>
        
        <div id="profile-edit-form" class="container mt-5">
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

                        <form action="/sauna/{{ $sauna->id }}" method="POST">
                        @csrf
                        @method('PUT')

                            <div class="form-group mb-3">
                                <label for="saunaname">施設名</label>
                                <input type="text" class="form-control" id="saunaname" name="saunaname" value="{{ old('saunaname', $sauna->saunaname) }}" />
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