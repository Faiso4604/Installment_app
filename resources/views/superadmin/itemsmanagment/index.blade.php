@extends('superadmin.layouts.superadmin_main')
@section('title', 'Plans')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="text-center">All Items List</h1>
            <div class="row">
                    <div class="card">
                        <div class="card-body">
                            @include('superadmin.partials.alerts')
                            @if (count($items) > 0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Item Name</th>
                                            <th>Customer Name</th>
                                            <th>Customer Number</th>
                                            <th>Item Price</th>
                                            <th>Purchasing Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->item_name }}</td>
                                                <td>{{ $item->customers->customer_name }}</td>
                                                <td>{{ $item->customers->customer_phone }}</td>
                                                <td>{{ $item->item_price }}</td>
                                               <td>{{ $item->created_at->format('d-M-Y - h:i A') }}</td>

                                                <td>
                                                    <div class="mt-2 mb-2">
                                                        <a href="{{ route('item.edit', $item) }}" class="btn btn-primary">Edit</a>
                                                        <a href="{{ route('item.destroy', $item) }}" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                             @else
                                <div class="alert alert-info">No record found</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

