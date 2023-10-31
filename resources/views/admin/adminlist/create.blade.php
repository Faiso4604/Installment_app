@extends('admin.layouts.admin_main')
@section('title', 'Add Admin')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Add Admin</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.show') }}" class="btn btn-success">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.partials.alerts')
                            <form action="{{ route('admin.create') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="col-md-8 m-auto">
                                        <div class="mb-3">
                                            <x-form.label for="name">Name</x-form.label>
                                            <x-form.input type="text" id="name" name="name"
                                                placeholder="Enter your first name!" :value="old('name')"></x-form.input>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <x-form.label for="email">Email</x-form.label>
                                            <x-form.input type="email" id="email" name="email"
                                                placeholder="Enter email!" :value="old('email')"></x-form.input>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <x-form.label for="password">Password</x-form.label>
                                            <x-form.input type="password" id="password" name="password"
                                                placeholder="Enter password!"></x-form.input>
                                            @error('password')
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
