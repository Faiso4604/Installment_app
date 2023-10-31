@extends('admin.layouts.admin_main')
@section('title', 'Profile')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Profile</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.partials.alerts')
                            <form action="{{ route('admin.profile.picture') }}" method="post" enctype="multipart/form-data"
                                class="my-3">
                                @csrf

                                <div class="mb-3">
                                    <label for="picture" class="form-label">Profile Picture</label>
                                    <input type="file" class="form-control @error('picture') is-invalid  @enderror"
                                        id="picture" name="picture">
                                    @error('picture')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <input type="submit" class="btn btn-primary" value="Save">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
