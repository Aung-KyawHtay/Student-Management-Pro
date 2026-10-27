<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Student | Student Management Pro</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold"
                href="{{ route('students.index') }}">
                Student Management Pro
            </a>
        </div>
    </nav>

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">

                <div class="mb-4">
                    <h1 class="h3 fw-bold text-dark">Add New Student</h1>
                    <p class="text-secondary mb-0">
                        Enter student information below.
                    </p>
                </div>
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">

                        <!-- @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <strong>Please check the following errors:</strong>

                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif -->
                        <form action="{{ route('students.store') }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            <div class="mb-3">
                                <label for="name"
                                    class="form-label fw-semibold">
                                    Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}"
                                    placeholder="Enter student name">

                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email"
                                    class="form-label fw-semibold">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}"
                                    placeholder="Enter email address">

                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="age"
                                    class="form-label fw-semibold">
                                    Age
                                </label>

                                <input
                                    type="number"
                                    name="age"
                                    id="age"
                                    class="form-control @error('age') is-invalid @enderror"
                                    value="{{ old('age') }}"
                                    min="1">

                                @error('age')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="image"
                                    class="form-label fw-semibold">
                                    Profile Image
                                    <span class="text-secondary fw-normal">
                                        (Optional)
                                    </span>
                                </label>

                                <input
                                    type="file"
                                    name="image"
                                    id="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                    accept="image/jpeg,image/png,image/webp">

                                <div class="form-text">
                                    Supported formats: JPG, PNG, WEBP.
                                    Maximum size: 2 MB.
                                </div>

                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="d-flex flex-column flex-sm-row gap-2">

                                <button type="submit"
                                    class="btn btn-primary flex-fill">
                                    Add Student
                                </button>

                                <a href="{{ route('students.index') }}"
                                    class="btn btn-outline-secondary flex-fill">
                                    Cancel
                                </a>

                            </div>

                        </form>

                    </div>
                </div>
                <p class="text-center text-secondary small mt-4">
                    Student Management Pro
                </p>

            </div>
        </div>

    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>