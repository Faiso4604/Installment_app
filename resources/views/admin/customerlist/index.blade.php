@extends('admin.layouts.admin_main')
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
                            <a href="{{ route('admin.customer.create') }}" class="btn btn-success">
                                Add New
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @include('admin.partials.alerts')
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
                                                        <a href="{{ route('admin.customer.details', $customer) }}" class="btn btn-secondary">
                                                            <i data-feather="book"></i> Details
                                                        </a>
                                                        <a href="{{ route('admin.item.create', ['customer' => $customer->id]) }}" class="btn btn-primary">
                                                            <i data-feather="plus-circle"></i> Add Item
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
