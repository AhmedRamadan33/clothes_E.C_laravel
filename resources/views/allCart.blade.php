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
        @if ($cart->count() > 0)
        <thead>
            <tr>
                <th style="width:50%">Product </th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%">actions</th>
            </tr>
        </thead>
        <tbody>
      
            @php $total = 0 @endphp
                @foreach ($cart as $item)
                    @php $total += $item->product->discount_price * $item->prod_qty @endphp

                    <tr data-id="{{ $item->id}}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ asset('files/' . $item->product->image) }}"
                                        width="100" height="100" class="img-responsive" /></div>
                                <div class="col-sm-6">
                                    <h4 class="nomargin">{{ $item->product->name}}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $item->product->discount_price}}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{$item->prod_qty}}"
                                class="form-control quantity cart_update" min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $item->product->discount_price * $item->prod_qty }}
                        </td>
                        <td class="actions" data-th="actions">
                            <a href="{{route('editCart',$item->id)}}"><i class="fa-solid fa-pen-to-square mr-3"style="color: #fbff00;font-size: 25px;"></i></a>
                            <a href="{{route('deleteCart',$item->id)}}"><i class="fa-solid fa-trash" style="color: #f40b0b;font-size: 25px; "></i></a>
                        </td>
                    </tr>
                @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7" class="text-right">
                    <h3><strong>Total : ${{ $total }}</strong></h3>
                </td>
            </tr>
            <tr>
                <td colspan="7" class="text-right">
                    <a href="{{ route('home') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue
                        Shopping</a>
                        <a href="{{route('checkout.index')}}" class="btn btn-success"><i class="fa fa-money"></i> Checkout</a>
                </td>
            </tr>
        </tfoot> 
        @else
        <div class="container">
            <div class="row my-5">
                <div class="col-md-6 m-auto">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa-solid fa-cart-shopping"></i> Your Cart is empty</h5>
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
