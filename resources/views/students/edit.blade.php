<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Student | Student Management Pro</title>

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
                    <h1 class="h3 fw-bold text-dark">Edit Student</h1>
                    <p class="text-secondary mb-0">
                        Update the student's information below.
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
                        <form
                            action="{{ route('students.update', $student->id) }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name"
                                    class="form-label fw-semibold">
                                    Name
                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $student->name) }}"
                                    placeholder="Enter student name"
                                    required>

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
                                    id="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $student->email) }}"
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
                                    id="age"
                                    name="age"
                                    class="form-control @error('age') is-invalid @enderror"
                                    value="{{ old('age', $student->age) }}"
                                    placeholder="Enter student age"
                                    min="1">

                                @error('age')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">
                                    Current Profile Image
                                </label>

                                @if ($student->image)
                                <div class="mb-3">
                                    <img
                                        src="{{ asset('storage/' . $student->image) }}"
                                        alt="{{ $student->name }}"
                                        class="rounded-circle border shadow-sm"
                                        width="100"
                                        height="100"
                                        style="object-fit: cover;">

                                    <p class="form-text mt-2 mb-0">
                                        Current image
                                    </p>
                                </div>
                                @else
                                <p class="text-secondary small">
                                    No profile image uploaded yet.
                                </p>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label for="image"
                                    class="form-label fw-semibold">
                                    Change Profile Image
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
                                    JPG, PNG or WEBP. Maximum size: 2 MB.
                                    Leave empty to keep the current image.
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
                                    Update Student
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