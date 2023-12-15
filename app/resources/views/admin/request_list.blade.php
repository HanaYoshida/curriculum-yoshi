@extends('layouts.layout')
@section('content')


    <main>
        <div id="profile-edit-form" class="container">
            <div class="row">
                <div class="col-8 offset-2 bg-white">
                    <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">リクエスト一覧</div>    


                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>投稿者</th>
                                <th scope='col'>施設名</th>
                                <th scope='col'>住所</th>
                                <th scope='col'>URL</th>
                                <th scope='col'></th>

                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($userrequests as $request)
                                <tr>
                                    <th scope='col'>{{ $request->user->name }}</th>
                                    <th scope='col'>{{ $request['name'] }}</th>
                                    <th scope='col'>{{ $request['address'] }}</th>
                                    <th scope='col'>{{ $request['url'] }}</th>
                                    <th scope='col'>
                                    <form onsubmit="return confirm('元に戻すことは出来ません。本当に削除しますか？')" action="{{ route('request.destroy', ['id' => $request['id']]) }}" method="post">
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