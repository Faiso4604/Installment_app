@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-4">
                    <div>
                        <strong>Created date: </strong>{{ $customer->created_at->format('d-M-Y') }}
                    </div>
                </div>
                <div class="col-4 text-center">
                    <div>
                        <strong>Customer ID: {{ $customer->id }}</strong>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <a href="{{ route('customerlist') }}" class="btn btn-success">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            {{-- Customer Details --}}
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
                            {{-- Product Details --}}
                            @foreach ($items as $item)
                                <div class="row">
                                    <div class="col-md-6 text-right">
                                        <div class="mb-2"><strong>Item Name: </strong>{{ $item->item_name }}
                                        </div>
                                        <div class="mb-2"><strong>Actual Price: </strong>{{ $item->item_price }}
                                        </div>
                                        <div class="mb-2"><strong>Down Payment:
                                            </strong>{{ $item->down_payment }}
                                        </div>
                                        <div class="mb-2"><strong>Remaining Balance:
                                            </strong>{{ $item->balance }}</div>
                                    </div>

                                    <div class="col-md-6 text-right">
                                        <div class="mb-2"><strong>Profit: </strong>{{ $item->profit }}
                                        </div>
                                        <div class="mb-2"><strong>Due: </strong>{{ $item->total_due_amount }}
                                        </div>
                                        <div class="mb-2"><strong>Per Month:
                                            </strong>{{ $item->per_month }}</div>
                                        <div class="mb-2"><strong>Total:
                                            </strong>{{ $item->total_amount }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row justify-content-end mx-3">
                            <div class="col-auto">
                                {{-- {{ $items->links('vendor.pagination.bootstrap-5') }} --}}
                                {{ $items->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
