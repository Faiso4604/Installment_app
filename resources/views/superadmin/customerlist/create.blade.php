@extends('superadmin.layouts.superadmin_main')
@section('title', 'Add Customer')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Add Customer</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('customerlist') }}" class="btn btn-success">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('superadmin.partials.alerts')
                            <form action="{{ route('customer.create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12  m-auto">
                                    <div class="row">

                                        {{-- Customer Data --}}
                                        <div class="card col-md-6">
                                            <div class="mb-3">
                                                <h2 class="text-center"><u>Customer Data</u></h2>
                                                <x-form.label for="customer_name">Customer Name</x-form.label>
                                                <x-form.input type="text" id="customer_name" name="customer_name"
                                                    placeholder="Enter customer name!" :value="old('customer_name')"></x-form.input>
                                                @error('customer_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <x-form.label for="customer_phone">Customer Phone</x-form.label>
                                                <x-form.input type="text" id="customer_phone" name="customer_phone" maxlength="11"
                                                    placeholder="Enter customer phone!" :value="old('customer_phone')"></x-form.input>
                                                @error('customer_phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <x-form.label for="customer_address">Customer address</x-form.label>
                                                <x-form.input type="text" id="customer_address" name="customer_address"
                                                    placeholder="Enter customer address!" :value="old('customer_address')"></x-form.input>
                                                @error('customer_address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <x-form.label for="customer_placeofwork">Customer place of
                                                    work</x-form.label>
                                                <x-form.input type="text" id="customer_placeofwork"
                                                    name="customer_placeofwork" placeholder="Enter customer place of work!"
                                                    :value="old('customer_address')"></x-form.input>
                                                @error('customer_placeofwork')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Guarantor Data --}}
                                        <div class="card col-md-6">
                                            <div class="mb-3">
                                                <h2 class="text-center"><u>Guarantor Data</u></h2>
                                                <x-form.label for="guarantor_name">Guarantor Name</x-form.label>
                                                <x-form.input type="text" id="guarantor_name" name="guarantor_name"
                                                    placeholder="Enter guarantor name!" :value="old('guarantor_name')"></x-form.input>
                                                @error('guarantor_name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <x-form.label for="guarantor_phone">Guarantor Phone</x-form.label>
                                                <x-form.input type="text" id="guarantor_phone" name="guarantor_phone" maxlength="11"
                                                    placeholder="Enter guarantor phone!" :value="old('guarantor_phone')"></x-form.input>
                                                @error('guarantor_phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <x-form.label for="guarantor_address">Guarantor address</x-form.label>
                                                <x-form.input type="text" id="guarantor_address" name="guarantor_address"
                                                    placeholder="Enter guarantor address!" :value="old('guarantor_address')"></x-form.input>
                                                @error('guarantor_address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <x-form.label for="guarantor_placeofwork">Guarantor place of
                                                    work</x-form.label>
                                                <x-form.input type="text" id="guarantor_placeofwork"
                                                    name="guarantor_placeofwork"
                                                    placeholder="Enter guarantor place of work!"
                                                    :value="old('guarantor_address')"></x-form.input>
                                                @error('guarantor_placeofwork')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
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
