@extends('layouts.HomeApp')

@section('content')
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
    @if ($order->count() > 0)
        <div class="contact container">
            <div class="row my-5">
                <div class="col-md-12 m-auto">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('myOrder') }}">My Orders</a></li>
                                    <li class="breadcrumb-item"><a href="#">My Order Details</a></li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card-body">
                            <table id="table_cart" class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th style="width:50%">Product </th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($order as $item)
                                        <tr data-id="">
                                            <td data-th="Id">{{ $item->id }}</td>
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-sm-3 hidden-xs"><img src="{{ asset('files/' . $item->product->image) }}"
                                                            width="100" height="80" class="img-responsive" /></div>
                                                    <div class="col-sm-6">
                                                        <h4 class="nomargin">{{ $item->product->name}}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Qty">{{ $item->prod_qty }}</td>
                                            <td data-th="Total Price">${{ $item->price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                            @else
                                <div class="container">
                                    <div class="row my-5">
                                        <div class="col-md-6 m-auto">
                                            <div class="card shadow-lg">
                                                <div class="card-body">
                                                    <h5 class="card-title">No Have Orders Yet</h5>
                                                    <p class="card-text">
                                                        <a href="{{ route('home') }}" class="btn btn-primary"><i
                                                                class="fa fa-arrow-left"></i> Continue Shopping</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    @endif


@endsection
