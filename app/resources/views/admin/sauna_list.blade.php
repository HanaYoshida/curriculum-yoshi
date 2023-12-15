@extends('layouts.layout')
@section('content')


    <main>
        <div id="profile-edit-form" class="container">
            <div class="row">
                <div class="col-8 offset-2 bg-white">
                    <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">サウナ施設一覧</div>
                    
                    
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>施設名</th>
                                <th scope='col'></th>
                                <th scope='col'></th>
                                <th scope='col'></th>
                                
                            </tr>
                        </thead>



                        <tbody>
                            @foreach($saunas as $sauna)
                                <tr>
                                    <th scope='col'>{{ $sauna['name'] }}</th>
                                    <th scope='col'>
                                        <a href="{{ route('sauna.page', ['id' => $sauna['id']]) }}">
                                            <button type="submit" class="btn btn-primary btn-sm">サウナページ</button>
                                        </a>
                                    </th> 

                                    <th scope='col'>
                                        <a href="{{ route('sauna.edit', ['id' => $sauna['id']]) }}" button type="submit" class="btn btn-warning btn-sm">編集</a>
                                    </th>

                                    <th scope='col'>
                                        <form onsubmit="return confirm('元に戻すことは出来ません。本当に削除しますか？')" action="{{ route('sauna.destroy', ['id' => $sauna['id']]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">削除</button>
                                        </form>
                                    </th>

                                </tr> 
                            @endforeach
                        </tbody>
                    </table>







                    
                </div>
            </div>
        </div>


    </main>

@endsection