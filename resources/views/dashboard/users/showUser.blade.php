@extends('dashboard.layout.layout')
@section('content_admin')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            User Details
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <label for="name">Name</label>
                                <div class="p-2 border">{{ $users->name }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="email">Email</label>
                                <div class="p-2 border">{{ $users->email }}</div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="phone">Phone</label>
                                <div class="p-2 border">{{ $users->phone }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="phone">Address</label>
                                <div class="p-2 border">{{ $users->address }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="phone">City</label>
                                <div class="p-2 border">{{ $users->city }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="phone">Country</label>
                                <div class="p-2 border">{{ $users->country }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="phone">Zip</label>
                                <div class="p-2 border">{{ $users->zip }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
