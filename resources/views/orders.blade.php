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
            <div class="container">
                <div class="row my-5">
                    <div class="col-md-8 m-auto">
                        <div class="card shadow-lg">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">My Order</h4>
                            </div>
                            <div class="card-body">
                                <table id="table_cart" class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                        <th>Tracking Number </th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                    
                                    @foreach ($order as $item)
                                        <tr data-id="{{ $item->id }}">
                                            <td data-th="Product">
                                                <h4 class="nomargin">{{ $item->tracking_no }}</h4>
                                            </td>
                                            <td data-th="Total Price">${{ $item->total_price }}</td>
                                            <td data-th="Status">{{ $item->status == '0'? 'pending' : 'completed'}}</td>
                    
                                            <td class="actions" data-th="actions">
                                                <a href="{{ route('myOrder.show', $item->id) }}"><i
                                                        class="fa-solid fa-eye mr-3"style="color: #hbff00;font-size: 25px;"></i></a>
                                                <a href="{{ route('myOrder.destroy', $item->id) }}"><i class="fa-solid fa-trash"
                                                        style="color: #f40b0b;font-size: 25px; "></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7" class="text-right">
                                            <a href="{{ route('home') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Continue
                                                Shopping</a>
                                        </td>
                                    </tr>
                                </tfoot>
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
                                    <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i>
                                        Continue Shopping</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


@endsection
