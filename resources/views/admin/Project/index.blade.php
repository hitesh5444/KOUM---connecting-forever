@extends('admin.index')

@section('content')
    <style>
        .blockquote-custom {
            position: relative;
            font-size: 1.1rem;
        }

        .blockquote-custom-icon {
            opacity: 0.5;
            transition: 1s;
        }

        .blockquote-custom-icon:hover {
            opacity: 1;
        }
        .blockquote-custom-pencil {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 23px;
            right: 20px;
            opacity: 0.2;
            transition: 1s;
        }

        .blockquote-custom-pencil:hover {
            opacity: 1;
            width: 60px;
        }
    </style>

    <div class="d-flex justify-content-between">
        <div class="pagetitle">
            <h1>Project</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Project</li>
                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ route('admin.project.add') }}" class="btn btn-outline-primary">Add Project</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="section">
        <div class="row">
            @foreach ($project as $value)
                @php
                    $startTime = new DateTime($value->start_date);
                    $dateS = $startTime->format('d/m/Y');
                    $endTime = new DateTime($value->end_date);
                    $dateE = $endTime->format('d/m/Y');
                @endphp

                <div class="col-lg-6">
                    <!-- CUSTOM BLOCKQUOTE -->
                    <div class="blockquote blockquote-custom bg-white shadow p-2 rounded">
                        <img src="{{ asset('ProjectImage/' . $value->project_image) }}" style="height: 200px; border-radius: 5px" class="card-img-top" alt="...">
                        <a class="blockquote-custom-pencil bg-secondary shadow-sm" href="{{ route('admin.project.edit', $value->id) }}"><i class="fa fa-pencil-square-o text-white"></i></a>
                        <div class="p-3">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">{{ $value->project_name }}</h5>
                                <h5 class="card-title">{{ $dateS . ' - ' . $dateE }}</h5>
                            </div>
                            <p class="mb-0 mt-2 font-italic">{{ \Illuminate\Support\Str::limit($value->description, 99) }}
                            </p>
                            <div class="pt-4 mt-4 border-top d-flex justify-content-between">
                                <a href="{{ route('admin.project.view',$value->id) }}" class="btn btn-light col-lg-9 col-md-9">Project Details</a>
                                <a class="blockquote-custom-icon btn btn-danger col-lg-2 col-md-2" href="{{ route('admin.project.destroy', $value->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $value->id }}').submit();"><i class="fa fa-trash text-white"></i></a>
                            </div>
                        </div>
                    </div><!-- END -->

                    <form id="delete-form-{{ $value->id }}" action="{{ route('admin.project.destroy', $value->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                </div>
            @endforeach
        </div>
        {{ $project->links('pagination::bootstrap-5') }}
    </section>
@endsection
