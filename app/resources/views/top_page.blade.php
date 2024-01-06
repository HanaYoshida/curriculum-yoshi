@extends('layouts.layout')
@section('content')


<main>
    <div id="profile-edit-form" class="container mt-3">
        <div class="row">
            <div class="col-8 offset-2 bg-white">
                <header>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="/image/sauna7.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="/image/sauna4.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                        <img src="/image/sauna5.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                    </div>
                </header>
            </div>
        </div> 
    </div>

    

    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-6">
            <form method="get">
            @csrf
                <div class="input-group"> 
                    <input type="search" class="form-control" name="search" value="{{ $search }}" placeholder="キーワードを入力...">
                    <button type="submit" class='btn btn-outline-dark'>検索</button>
                </div>
            </form>
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
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
        <div class="row row-cols-1 row-cols-md-3">
            {{ $saunas->links() }}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</main>

@endsection