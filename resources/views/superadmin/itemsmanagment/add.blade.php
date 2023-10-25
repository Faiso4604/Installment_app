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

                                                <div class="mb-2">
                                                    <label for="">Plans</label>
                                                    <select class="form-select" id="plans-input" aria-label="Default select example">
                                                        <option selected>Select Plan</option>
                                                        <option value=".3" data-month="12">12 Months 30%</option>
                                                        <option value=".2" data-month="6">6 Months 20%</option>
                                                    </select>
                                                </div>

                                            </div>

                                            {{-- Calcutalor section --}}
                                            <div class="col-md-6">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>Actual Price</td>
                                                            <td id="actual-price"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Down Payment</td>
                                                            <td id="down-payment"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Balance</td>
                                                            <td id="balance"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Profit</td>
                                                            <td id="profit"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Due Amount</td>
                                                            <td id="total-due-amount"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Per Month</td>
                                                            <td id="per-month"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Total Amount</strong></td>
                                                            <td id="total-amount"></td>
                                                        </tr>
                                                    </tbody>
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
