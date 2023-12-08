@extends('layouts.layout')
@section('content')


    <main class="py-4">
        <div id="profile-edit-form" class="container">
            <div class="row">
                <div class="col-8 offset-2 bg-white">
                    <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">ユーザー一覧</div>
                    
                    
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>氏名</th>
                                <th scope='col'>ユーザー名</th>
                                <th scope='col'>アドレス</th>
                                <th scope='col'></th>

                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope='col'>{{ $user['id'] }}</th>
                                    <th scope='col'>{{ $user['name'] }}</th>
                                    <th scope='col'>{{ $user['username'] }}</th>
                                    <th scope='col'>{{ $user['email'] }}</th>
                                    <th scope='col'>
                                    <form onsubmit="return confirm('元に戻すことは出来ません。本当に削除しますか？')" action="{{ route('user.destroy', ['id' => $user['id']]) }}" method="post">
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