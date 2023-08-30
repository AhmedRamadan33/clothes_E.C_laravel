@extends('dashboard.layout.layout')
@section('content_admin')
    <div class="col-lg-6 m-auto pt-5">
        {{-- Start message Configration --}}
        @if (Session::has('done'))
            <div class="alert alert-success">
                {{ Session::get('done') }}
                @php
                    Session::forget('done');
                @endphp
            </div>
        @endif
        {{-- End message Configration --}}

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
        <h1 class="text-white bg-secondary p-2 rounded">Create New products </h1>
        <div class="card pt-3">
            <div class="card-body">
                <!-- Custom Styled Validation -->
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Categories</label>
                        <select class="form-select" name="parent_id">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">description</label>
                        <textarea type="text" name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label">Image</label>
                            <input name="photo" class="form-control dropify" type="file" data-default-file="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">price</label>
                        <input name="price" type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">price after discount</label>
                        <input name="discount_price" type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">quantity</label>
                        <input name="quantity" type="text" class="form-control">
                    </div>

                    <div class="col-12">
                        <button class="btn text-white btn-secondary" type="submit">Submit</button>
                    </div>
                </form><!-- End Custom Styled Validation -->

            </div>
        </div>

    </div>
@endsection
