@extends('admin.layouts.admin_main')
@section('title', 'Add Plan')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Add Admin</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('plans.show') }}" class="btn btn-success">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.partials.alerts')
                            <form action="{{ route('plans.create') }}" method="post">
                                @csrf
                                    <div class="col-md-8 m-auto">
                                        <div class="mb-3">
                                            <x-form.label for="plan_name">Plan Name</x-form.label>
                                            <x-form.input type="text" id="plan_name" name="plan_name"
                                                placeholder="Enter plan name!" :value="old('plan_name')"></x-form.input>
                                            @error('plan_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <x-form.label for="months">Months</x-form.label>
                                            <x-form.input type="text" id="months" name="months"
                                                placeholder="Enter months!" :value="old('months')"></x-form.input>
                                            @error('months')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <x-form.label for="interest_rate">Interest Rate</x-form.label>
                                            <x-form.input type="text" id="interest_rate" name="interest_rate"
                                                placeholder="Enter interest rate!"></x-form.input>
                                            @error('interest_rate')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
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

