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
                <h1 class="text-dark">Categories</h1>
                <div class="input-group">
                    <input type="search" placeholder="Search Data...">
                </div>
                <a href="{{ route('categories.create') }}" class="btn btn-secondary mx-1">Create New </a>

            </div>
            <div class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Name </th>
                            <th> Image </th>
                            <th> Section </th>
                            <th> Action </th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td><img src="{{ asset('files/' . $item->image) }}" alt=""></td>

                                @if ($item->parent_id == 0 || null)
                                    <td>Main Section</td>
                                @else
                                    @foreach ($Choosecategories as $Chooseitem)
                                        @if ($item->parent_id == $Chooseitem->id)
                                            <td>
                                                {{ $Chooseitem->name }}
                                            </td>
                                        @endif
                                    @endforeach
                                @endif

                                <td>
                                    <a href="{{ route('categories.delete', $item->id) }}"><i
                                            class="bi bi-trash"style="color: #f40b0b;font-size: 25px; "></i></a>
                                    <a href="{{ route('categories.edit', $item->id) }}"><i
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
