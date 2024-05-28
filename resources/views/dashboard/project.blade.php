@extends('layouts.dashboard.main')
@section('container')
    <div class="sub-heading" style="margin-bottom: 2rem;">
        <h3 class="fw-bold text-darkgray mb-2">{{ $sub_title }}</h3>
        <p class="text-gray">Yuk cari project yang Anda inginkan dan beli sekarang juga.</p>
    </div>
    <div class="row w-full d-lg-flex d-none">
        @if ($projects->isEmpty())
            <div class="col-6">
                <div class="alert alert-info" role="alert">
                    Tidak ada project yang tersedia saat ini. Silakan pilih dan beli project terlebih dahulu.
                </div>
            </div>
        @else
            @foreach ($projects as $project)
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card border-0 card-my_project mb-4">
                        <div class="card-body p-3 pb-4">
                            <img class="mb-4" src="{{ asset('storage/' . $project->cover) }}" alt=""
                                width="100%" style="border-radius: 16px; height:150px">
                            <p class="text-darkgray fw-semibold mb-4">{{ $project->name }}</p>
                            <a href="" class="button-download_project">Download</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="row template-mobile d-lg-none d-flex">
        @foreach ($projects as $project)
            <div class="col-12 gap-4">
                <a href="/project/{{ $project->slug }}" class="text-decoration-none">
                    <div class="card border-0 card-project mb-4">
                        <div class="project-details p-3 d-flex gap-3">
                            <div class="">
                                <img src="{{ asset('storage/' . $project->cover) }}" loading="lazy" alt=""
                                    class="img-fluid project-img"
                                    style="object-fit: cover; border-radius:16px; height:70px; width:80px">
                            </div>
                            <div>
                                <h3 class="font-base line-clamp-mobile line-clamp fw-bold text-darkgray"
                                    style="display: -webkit-box;
                             -webkit-line-clamp: 1; 
                            -webkit-box-orient: vertical;
                            overflow: hidden; text-align:left">
                                    {{ $project->name }}</h3>
                                <div class="d-flex gap-2">
                                    <p class="text-danger"><s>Rp 100.000</s></p>
                                    <p class="text-darkgray">Rp
                                        {{ number_format($project->budget, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="project-footer mb-3 d-flex gap-1 h-full align-items-center">
                            <div class="star d-flex gap-1">
                                @for ($i = 0; $i < 5; $i++)
                                    <img src="{{ asset('img/star.svg') }}" alt="" loading="lazy" width="18px">
                                @endfor
                            </div>
                            <div>(5)</div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
