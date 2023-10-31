@extends('superadmin.layouts.superadmin_main')
@section('title', 'Customers')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <h2>Customers</h2>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('customer.create') }}" class="btn btn-success">
                                Add New
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @include('superadmin.partials.alerts')
                            @if (count($customers) > 0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Place of work</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{ $customer->id }}</td>
                                                <td>{{ $customer->customer_name }}</td>
                                                <td>{{ $customer->customer_phone }}</td>
                                                <td>{{ $customer->customer_placeofwork }}</td>
                                                <td class="text-center p-0 m-0">

                                                    <div class="mt-2 mb-2">
                                                        <a href="{{ route('customer.details', $customer) }}" class="btn btn-secondary">
                                                            <i data-feather="book"></i> Details
                                                        </a>
                                                        <a href="{{ route('item.create', ['customer' => $customer->id]) }}" class="btn btn-primary">
                                                            <i data-feather="plus-circle"></i> Add Item
                                                        </a>
                                                    </div>
                                                    <div class="mt-2 mb-2">
                                                        <a href="{{ route('customer.edit', $customer) }}" class="btn btn-primary btn-sm">
                                                            <i data-feather="edit"></i> Edit
                                                        </a>
                                                        <a href="{{ route('customer.destroy', $customer) }}" class="btn btn-danger btn-sm">
                                                            <i data-feather="trash-2"></i> Delete
                                                        </a>
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
