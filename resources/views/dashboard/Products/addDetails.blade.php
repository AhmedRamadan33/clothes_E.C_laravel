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
        <h1 class="text-white bg-secondary p-2 rounded">Add Details To products </h1>
        <div class="card pt-3">
            <div class="card-body">
                <!-- Custom Styled Validation -->
                <form action="{{ route('products.storeDetails') }}" method="POST" enctype="multipart/form-data"
                    class="row g-3">
                    @csrf

                    <div class="col-md-4">
                        <label class="form-label">Product</label>
                        <select class="form-select" name="product_id">
                            <option selected disabled value="">Choose...</option>
                            @foreach ($product as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Size</label>
                        <input type="text" name="size" class="form-control">
                    </div>

                    <div class="col-md-5">
                        <label class="form-label">Colors</label>
                        <input type="text" name="color" class="form-control">

                    </div>
                    {{-- <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label">Image</label>
                            <input name="photo" class="form-control dropify" type="file" data-default-file="">
                        </div>
                    </div> --}}

                    <div class="col-12">
                        <button class="btn text-white btn-secondary" type="submit">Submit</button>
                    </div>
                </form><!-- End Custom Styled Validation -->

            </div>
        </div>

    </div>
@endsection
{{-- @push('javascripts')
    <script>
        $(".colors").select2({
            tags: true
        });
    </script>
@endpush --}}
