@extends('dashboard.layout.layout')
@section('content_admin')
    <section class="body_EC">
        <div class="table_EC mt-5">
            <div class="table__header">
                <h1 class="text-dark">Registered Users</h1>
            </div>
            <div class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Phone </th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    <a href="{{ route('showUser', $item->id) }}"><i
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
