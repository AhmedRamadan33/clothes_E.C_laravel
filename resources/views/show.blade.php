@extends('layouts.HomeApp')

@section('content')
    <section class="contact mb-5">
        <div class="contact_info text-center mb-5">
            <h2>Show </h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Show</a></li>
                </ol>
            </nav>
        </div>
        {{-- Start message Configration --}}
        @if (Session::has('done'))
            <div class="alert alert-danger text-center">
                {{ Session::get('done') }}
                @php
                    Session::forget('done');
                @endphp
            </div>
        @endif
        {{-- End message Configration --}}
        <div class="container trending">
            <div class="card product_data border-0">
                <div class="card-body shadow-lg rounded">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-fluid rounded w-50" src="{{ asset('files/' . $show->image) }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <h3>{{ $show->name }}</h3>
                            <p>{{ $show->description }}</p>
                            <span>{{ $show->discount_price }}<span>{{ $show->price }}</span></span>

                            <form action="{{ route('addToCart', $show->id) }}" method="POST" class="row mt-5">
                                @csrf
                                <div class="col-md-2">
                                    {{-- <input type="hidden" value="{{ $show->id }}" class="prod_id"> --}}
                                    <label class="form-label">Quantity</label>
                                    <input type="number" name="prod_qty" class="form-control qty_input" min="1" value="1">
                                </div>
                                <div class="col-md-12 mt-5">
                                    <button class="btn btn-primary addToCartBtn">Add to Cart</button>
                                    <a href="{{route('addToWishlist', $show->id )}}" class="btn btn-success">Add to Wishlist</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
