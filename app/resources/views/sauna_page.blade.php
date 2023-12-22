@extends('layouts.layout')
@section('content')

    <main>
        <div id="profile-edit-form" class="container mt-5">
            <div class="row">
                <div class="col-8 offset-2 bg-white">
                    <div class="row font-weight-bold border-bottom" style="font-size: 24px">
                        <div style="text-align: center;">
                            {{ $sauna['saunaname'] }}
                        </div>
                    </div>

                    <!-- イイネ機能 -->
                    <div class="row" style="text-align: center;">
                        @auth
                            <span>
                                <img src="{{ asset('image/likebutton.png') }}" width="40px">
                                @if($like)
                                    <a href="{{ route('unlike', ['sauna' => $sauna['id']]) }}" class="btn btn-success btn-sm">
                                        いいね
                                        <span class="badge">
                                            {{ optional($sauna)->like->count() }}
                                        </span>
                                    </a>
                                @else
                                    <a href="{{ route('like', ['sauna' => $sauna['id']]) }}" class="btn btn-secondary btn-sm">
                                        いいね
                                        <span class="badge">
                                            {{ optional($sauna)->like->count() }}
                                        </span>
                                    </a>
                                @endif
                            </span>
                        @endauth 
                            
                            
                        @guest
                            <span>
                                <img src="{{ asset('image/likebutton.png') }}" width="40px">
                                    <a class="btn btn-success btn-sm">
                                        いいね
                                        <span class="badge">
                                            {{ optional($sauna)->like->count() }}
                                        </span>
                                    </a>
                            </span>
                        @endguest  
                    </div>
                </div>



                <div class="container mt-3">
                    <div class="row">
                        <div class="col-8 offset-2">
                            <!-- GoogleMap表示 -->
                            
                            <div class="map row" id="map" style="width: 750px; height: 400px;">
                                <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAEQZHbY42MBLz6cM8xyaaiwj7cTYhE6mI&callback=initMap" async defer>
                                </script>
                                <script type="text/javascript">
                                    function initMap() {
                                        const geocoder = new google.maps.Geocoder();
                                        geocoder.geocode( { address: '{{ $sauna['address'] }}'}, function(results, status) {
                                            if (status === google.maps.GeocoderStatus.OK) {
                                                const latlng = {
                                                lat: results[0].geometry.location.lat(),
                                                lng: results[0].geometry.location.lng()
                                            }
                                            const opts = {
                                                zoom: 15,
                                                center: new google.maps.LatLng(latlng)
                                            }
                                            const map = new google.maps.Map(document.getElementById('map'), opts)
                                            new google.maps.Marker({
                                                position: latlng,
                                                map: map 
                                            })
                                            } else {
                                            console.error('Geocode was not successful for the following reason: ' + status)
                                            }
                                        })
                                    }
                                </script>
                            </div>
                                
                        </div>
                    </div>
                </div>

                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-8 offset-2">

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
                                            <th scope='col'>HP</th>
                                            <th scope='col'><a href="{{ $sauna['url'] }}">{{ $sauna['url'] }}</a></th>
                                        </tr>
                                </tbody>
                                <tbody>
                                        <tr>
                                            <th scope='col'>サウナ温度</th>
                                            <th scope='col'>{{ $sauna['temperature'] }}</th>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-8 offset-2">
                            @foreach ($sauna->review as $review)
                                <div class="card mb-4">
                                    <div class="card-header">
                                    @if ($review->user->profile === null)
                                        <img src="{{ asset('/image/user_icon.png') }}" class="rounded-circle" style="object-fit: cover; width: 40px; height: auto;">
                                    @else
                                        <img src="{{ Storage::url($review->user->profile) }}" class="rounded-circle" style="object-fit: cover; width: 40px; height: auto;">
                                    @endif
                                        {{ $review->user->username ?? '退会したユーザー' }} / 投稿日時 {{$review->created_at->diffForHumans()}}
                                    </div>
                                    <div class="card-body">
                                        {{ $review->body }}
                                    </div>
                                </div>
                            @endforeach

                            @auth
                                <div class="mb-4">
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
                                    <form method="post" action="{{ route('review',  ['sauna' => $sauna['id']]) }}">
                                        @csrf
                                        <input type="hidden" name='sauna_id' value="{{ $sauna->id }}">
                                        <div class="form-group">
                                            <textarea name="body" class="form-control" id="body" cols="30" rows="5" 
                                            placeholder="コメントを入力する">{{old('body')}}</textarea>
                                        </div>
                                        <div class="form-group mt-4">
                                            <button class="btn btn-outline-dark float-right mb-3 mr-3">コメントする</button>
                                        </div>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>



                    
            


                </div>
            </div>
        </div>


    </main>


@endsection