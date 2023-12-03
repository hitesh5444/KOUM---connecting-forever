@extends('admin.index')

@section('content')
        <div class="pagetitle">
            <h1>Project</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Project</li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </nav>
        </div>

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Project Edit Form</h5>

          <!-- Custom Styled Validation -->
          <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('admin.project.update',$project->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-12">
              <label for="validationCustom01" class="form-label">Project Name</label>
              <input type="text" name="project_name" class="form-control" id="validationCustom01" value="{{ $project->project_name }}" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-12">
              <label for="validationCustom02" class="form-label">Project Image</label>
              <input type="file" name="project_image" class="form-control" id="validationCustom02">
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-12">
                <img class="card" src="{{ asset('ProjectImage/'.$project->project_image) }}" height="100px" width="100px" alt="">
            </div>

            <div class="col-md-6">
              <label for="validationCustom02" class="form-label">Project Start Date</label>
              <input type="datetime-local" name="start_date" class="form-control" id="validationCustom02" value="{{ $project->start_date }}">
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom02" class="form-label">Project End Date</label>
              <input type="datetime-local" name="end_date" class="form-control" value="{{$project->end_date}}" id="date_time" placeholder="Enter date & time">
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-12">
              <label for="validationCustom02" class="form-label">Description</label>
              <textarea name="description" class="form-control" cols="30" rows="10" required> {{ $project->description }} </textarea>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
          </form><!-- End Custom Styled Validation -->

        </div>
      </div>
@endsection
