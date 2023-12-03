<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Shivsigma Infotech</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="card" style="width: 800px">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <!-- Multi Columns Form -->
                                    <form class="row g-1 needs-validation" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-12">
                                            <label for="inputName5" class="form-label">User Name</label>
                                            <input type="text" name="name" class="form-control" id="inputName5">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail5" class="form-label">First Name</label>
                                            <input type="text" name="first_name" class="form-control" id="inputEmail5">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword5" class="form-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" id="inputPassword5">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress2" class="form-label">Profile Image</label>
                                            <input type="file" name="profile_image" class="form-control" id="inputAddress2">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputEmail5" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="inputEmail5">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputPassword5" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="inputPassword5">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress5" class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" id="inputAddres5s">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputCity" class="form-label">phone</label>
                                            <input type="text" name="phone" class="form-control" id="inputCity">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputZip" class="form-label">About</label>
                                            <textarea name="about" class="form-control" cols="30" rows="1"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" name="term" value="1" type="checkbox" id="gridCheck">
                                                <label class="form-check-label" for="gridCheck">
                                                    I agree and accept the <a href="#">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create
                                                Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a
                                                    href="{{ route('admin.login') }}">Log in</a></p>
                                        </div>
                                    </form><!-- End Multi Columns Form -->

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
