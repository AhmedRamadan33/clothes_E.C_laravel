@extends('layouts.HomeApp')

@section('content')
    <section class="contact mb-5">
        <div class="contact_info text-center mb-5">
            <h2>Edit Item Cart : {{$editCart->id}}</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('ViewCart') }}">Carts</a></li>
                    <li class="breadcrumb-item"><a href="#">Edit</a></li>
                </ol>
            </nav>
        </div>

        <div class="container trending">
            <div class="card product_data border-0">
                <div class="card-body shadow-lg rounded">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="img-fluid rounded w-50" src="{{ asset('files/' . $editCart->product->image) }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <h3>{{ $editCart->product->name }}</h3>
                            <p>{{ $editCart->product->description }}</p>
                            <span>{{ $editCart->product->discount_price }}<span>{{ $editCart->product->price }}</span></span>

                            <form action="{{ route('updateCart', $editCart->id) }}" method="POST" class="row mt-5">
                                @csrf
                                <div class="col-md-2">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" name="prod_qty" class="form-control qty_input" min="1" value="{{$editCart->prod_qty}}">
                                </div>
                                <div class="col-md-12 mt-5">
                                    <button class="btn btn-primary addToCartBtn">Update</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
