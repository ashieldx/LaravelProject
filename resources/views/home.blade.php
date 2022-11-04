@extends('main')

@section('title', 'Home')

@section('content')
<!-- carousel -->
<div style="margin-top:-40px">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class= "carousel-inner">
        <div class= "carousel-item active">
            <img src="{{ url('/assets/slider1.png') }}" class="w-100 d-block">
            <div class="carousel-caption d-none d-md-block" style ="top:20%">
                <h3>Baktify</h3>
                <h5>Level Up Your Music Collection</h5>
                <p>One-stop store for all of your musical enthusiasm needs</p>
                <a href = "{{ url('/products') }}" class= "btn btn-dark">Our products</a>
                @auth
                <button disabled href = "{{ url('/register') }}" class= "btn btn-dark">Join us</button>
                @else
                <a href = "{{ url('/register') }}" class= "btn btn-dark">Join us</a>
                @endauth
            </div>
        </div>
    <div class="carousel-item">
        <img src="{{ url('/assets/slider2.jpg') }}" class="d-block w-100">
        <div class="carousel-caption d-none d-md-block text-start" style ="top:30%">
                <h3>Quality, Integrity, Low-Price</h3>
                <p>Baktify offers top quality products with low price
                    <br>and trustworthy user integrity
                </p>
                <a href = "#readmore" class= "btn btn-dark">Learn more</a>
        </div>
    </div>
    <div class="carousel-item">
        <img src="{{ url('/assets/slider3.jpg') }}" class="d-block w-100 h-80">
        <div class="carousel-caption d-none d-md-block">
            <h4>We provide wide variety of music genre and album</h4>
            <a href = "{{ url('/products') }}" class= "btn btn-dark">Check it out</a>
        </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<br>
<br>
<br>

<!-- products -->
<div class="container">
    <h2 class = "text-center">Our Products</h2>
    <br>
    <div class="row row-cols-md-3">
        @foreach($product as $product)
        <div class="col">
            <div class="card text-center h-100">
                <img src="{{ asset('storage/images/' . $product->image )}}" class="card-img" width = "200px" height = "300px">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <a class ="btn btn-primary">{{ $product->category->category }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    <a href = "{{url('/products') }}" class = "btn btn-secondary float-end">View More &raquo</a>
</div>

<br><br>
<!-- standards -->
<div id="readmore"class="container">
    <hr>
    <br><br>
    <h2 class = "text-center">Our Standards</h2>
    <br>
    <div class="row">
        <div class="col-lg-4">
            <div class="text-center">
                <img style = "text-align:center;"class="rounded-circle center position-relative" width="150" height="150" src = "{{ url('/assets/quality.jpg') }}"/></img>
                <h4 class="fw-normal">Quality</h4>
                <p>Baktify offers the best quality of albums <br>with all available formats.</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="text-center">
                <img style = "text-align:center;"class="rounded-circle center position-relative" width="200" height="200" src = "{{ url('/assets/integrity.png') }}"/></img>
                <p>We provide user integrity, user data <br> and integrity is 100% safe.</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="text-center">
                <img style = "text-align:center;"class="rounded-circle center position-relative" width="150" height="150" src = "{{ url('/assets/cheap.png') }}"/></img>
                <h4  class="fw-normal">Low-Price</h4>
                <p>Cheapest album products across all<br> available music platforms.</p>
            </div>
        </div>
    </div>
</div>

<br><br>

<!-- features -->
<div class="container">
    <hr>
    <br>
    <div class="row align-middle">
        <div class="col align-middle text-center">
            <img class="align-middle rounded-4" width="200" height="200" src = "{{ url('/assets/lock.png') }}"></img>
            <br><br>
            <h2 class="fw-normal">New Finance Option</h2>
            <p style="font-size:18px; color:gray">We are proud to offer fast and proffesional delivery services
                with all major payment methods <br>available through our online shop.  Additionally, if
                you require some flexibility regarding <br> payment, we provide finance options
                so you can pay in instalments
            </p>

            <br><br>

            <img class="align-middle rounded-4" width="200" height="200" src = "{{ url('/assets/deliver.png') }}"></img>
            <br><br>
            <h2 class="fw-normal">Bulk Ordering Makes it Possible</h2>
            <p style="font-size:18px; color:gray">Through the large purchasing volumes, DV and
                Music Store are able to source containers directly from <br>manufacturers
                worldwide allowing us to offer a large range of products at sensationally
                low prices.
            </p>
        </div>
    </div>
</div>


@endsection