@extends('layouts.layout')
@section('content')

    <main class="py-4">
        <div id="profile-edit-form" class="container">
            <div class="row">
                <div class="col-8 offset-2 bg-white">
                    <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">{{ $sauna['name'] }}</div>


                    <div class="container mt-5">
                        <div class="row justify-content-around">
                            <div class="col-4 border border-5 rounded-pill border-primary">
                                <div class="text-center mt-3">
                                温度
                                </div>
                                <div class="text-center mb-3" style="font-size: 30px">
                                {{ $sauna['temperature'] }}
                                </div>
                            </div>  
                            <div class="col-4 border border-5 rounded-pill border-primary">
                                <div class="text-center mt-3">
                                イイネ
                                </div>
                                <div class="text-center mb-3" style="font-size: 30px">
                                〇〇
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <div class="row">
                            <table class='table'>
                                <thead>
                                    <tr>
                                        <th scope='col'>住所</th>
                                        <th scope='col'>{{ $sauna['address'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <th scope='col'>定休日</th>
                                            <th scope='col'>{{ $sauna['closed'] }}</th>
                                        </tr>
                                </tbody>
                                <tbody>
                                        <tr>
                                            <th scope='col'>URL</th>
                                            <th scope='col'>{{ $sauna['url'] }}</th>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="container mt-5">
                        <div class="row">
                            googlemap 表示予定


                        </div>
                    </div>
             
            




                </div>
            </div>
        </div>


    </main>


@endsection