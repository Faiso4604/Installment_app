@extends('superadmin.layouts.superadmin_main')
@section('title', 'Customer Details')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row mb-1">
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
                    <a href="{{ route('item.create', $customer) }}" class="btn btn-primary">Add new item</a>
                    <a href="{{ route('customerlist') }}" class="btn btn-success">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('superadmin.partials.alerts')
                            {{-- Customer Details --}}
                            <div class="row">
                                {{-- Customer data --}}
                                <div class="col-md-6 text-right">
                                    <div class="mb-2"><strong>Customer Name: </strong>{{ $customer->customer_name }}</div>
                                    <div class="mb-2"><strong>Customer Phone: </strong>{{ $customer->customer_phone }}
                                    </div>
                                    <div class="mb-2"><strong>Customer CNIC: </strong>{{ $customer->customer_cnic }}
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
                                    <div class="mb-2"><strong>Guarantor CNIC: </strong>{{ $customer->guarantor_cnic }}
                                    </div>
                                    <div class="mb-2"><strong>Guarantor Address:
                                        </strong>{{ $customer->guarantor_address }}</div>
                                    <div class="mb-2"><strong>Guarantor Place of work:
                                        </strong>{{ $customer->guarantor_placeofwork }}</div>
                                </div>
                            </div>

                            {{-- Product Details --}}
                            @foreach ($items as $item)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row border p-2">
                                            <div class="col-md-6">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Item Name: </th>
                                                            <td>{{ $item->item_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Actual Price: </th>
                                                            <td>{{ $item->item_price }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Down Payment: </th>
                                                            <td>{{ $item->down_payment }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Item Balance: </th>
                                                            <td>{{ $item->balance }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="col-md-6">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th>Profit: </th>
                                                            <td>{{ $item->profit }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Due: </th>
                                                            <td>{{ $item->total_due_amount }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Per Month: </th>
                                                            <td>{{ $item->per_month }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total:</th>
                                                            <td>{{ $item->total_amount }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 border p-2">
                                        <form class="form-group" action="{{ route('installment.create', $item) }}"
                                            method="POST">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-5 m-auto text-center mt-4">
                                                <x-form.label for="add_installment">Amount</x-form.label>
                                                    <input type="text" class="form-control text-center"
                                                        name="add_installment" id="add_installment"
                                                        placeholder="Enter the receiving amount" value="{{ old('add_installment') }}">
                                                        @error('add_installment')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-md-5 m-auto text-center mt-4">
                                                    <x-form.label for="">Remarks</x-form.label>
                                                    <select class="form-select" id="remark" name="remark"
                                                        aria-label="Disabled select example" value="{{ old('add_installment') }}">
                                                        <option selected disabled>Payment remark</option>
                                                            <option>Cash</option>
                                                            <option>Easypaisa</option>
                                                            <option>Bank Account</option>
                                                            <option>Other</option>
                                                    </select>
                                                    @error('remark')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row text mt-2">
                                                <div class="col-md-12 m-2 text-center">
                                                    <button type="submit" class="btn btn-primary">Add
                                                        installment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if (count($items) > 0)
                            <div class="mx-3">
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Installment</th>
                                            <th scope="col">Remaining</th>
                                            <th scope="col">Remarks</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($item->installments as $installment)
                                            <tr>
                                                <td>{{ $installment->created_at->format('d-M-Y - h:i A') }}</td>
                                                <th>{{ $installment->add_installment }}</th>
                                                <td>{{ $installment->total_remaining_amount }}</td>
                                                <th>{{ $installment->remark }}</th>
                                                <td>
                                                    <a href="" class="btn btn-primary btn-sm">
                                                        <i data-feather="printer"></i> Print
                                                    </a>
                                                    @if ($loop->last)
                                                        <a href="{{ route('installment.destroy', $installment) }}"
                                                            class="btn btn-danger btn-sm">
                                                            <i data-feather="trash-2"></i> Delete
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br><br>
                        @else
                            <div class="alert alert-info m-4 text-center">No record found</div>
                        @endif

                        <div class="row justify-content-end mx-3">
                            <div class="col-auto">
                                {{ $items->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
