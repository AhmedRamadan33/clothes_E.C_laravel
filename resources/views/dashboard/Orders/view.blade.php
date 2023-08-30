@extends('dashboard.layout.layout')
@section('content_admin')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>User Details</h3>
                    </div>
                    {{-- @foreach ($orders as $item) --}}
                    <div class="card-body mt-2">
                        <div class="row">
                            <div class="form-group ">
                                <h5>Name : <span class="text-secondary">{{ $orders->order->user->name }}</span></h5>
                            </div>
                            <div class="form-group ">
                                <h5>Email : <span class="text-secondary">{{ $orders->order->user->email }}</span></h5>
                            </div>
                            <div class="form-group ">
                                <h5>Phone : <span class="text-secondary">{{ $orders->order->user->phone }}</span></h5>
                            </div>
                            <div class="form-group ">
                                <h5>Address : <span class="text-secondary">{{ $orders->order->user->address }}</span></h5>
                            </div>
                            <div class="form-group ">
                                <h5>City : <span class="text-secondary">{{ $orders->order->user->city }}</span></h5>
                            </div>
                            <div class="form-group ">
                                <h5>Country : <span class="text-secondary">{{ $orders->order->user->country }}</span></h5>
                            </div>
                            <div class="form-group ">
                                <h5>Zip : <span class="text-secondary">{{ $orders->order->user->zip }}</span></h5>
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>order Details</h3>
                    </div>
                    <div class="card-body ">
                        <table id="" class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:50%">Product </th>
                                    <th>Quantity</th>
                                    <th class="text-center">Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($orderDetails as $item)
                                    <tr data-id="{{ $item->id }}">
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-2 hidden-xs"><img
                                                        src="{{ asset('files/' . $item->product->image) }}" width="50"
                                                        height="50" class="img-responsive" />
                                                </div>
                                                <div class="col-sm-10">
                                                    <h4 class="nomargin">{{ $item->product->name }}</h4>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Quantity">
                                            <h4 class="nomargin">{{ $item->prod_qty }}</h4>
                                        </td>
                                        <td data-th="Price" class="text-center">
                                            ${{ $item->price }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-left">
                                        <h3><strong>Total : ${{ $item->order->total_price }}</strong></h3>
                                    </td>

                                </tr>
                                <tr>

                                    <td colspan="3" class="text-left ">
                                        <h5 class="mt-4 text-secondary">Order Status</h5>
                                       <form action="{{route('order.update',$item->order->id)}}" method="POST">
                                        @csrf
                                        <select name="order_status" class="form-select">
                                            <option {{$item->order->status == 0 ? 'selected' :''}} value="0">Pending</option>
                                            <option {{$item->order->status == 1 ? 'selected' :''}} value="1">Completed</option>
                                        </select>
                                        <button class="btn btn-primary mt-2">Update Status</button>
                                       </form>
                                    </td>

                                </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    @endsection
