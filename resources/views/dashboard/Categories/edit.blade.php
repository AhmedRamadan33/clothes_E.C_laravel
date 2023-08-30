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
        <h1 class="text-white bg-warning p-2 rounded">Edit Category id : {{$categories->id }}</h1>
        <div class="card pt-3">
            <div class="card-body">
                <!-- Custom Styled Validation -->
                <form action="{{route('categories.update',$categories->id)}}" method="POST" enctype="multipart/form-data" class="row g-3" >
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input value="{{$categories->name }}" name="name" type="text" class="form-control">
    
                    </div>
                    @if ($categoryCount->child_count <1 )
                    <div class="col-md-6">
                        <label class="form-label">Section</label>
                        <select name="parent_id" class="form-select" >
                            <option value="" @if ($categories->parent_id == null) selected @endif >Main Section</option>
                            @foreach ($Choosecategories as $Chooseitem)
                            <option value="{{ $Chooseitem->id }}" @if ($categories->parent_id == $Chooseitem->id) selected @endif>{{ $Chooseitem->name }}</option>
                        @endforeach

                        </select>
                    </div> 
                    @endif

                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label">Image</label>
                            <input name="photo" class="form-control dropify" type="file" data-default-file="{{asset('files/' .$categories->image )}}">
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn text-white btn-warning" type="submit">Update</button>
                    </div>
                </form><!-- End Custom Styled Validation -->

            </div>
        </div>

    </div>
@endsection
