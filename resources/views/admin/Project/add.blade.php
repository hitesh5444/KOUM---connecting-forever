@extends('admin.index')

@section('content')
        <div class="pagetitle">
            <h1>Project</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Project</li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </nav>
        </div>

    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Project Add Form</h5>

          <!-- Custom Styled Validation -->
          <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('admin.add.project') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
              <label for="validationCustom01" class="form-label">Project Name</label>
              <input type="text" name="project_name" class="form-control" id="validationCustom01" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-12">
              <label for="validationCustom02" class="form-label">Project Image</label>
              <input type="file" name="project_image" class="form-control" id="validationCustom02" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom02" class="form-label">Project Start Date</label>
              <input type="datetime-local" name="start_date" class="form-control" id="validationCustom02" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-6">
              <label for="validationCustom02" class="form-label">Project End Date</label>
              <input type="datetime-local" name="end_date" class="form-control" id="validationCustom02" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>

            <div class="col-md-12">
              <label for="validationCustom02" class="form-label">Description</label>
              <textarea name="description" class="form-control" cols="30" rows="10" required></textarea>
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
