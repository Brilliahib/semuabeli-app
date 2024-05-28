@extends('layouts.main')
@section('container')
    <section class="project" style="margin-top: 3rem;">
        <div class="container">
            <div class="heading-section text-lg-center" style="margin-bottom: 3rem">
                <h2 class="fw-bold text-darkgray lh-base">Pilihan Template</h2>
                <p class="text-gray">Pilih template yang Anda inginkan dengan <br>referensi yang sangat menarik</p>
            </div>
            <div class="row template-desktop d-lg-flex d-none">
                @foreach ($projects as $project)
                    <div class="col-lg-3 col-md-4">
                        <a href="/project/{{ $project->slug }}" class="text-decoration-none">
                            <div class="card border-0 card-project mb-4">
                                <img src="{{ asset('storage/' . $project->cover) }}" loading="lazy" alt=""
                                    class="img-fluid project-img" style="height: 200px; object-fit: cover">
                                <div class="project-details p-3">
                                    <h3 class="project-name line-clamp-mobile line-clamp fw-bold text-darkgray"
                                        style="display: -webkit-box;
                             -webkit-line-clamp: 1; 
                            -webkit-box-orient: vertical;
                            overflow: hidden; text-align:left">
                                        {{ $project->name }}</h3>
                                    <div class="d-flex gap-2 align-items-center">
                                        <p class="text-danger"><s>Rp 100.000</s></p>
                                        <p class="text-darkgray font-base">Rp
                                            {{ number_format($project->budget, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                                <div class="project-footer mb-3 d-flex gap-1 h-full align-items-center">
                                    <div class="star d-flex gap-1">
                                        @for ($i = 0; $i < 5; $i++)
                                            <img src="{{ asset('img/star.svg') }}" alt="" loading="lazy"
                                                width="20px">
                                        @endfor
                                    </div>
                                    <div>(5)</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
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
                                            <img src="{{ asset('img/star.svg') }}" alt="" loading="lazy"
                                                width="18px">
                                        @endfor
                                    </div>
                                    <div>(5)</div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
