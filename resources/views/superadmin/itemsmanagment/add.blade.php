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
                    <a href="{{ route('customerlist') }}" class="btn btn-success">Back</a>
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
                                                    <td>{{ $customer->customer_name }}</td>
                                                    <td>{{ $customer->customer_phone }}</td>
                                                    <td>{{ $customer->customer_address }}</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="row">
                                            {{-- Product Details Section --}}
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <x-form.label for="product_name">Product name</x-form.label>
                                                    <x-form.input type="text" id="product_name" name="product_name"
                                                        placeholder="Enter product name!" :value="old('product_name')"></x-form.input>
                                                    @error('product_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <x-form.label for="product_price">Product Price</x-form.label>
                                                    <x-form.input type="text" id="product_price" name="product_price"
                                                        placeholder="Enter product price!" :value="old('product_price')"></x-form.input>
                                                    @error('product_price')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <x-form.label for="down_payment">Down Payment</x-form.label>
                                                    <x-form.input type="text" id="down_payment" name="down_payment"
                                                        placeholder="Enter down payment/advance"
                                                        :value="old('down_payment')"></x-form.input>
                                                    @error('down_payment')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <x-form.label for="interest_rate">Interest</x-form.label>
                                                    <x-form.input type="text" id="interest_rate" name="interest_rate"
                                                        placeholder="Enter down payment/advance"
                                                        :value="old('interest_rate')"></x-form.input>
                                                    @error('interest_rate')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>

                                            {{-- Calcutalor section --}}
                                            <div class="col-md-6 text-center">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>Actual Price</th>
                                                        <td>10000</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Down Payment</th>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Per Month</th>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Remaining</th>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total</th>
                                                        <td>2000</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Profit</th>
                                                        <td>2000</td>
                                                    </tr>
                                                </table>
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
