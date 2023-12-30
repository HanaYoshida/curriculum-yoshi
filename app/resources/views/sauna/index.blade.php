@extends('layouts.layout')
@section('content')


    <main>
        <div id="profile-edit-form" class="container mt-5">
            <div class="row">
                <div class="col-8 offset-2 bg-white">
                    <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">サウナ施設一覧</div>
                    
                    <div class="row justify-content-center mt-5 mb-5">
                        <div class="col-md-6">
                            <form method="get">
                            @csrf
                                <div class="input-group"> 
                                    <input type="search" class="form-control" name="search" value="{{ $search }}" placeholder="施設名を入力...">
                                    <button type="submit" class='btn btn-outline-dark'>検索</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="container my-5" id="skill">
            <div class="row row-cols-1 row-cols-md-3">
                @foreach ($saunas as $sauna)
                    <div class="col mb-4">
                        <div class="card">

                        
                            @if ($sauna->image === null)
                                <img src="{{ asset('/image/noimage.JPG') }}" class="card-img-top" style="object-fit: cover;">
                            @else
                                <img src="{{ Storage::url($sauna->image) }}" class="card-img-top" style="object-fit: cover;">
                            @endif


                            <div class="card-body">
                                <a href="{{ route('saunapage', ['sauna' => $sauna['id']]) }}" style="text-decoration: none;">
                                    <h5 class="card-title">{{ $sauna['saunaname'] }}</h5>
                                </a>
                                <p class="card-text">{{ $sauna['address'] }}</p>
                            

                                <div class="d-flex justify-content-around">
                                    <a href="{{ route('sauna.edit', ['sauna' => $sauna['id']]) }}" button type="submit" class="btn btn-outline-warning">編集</a>
                                    <form onsubmit="return confirm('元に戻すことは出来ません。本当に削除しますか？')" action="{{ route('sauna.destroy', ['sauna' => $sauna['id']]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger">削除</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $saunas->links() }}                            
            </div>
        </div>            
    </main>
@endsection