@extends('layouts.dashboard.main')
@section('container')
    <div class="sub-heading" style="margin-bottom: 2rem;">
        <h3 class="fw-bold text-darkgray mb-2">{{ $sub_title }}</h3>
        <p class="text-gray">Yuk cari project yang Anda inginkan dan beli sekarang juga.</p>
    </div>
    <div class="d-lg-flex gap-lg-4 w-full">
        <div class="cols-main w-full mb-lg-0 mb-4">
            <h5 class="fw-bold text-darkgray mb-4">My Projects</h5>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Project</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $project->name }}</td>
                                <td>Rp {{ number_format($project->budget, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="cols-main w-full">
            <h5 class="fw-bold text-darkgray mb-4">Last Transaction</h5>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Project</th>
                            <th scope="col">Price</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
