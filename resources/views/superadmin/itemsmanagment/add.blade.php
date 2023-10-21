@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Add item</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('customerlist')}}" class="btn btn-success">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12  m-auto">
                                    <div class="row">

                                        {{-- Item Details --}}
                                        <h2 class="text-center"></h2>

                                        <table class="table table-striped text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Place of work</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Rizwan</td>
                                                    <td>03126854604</td>
                                                    <td>Studnent at ACI</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <x-form.label for="product_name">Product name</x-form.label>
                                                <x-form.input type="text" id="product_name" name="product_name"
                                                    placeholder="Enter product name!" :value="old('product_name')"></x-form.input>
                                                @error('product_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <x-form.label for="customer_phone">Customer Phone</x-form.label>
                                                <x-form.input type="text" id="customer_phone" name="customer_phone"
                                                    placeholder="Enter customer phone!" :value="old('customer_phone')"></x-form.input>
                                                @error('customer_phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <input type="submit" class="btn btn-primary" value="Save">
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
