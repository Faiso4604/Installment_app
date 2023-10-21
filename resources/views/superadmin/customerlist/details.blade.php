@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    <div><strong>Created date: </strong>{{ $customer->created_at->format('d-M-Y')}}</div>
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
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2><strong>Customer ID: {{ $customer->id }}</strong></h2>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                {{-- Customer data --}}


                                <div class="col-md-6 text-right">
                                    <div class="mb-2"><strong>Customer Name: </strong>{{ $customer->customer_name }}</div>
                                    <div class="mb-2"><strong>Customer Phone: </strong>{{ $customer->customer_phone }}
                                    </div>
                                    <div class="mb-2"><strong>Customer Address: </strong>{{ $customer->customer_address }}
                                    </div>
                                    <div class="mb-2"><strong>Customer Place of work:
                                        </strong>{{ $customer->customer_placeofwork }}</div>
                                </div>

                                {{-- Guarantor data --}}


                                <div class="col-md-6 text-right">
                                    <div class="mb-2"><strong>Guarantor Name: </strong>{{ $customer->guarantor_name }}
                                    </div>
                                    <div class="mb-2"><strong>Guarantor Phone: </strong>{{ $customer->guarantor_phone }}
                                    </div>
                                    <div class="mb-2"><strong>Guarantor Address:
                                        </strong>{{ $customer->guarantor_address }}</div>
                                    <div class="mb-2"><strong>Guarantor Place of work:
                                        </strong>{{ $customer->guarantor_placeofwork }}</div>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
