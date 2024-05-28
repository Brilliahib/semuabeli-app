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
        <div class="col-lg-3">
            <div href="/dashboard/setting/update-profile" class="card border-0 p-3" style="border-radius: 16px;">
                <div class="mb-4">
                    <img src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('img/default-avatar.svg') }}"
                        alt="" class="avatar">
                </div>
                <h6 class="text-darkgray fw-bold">My Profile</h6>
                <p class="text-gray">Ubah data diri Anda disini.</p>
                <a href="/dashboard/setting/update-profile" class="button-primary d-block w-full text-center fw-semibold mb-3">Edit Profile</a>
            </div>
        </div>
    </div>
@endsection
