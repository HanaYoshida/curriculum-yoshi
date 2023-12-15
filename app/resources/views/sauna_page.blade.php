@extends('layouts.layout')
@section('content')

    <main>
        <div id="profile-edit-form" class="container">
            <div class="row">
                <div class="col-8 offset-2 bg-white">
                    <div class="row justify-content-around font-weight-bold border-bottom" style="font-size: 24px">
                        <div class="col-7" style="text-align: right;">
                            {{ $sauna['name'] }}
                        </div>
                        <div class="col-3" style="text-align: end;">
                            <span>
                                    <img src="{{ asset('image/likebutton.png') }}" width="40px">
                                    @if($like)
                                        <a href="{{ route('unlike', ['id' => $sauna['id']]) }}" class="btn btn-success btn-sm">
                                            いいね
                                            <span class="badge">
                                                {{ optional($sauna)->like->count() }}
                                            </span>
                                        </a>
                                    @else
                                        <a href="{{ route('like', ['id' => $sauna['id']]) }}" class="btn btn-secondary btn-sm">
                                            いいね
                                            <span class="badge">
                                                {{ optional($sauna)->like->count() }}
                                            </span>
                                        </a>
                                    @endif
                                </span>
                        </div>
                    </div>


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
                                            <th scope='col'>HP</th>
                                            <th scope='col'><a href="{{ $sauna['url'] }}">{{ $sauna['url'] }}</a></th>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>



                    <!-- GoogleMap表示 -->
                    
                    <div class="container mt-5">
                        <div class="row">
                            <div id="map" style="height:500px">
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
                            <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyAEQZHbY42MBLz6cM8xyaaiwj7cTYhE6mI&callback=initMap" async defer>
                            </script>
                        </div>
                    </div>
             
            


                </div>
            </div>
        </div>


    </main>


@endsection