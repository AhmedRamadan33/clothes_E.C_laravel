@extends('dashboard.layout.layout')

@section('content_admin')
    <div class="page-body mt-5">


        <!-- Container starts-->
        <div class="container">
            <div class="row product-adding">
                <div class="col-xl-7 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h5>Settings</h5>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (Session::has('done'))
                                <div class="alert alert-success">
                                    {{ Session::get('done') }}
                                    @php
                                        Session::forget('done');
                                    @endphp
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="digital-add needs-validation">
                                <form action="{{ route('settings.update', $settings->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="validationCustom05" class="col-form-label ">
                                            * Logo</label>
                                        <input class="form-control dropify" id="validationCustom05" type="file" name="logo" data-default-file="{{ asset('files/' . $settings->logo) }}">

                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">* favicon </label>
                                        <input class="form-control dropify" id="validationCustom05" type="file" name="favicon" data-default-file="{{ asset('files/' . $settings->favicon) }}">
                                    </div>



                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label "><span>*</span>
                                            Web site name</label>
                                        <input class="form-control" id="validationCustom01" type="text"
                                            name="name"value="{{ $settings->name }}">
                                    </div>


                                    <div class="form-group">
                                        <label class="col-form-label">* Site description </label>
                                        <textarea rows="5" cols="72" name="description">{{ $settings->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="validationCustom02" class="col-form-label"><span>*</span>
                                            Email </label>
                                        <input class="form-control" id="validationCustom02" type="text" name="email"
                                            value="{{ $settings->email }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label "> * Phone</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="phone"
                                            value="{{ $settings->phone }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label ">* Address</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="address"
                                            value="{{ $settings->address }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label ">* Facebook Link</label>
                                        <input class="form-control" id="validationCustomtitle" type="text"
                                            name="facebook" value="{{ $settings->facebook }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label ">* Twitter Link</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="twitter"
                                            value="{{ $settings->twitter }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label ">* Instagram Link</label>
                                        <input class="form-control" id="validationCustomtitle" type="text"
                                            name="instagram" value="{{ $settings->instagram }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label ">* Youtube Link</label>
                                        <input class="form-control" id="validationCustomtitle" type="text" name="youtube"
                                            value="{{ $settings->youtube }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="validationCustomtitle" class="col-form-label "> * Tiktok Link</label>
                                        <input class="form-control" id="validationCustomtitle" type="text"
                                            name="tiktok" value="{{ $settings->tiktok }}">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary mt-2" type="submit">Save</button>
                                    </div>


                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
