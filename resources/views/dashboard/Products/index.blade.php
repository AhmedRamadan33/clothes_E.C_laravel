@extends('dashboard.layout.layout')
@section('content_admin')
    <section class="body_EC">
        <div class="table_EC mt-5">
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
            <div class="table__header">
                <h1 class="text-dark">Products</h1>
                <div class="input-group">
                    <input type="search" placeholder="Search Data...">
                </div>
                <a href="{{ route('products.create') }}" class="btn btn-secondary mx-1">Create New </a>

            </div>
            <div class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Name </th>
                            <th> Image </th>
                            <th> categories </th>
                            <th> Old_Price </th>
                            <th> New_price </th>
                            <th> quantity </th>
                            <th> Action </th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->pName }}</td>
                                <td><img src="{{ asset('files/' . $item->image) }}" alt=""></td>
                                <td>{{ $item->cName }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->discount_price }}</td>
                                <td>{{ $item->quantity }}</td>

                                <td>
                                    <a href="{{ route('products.show', $item->id) }}"><i
                                            class="bi bi-eye"style="color: #086683;font-size: 25px;"></i></a>
                                    <a href="{{ route('products.edit', $item->id) }}"><i
                                            class="bi bi-pencil-square"style="color: #fbff00;font-size: 25px;"></i></a>
                                    <a href="{{ route('products.delete', $item->id) }}"><i
                                            class="bi bi-trash"style="color: #f40b0b;font-size: 25px; "></i></a>
                                </td>
                            </tr>
                        @empty
                            <h1 class="text-center text-warning pt-2">No Have Data Yet</h1>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
