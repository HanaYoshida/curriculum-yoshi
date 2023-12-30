@extends('layouts.layout')
@section('content')

    <main>
        <div id="profile-edit-form" class="container mt-5">
            <div class="row">
                <div class="col-8 offset-2 bg-white">
                    <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">お気に入りサウナ</div>
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
                                <a href="{{ route('saunapage', ['sauna' => $sauna->id]) }}" style="text-decoration: none;">
                                    <h5 class="card-title">{{ $sauna->saunaname }}</h5>
                                </a>
                                <p class="card-text">{{ $sauna->address }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $saunas->links() }}   
            </div>
        </div>






                


    </main>

@endsection