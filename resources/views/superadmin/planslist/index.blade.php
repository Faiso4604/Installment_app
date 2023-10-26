@extends('layouts.main')
@section('title', 'Installment plans')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <h2>Installment Plans</h2>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('plans.create') }}" class="btn btn-success">
                                Add Plan
                            </a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            @if (count($plans) > 0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Months</th>
                                            <th>Interest rate</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($plans as $plan)
                                            <tr>
                                                <td>{{ $plan->id }}</td>
                                                <td>{{ $plan->plan_name }}</td>
                                                <td>{{ $plan->months }}</td>
                                                <td>{{ $plan->interest_rate }}%</td>
                                                <td>
                                                    <div class="mt-2 mb-2">
                                                        <a href="{{ route('plans.edit', $plan) }}" class="btn btn-primary">Edit</a>
                                                        <a href="{{ route('plan.destroy', $plan) }}" class="btn btn-danger">Delete</a>
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
