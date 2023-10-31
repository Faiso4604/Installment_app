@extends('superadmin.layouts.superadmin_main')
@section('title', 'Admins List')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-6">
                    <h2>Admin List</h2>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.create') }}" class="btn btn-success">
                        Generate New Admin
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('superadmin.partials.alerts')
                            @if (count($users) > 0)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->type }}</td>
                                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.edit', $user) }}" class="btn btn-primary">
                                                        <i data-feather="edit"></i> Edit
                                                    </a>
                                                    <a href="{{ route('admin.destroy', $user) }}" class="btn btn-danger">
                                                        <i data-feather="trash-2"></i> Delete
                                                    </a>
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
