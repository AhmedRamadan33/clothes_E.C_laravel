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
                <h1 class="text-dark">Show Products Details </h1>

            </div>
            <div class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Size </th>
                            <th> Color </th>
                            {{-- <th> Image </th> --}}
                            <th> Action </th>

                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($productDetails as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->size }}</td>
                                    <td>{{ $item->color }}</td>
                                    {{-- <td><img src="{{ asset('files/' . $item->image) }}" alt=""></td> --}}

                                    <td>
                                        <a href="{{ route('products.show.delete', $item->id) }}"><i
                                                class="bi bi-trash"style="color: #f40b0b;font-size: 25px; "></i></a>
                                        <a href="{{ route('products.show.edit', $item->id) }}"><i
                                                class="bi bi-pencil-square"style="color: #086683;font-size: 25px;"></i></a>
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
