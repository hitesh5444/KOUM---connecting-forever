@extends('admin.index')

@section('content')
    <div class="pagetitle">
        <h1>Project</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Project</li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Project All Detail's</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <td>{{ $project->id }}</td>
                        </tr>
                        <tr>
                            <th>Project Name</th>
                            <td>{{ $project->project_name }}</td>
                        </tr>
                        <tr>
                            <th>Project Image</th>
                            <td>
                                <img class="rounded" src="{{ asset('ProjectImage/' . $project->project_image) }}"
                                    height="125" width="250" alt="">
                            </td>
                        </tr>
                        <tr>
                            @php
                                $startTime = new DateTime($project->start_date);
                                $dateS = $startTime->format('d/m/Y');
                                $endTime = new DateTime($project->end_date);
                                $dateE = $endTime->format('d/m/Y');
                            @endphp
                            <th>Project Start & End Data</th>
                            <td>{{ $dateS . ' - ' . $dateE }}</td>
                        </tr>
                        <tr>
                            <th>Project Description</th>
                            <td>{{ $project->description }}</td>
                        </tr>
                        <tr>
                            <th>Project Create Date</th>
                            <td>{{ $project->created_at->format('Y-m-d') }}</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
@endsection
