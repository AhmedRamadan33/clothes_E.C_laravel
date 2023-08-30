@extends('layouts.HomeApp')

@section('content')
    @if ($cart->count() > 0)

        <section class="contact">
            <div class="contact_info text-center mb-5">
                <h2>Checkout</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ViewCart') }}">Cart</a></li>
                        <li class="breadcrumb-item"><a href="#">Checkout</a></li>
                    </ol>
                </nav>
            </div>

            <div class="container mb-5">
                {{-- Start message validation --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- End message validation --}}
                <form action="{{ route('placeOrder') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Billing Details</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control name" value="{{ Auth::user()->name }}"
                                                id="name" name="name" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control email" value="{{ Auth::user()->email }}"
                                                id="email" name="email" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}"
                                                id="phone" name="phone" placeholder="Enter Phone">
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email
                                                with
                                                anyone else.</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="zip">Zip</label>
                                            <input type="text" class="form-control zip" value="{{ Auth::user()->zip }}"
                                                id="zip" name="zip" placeholder="Enter Zip">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control city" value="{{ Auth::user()->city }}"
                                                id="city" name="city" placeholder="Enter City">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control country" value="{{ Auth::user()->country }}"
                                                id="country" name="country" placeholder="Enter Country">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control address" value="{{ Auth::user()->address }}"
                                                id="address" name="address" placeholder="Enter Address">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="card">
                                <div class="card-header">
                                    <h3>order Details</h3>
                                </div>
                                <div class="card-body">
                                    <table id="table_cart" class="table table-hover table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Product </th>
                                                <th>Quantity</th>
                                                <th class="text-center">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @php $total = 0 @endphp
                                            @foreach ($cart as $item)
                                                @php $total += $item->product->discount_price * $item->prod_qty @endphp

                                                <tr data-id="{{ $item->id }}">
                                                    <td data-th="Product">
                                                        <h4 class="nomargin">{{ $item->product->name }}</h4>
                                                    </td>
                                                    <td data-th="Quantity">
                                                        <h4 class="nomargin">{{ $item->prod_qty }}</h4>
                                                    </td>
                                                    <td data-th="Subtotal" class="text-center">
                                                        ${{ $item->product->discount_price * $item->prod_qty }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3" class="text-left">
                                                    <h3><strong>Total : ${{ $total }}</strong></h3>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <input type="hidden" name="payment_mode" value="COD">

                                                    <button type="submit" class="btn btn-primary mr-2">Place Order | COD</button>
                                                    <button hidden type="button" class="btn btn-danger razorpay_btn">Pay With Razorpay</button>
                                                </td>
                                            </tr>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                </form>
            @else
                <div class="container">
                    <div class="row my-5">
                        <div class="col-md-6 m-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <h5 class="card-title"><i class="fa-solid fa-cart-shopping"></i> Your Cart is empty
                                    </h5>
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
    </div>
    </div>

    </section>
@endsection

@section('scripts')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection
