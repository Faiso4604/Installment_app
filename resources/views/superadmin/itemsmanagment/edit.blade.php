@extends('superadmin.layouts.superadmin_main')
@section('title', 'Edit Item')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h2>Edit item</h2>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('items.show') }}" class="btn btn-success">Back</a>
                    </div>
                </div>

                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            @include('superadmin.partials.alerts')
                            <div class="col-md-12  m-auto">
                                <div class="row">

                                    {{-- Item Details --}}
                                    <table class="table table-bordered text-center ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Place of work</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <tr>
                                                <td>{{ $item->customers->customer_name }}</td>
                                                <td>{{ $item->customers->customer_phone }}</td>
                                                <td>{{ $item->customers->customer_placeofwork }}</td>
                                            </tr>


                                        </tbody>
                                    </table>

                                    <form action="{{ route('item.edit', $item) }}" method="post">
                                        @csrf
                                        <div class="row">
                                            {{-- Product Details Section --}}
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <x-form.label for="product_name">Product name</x-form.label>
                                                    <x-form.input type="text" id="product_name" name="product_name"
                                                        placeholder="Enter product name!" :value="old('customer_name') ?? $item->item_name"></x-form.input>
                                                    @error('product_name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <x-form.label for="actual_price">Product Price</x-form.label>
                                                    <x-form.input type="text" id="actual-price-input" name="actual_price"
                                                        placeholder="Enter product price!" :value="old('customer_name') ?? $item->item_price"></x-form.input>
                                                    @error('actual_price')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <x-form.label for="down_payment">Down Payment</x-form.label>
                                                    <x-form.input type="text" id="down-payment-input" name="down_payment"
                                                        placeholder="Enter down payment/advance"
                                                        :value="old('customer_name') ?? $item->down_payment"></x-form.input>
                                                    @error('down_payment')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>


                                                <div class="mb-3">
                                                    <x-form.label for="">Plan</x-form.label>
                                                    <select class="form-select" id="plans-input" name="plan_id"
                                                        aria-label="Default select example">
                                                        <option selected disabled>Select Plan</option>
                                                        @if (old('plan_id'))
                                                            @foreach ($plans as $plan)
                                                                @if (old('plan_id') === $plan->id)
                                                                    <option value="{{ $plan->id }}" selected
                                                                        data-interest="{{ $plan->interest_rate }}"
                                                                        data-month="{{ $plan->months }}">
                                                                        {{ $plan->plan_name }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $plan->id }}"
                                                                        data-interest="{{ $plan->interest_rate }}"
                                                                        data-month="{{ $plan->months }}">
                                                                        {{ $plan->plan_name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            @foreach ($plans as $plan)
                                                                @if ($item->plan_id === $plan->id)
                                                                    <option value="{{ $plan->id }}" selected
                                                                        data-interest="{{ $plan->interest_rate }}"
                                                                        data-month="{{ $plan->months }}">
                                                                        {{ $plan->plan_name }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $plan->id }}"
                                                                        data-interest="{{ $plan->interest_rate }}"
                                                                        data-month="{{ $plan->months }}">
                                                                        {{ $plan->plan_name }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>

                                            </div>

                                            {{-- Calcutalor section --}}
                                            <div class="col-md-6">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>Actual Price</td>
                                                            <td id="actual-price" :value="old('product_name')"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Down Payment</td>
                                                            <td id="down-payment" :value="old('actual-price')"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Balance</td>
                                                            <td id="balance" :value="old('balance')"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Profit</td>
                                                            <td id="profit" :value="old('profit')"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Due Amount</td>
                                                            <td id="total-due-amount" :value="old('total-due-amount')"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Per Month</td>
                                                            <td id="per-month" :value="old('per-month')"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Total Amount</strong></td>
                                                            <td id="total-amount" :value="old('total-amount')"></td>
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
    <script>
        const formElement = document.querySelector("form");
        const actualPriceInputElement = document.querySelector("#actual-price-input");
        const downPaymentInputElement = document.querySelector("#down-payment-input");
        const plansInputElement = document.querySelector("#plans-input");

        formElement.addEventListener("input", function() {
            const selectedOption = plansInputElement.options[plansInputElement.selectedIndex];

            let actualPriceValue = parseInt(actualPriceInputElement.value) || 0;
            let downPaymentValue = parseInt(downPaymentInputElement.value) || 0;
            let plansInterestValue = (parseInt(selectedOption.dataset.interest) / 100) || 0;
            let plansMonthValue = parseInt(selectedOption.dataset.month);

            const actualPriceElement = document.querySelector("#actual-price");
            const downPaymentElement = document.querySelector("#down-payment");
            const balanceElement = document.querySelector("#balance");
            const profitElement = document.querySelector("#profit");
            const totalDueAmountElement = document.querySelector("#total-due-amount");
            const perMonthElement = document.querySelector("#per-month");
            const totalAmountElement = document.querySelector("#total-amount");

            let balance = actualPriceValue - downPaymentValue;
            let profit = balance * plansInterestValue;
            let totalAmountDue = balance + profit;
            let perMonth = totalAmountDue / plansMonthValue;
            let totalAmount = totalAmountDue + downPaymentValue;

            actualPriceElement.innerText = actualPriceValue;
            downPaymentElement.innerText = downPaymentValue;
            balanceElement.innerText = balance;
            profitElement.innerText = profit;
            totalDueAmountElement.innerText = totalAmountDue;
            perMonthElement.innerText = perMonth;
            totalAmountElement.innerText = totalAmount;
        });
        const inputEvent = new Event('input', {
            bubbles: true
        });
        plansInputElement.dispatchEvent(inputEvent);
    </script>

@endsection
