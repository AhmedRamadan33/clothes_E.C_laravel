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
    <table id="table_cart" class="table table-hover table-condensed">
        @if ($wishlist->count() > 0)
        <thead>
            <tr>
                <th style="width:25%">Product </th>
                <th style="width:10%">Description </th>
                <th style="width:10%">Price </th>
                <th style="width:15%">actions</th>

            </tr>
        </thead>
        <tbody>
      
                @foreach ($wishlist as $item)

                    <tr data-id="{{ $item->id}}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ asset('files/' . $item->product->image) }}"
                                        width="100" height="50" class="img-responsive" /></div>
                                <div class="col-sm-6">
                                    <h4 class="nomargin">{{ $item->product->name}}</h4>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p>{{ $item->product->description}}</p>
                        </td>
                        <td>
                            <p>{{ $item->product->discount_price}}</p>
                        </td>
            
                        <td class="actions" data-th="actions">
                            <a class="mr-3 " href="{{route('deleteWishlist',$item->id)}}"><i class="fa-solid fa-trash" style="color: #f40b0b;font-size: 25px; "></i></a>
                            <a href="{{route('prodShow',$item->prod_id)}}"><i class="fa-solid fa-cart-shopping" style="color: #00ff00;font-size: 25px; "></i></a>
                        </td>
                    </tr>
                @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="text-right">   
                    <a href="{{ route('home') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                </td>
            </tr>
        </tfoot> 
        @else
        <div class="container">
            <div class="row my-5">
                <div class="col-md-6 m-auto">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa-regular fa-star"></i> Your Wishlist is empty</h5>
                            <p class="card-text">
                                <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Continue Shopping</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        @endif
       
    </table>

@endsection
