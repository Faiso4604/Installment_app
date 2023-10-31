{{-- @extends('superadmin.layouts.superadmin_main')
@section('title', 'Edit Admin')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h2>Edit Admin</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.show') }}" class="btn btn-success">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('superadmin.partials.alerts')
                            <form action="{{ route('admin.edit', $user) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <div class="col-md-8 m-auto">
                                        <div class="mb-3">
                                            <x-form.label for="name">Name</x-form.label>
                                            <x-form.input type="text" id="name" name="name"
                                                placeholder="Enter your first name!" :value="old('name') ?? $user->name"></x-form.input>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <x-form.label for="email">Email</x-form.label>
                                            <x-form.input type="email" id="email" name="email"
                                                placeholder="Enter email!" :value="old('email') ?? $user->email"></x-form.input>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <x-form.label for="new_password">New password</x-form.label>
                                            <x-form.input type="password" id="new_password" name="new_password"
                                                placeholder="Enter new password!"></x-form.input>
                                            @error('new_password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <x-form.label for="superadmin_password">Admin password</x-form.label>
                                            <x-form.input type="password" id="superadmin_password" name="superadmin_password"
                                                placeholder="Enter super admin password to submit"></x-form.input>
                                            @error('superadmin_password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div>
                                            <input type="submit" class="btn btn-primary" value="Save" >
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection --}}
