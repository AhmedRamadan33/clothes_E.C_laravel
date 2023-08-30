@extends('dashboard.layout.layout')
@section('content_admin')
    <div class="col-lg-6 m-auto pt-5">

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
        <h1 class="text-white bg-warning p-2 rounded">Edit products : {{ $products->id }}</h1>

        <div class="card pt-3">
            <div class="card-body">
                <!-- Custom Styled Validation -->
                <form action="{{ route('products.update', $products->id) }}" method="POST" enctype="multipart/form-data"
                    class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input value="{{ $products->pName }}" name="name" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Categories</label>
                        <select class="form-select" name="parent_id">
                            <option selected value="{{ $products->category_id }}">
                                {{ $products->cName }}</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">description</label>
                        <textarea type="text" name="description" class="form-control" rows="3">{{$products->description}}</textarea>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label">Image</label>
                            <input name="photo" class="form-control dropify" type="file"
                                data-default-file="{{ asset('files/' . $products->image) }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">price</label>
                        <input value="{{ $products->price }}" name="price" type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">price after discount</label>
                        <input value="{{ $products->discount_price }}" name="discount_price" type="text"
                            class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">quantity</label>
                        <input value="{{ $products->quantity }}" name="quantity" type="text" class="form-control">
                    </div>

                    
                    <div class="col-12">
                        <button class="btn text-white btn-warning" type="submit">Submit</button>
                    </div>
                </form><!-- End Custom Styled Validation -->

            </div>
        </div>
    </div>

@endsection
