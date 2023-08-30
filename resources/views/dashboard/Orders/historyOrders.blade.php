@extends('dashboard.layout.layout')
@section('content_admin')
    <section class="body_EC">
        <div class="table_EC mt-5">
            <div class="table__header">
                <h1 class="text-dark">History Orders</h1>
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
                    <a class="btn btn-outline-primary" href="{{route('order.index')}}">Orders</a>
            </div>
            <div class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Name </th>
                            <th> Order Date </th>
                            <th> Tracking Number </th>
                            <th> Total Price </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->tracking_no }}</td>
                                <td>{{ $item->total_price }}</td>
                                <td>{{ $item->status == '0' ? 'pending' : 'completed' }}</td>
                                <td>
                                    <a href="{{ route('order.show', $item->id) }}"><i
                                            class="bi bi-eye"style="color: #086683;font-size: 25px;"></i></a>
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
