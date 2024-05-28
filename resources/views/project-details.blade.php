@extends('layouts.main')
@section('container')
    <section class="project" style="margin-top: 2rem;">
        <div class="container">
            <div class="heading-section" style="margin-bottom: 2rem;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/template">Template</a></li>
                        <li class="breadcrumb-item">{{ $project->name }}</li>
                    </ol>
                </nav>
            </div>
            <div class="main-project-detals row">
                <div class="project-img col-lg-9 col-12 mb-lg-0 mb-4">
                    <div class="card card-project border-0 p-lg-4 p-2">
                        <div class="card-body">
                            <div class="name-project mb-4">
                                <h3 class="fw-bolder text-darkgray">{{ $project->name }}</h3>
                                <p class="font-base text-gray">Released on {{ $project->created_at->format('F, Y') }}</p>
                            </div>
                            <div class="about-project mb-4">
                                <h5 class="fw-bold text-darkgray mb-3">About</h5>
                                <div class="lh-lg font-base text-darkgray">{!! $project->about !!}</div>
                            </div>
                            <div class="tools-container mb-4">
                                <h5 class="fw-bold text-darkgray mb-3">Tools</h5>
                                <div class="tools d-flex gap-3 mb-4">
                                    @foreach ($project->tools as $tool)
                                        <div class="card card-project">
                                            <div class="card-body">
                                                <div class="d-flex gap-3">
                                                    <img src="{{ asset('storage/' . $tool->icons) }}"
                                                        alt="{{ $tool->name }}" width="50px" height="50px">
                                                    <div class="gap-2">
                                                        <p class="fw-semibold text-darkgray mb-0">{{ $tool->name }}</p>
                                                        <p class="text-gray mb-0">Requirement</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="gallery-project">
                                <h5 class="fw-bold text-darkgray mb-3">Screenshoot</h5>
                                <div class="preview-project-container">
                                    @if ($project->images->isNotEmpty())
                                        @foreach ($project->images as $image)
                                            <div class="project-card">
                                                <img src="{{ asset('storage/' . $image->path) }}" alt=""
                                                    height="250px">
                                            </div>
                                        @endforeach
                                    @else
                                        <p>No images available.</p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-tools col-lg-3 col-12">
                    <div class="card card-tools border-0">
                        <div class="card-body p-3">
                            <img src="{{ asset('storage/' . $project->cover) }}" alt="{{ $project->cover }}" width="100%"
                                class="project-details-img">
                            <div class="mt-3">
                                <h5 class="fw-semibold">Rp {{ number_format($project->budget, 0, ',', '.') }}</h5>
                            </div>
                            <div class="mt-4">
                                <div class="w-full">
                                    @auth
                                        <a href="{{ route('download', ['file' => $project->file]) }}"
                                            class="button-primary d-block w-full text-center fw-semibold mb-3">Download</a>
                                    @else
                                        <a href="/login"
                                            class="button-primary d-block w-full text-center fw-semibold mb-3"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1" />
                                            </svg> Download</a>
                                    @endauth
                                    <a href="" class="button-black d-block w-full text-center fw-semibold"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff"
                                            class="bi bi-bookmark" viewBox="0 0 16 16">
                                            <path
                                                d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z" />
                                        </svg> Bookmark</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
