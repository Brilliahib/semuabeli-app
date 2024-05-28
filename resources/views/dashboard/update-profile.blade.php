@extends('layouts.dashboard.main')
@section('container')
    <div class="sub-heading" style="margin-bottom: 2rem;">
        <h3 class="fw-bold text-darkgray mb-2">{{ $sub_title }}</h3>
        <p class="text-gray">Edit your profile information below.</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-6">
            <div class="card border-0 p-3" style="border-radius: 24px;">
                <div class="card-body">
                    <form action="/dashboard/setting/update-profile" method="POSt" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control rounded-pill bg-gray border-0 p-2 px-3" id="name"
                                name="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control rounded-pill bg-gray border-0 p-2 px-3" id="email"
                                name="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="mb-4">
                            <label for="avatar" class="form-label">Avatar</label>
                            <input type="file" class="form-control rounded-pill bg-gray border-0 p-2 px-3 text-gray"
                                id="avatar" name="avatar">
                            <small class="form-text text-muted">Leave blank to keep current avatar.</small>
                        </div>

                        <button type="submit" class="button-auth fw-bold border-0 mt-2">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
