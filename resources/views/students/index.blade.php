<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Management Pro</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px 20px;
            font-family: Arial, sans-serif;
            background: #f4f7fb;
        }

        .page-container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .main-navbar {
            border-radius: 12px;
            padding: 12px 16px;
        }

        .brand-title {
            font-weight: 700;
            letter-spacing: 0.2px;
        }

        .user-name {
            color: #e2e8f0;
            font-size: 14px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin: 28px 0 22px;
        }

        .page-header h1 {
            margin: 0 0 8px;
            font-size: 28px;
            font-weight: 700;
            color: #1e293b;
        }

        .subtitle {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }

        .btn-create {
            white-space: nowrap;
        }

        .success-alert {
            padding: 13px 16px;
            margin-bottom: 20px;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            background: #dcfce7;
            color: #166534;
        }

        .student-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            overflow: hidden;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .student-table {
            width: 100%;
            margin: 0;
            border-collapse: collapse;
            text-align: left;
        }

        .student-table thead {
            background: #f8fafc;
        }

        .student-table th {
            padding: 16px;
            color: #64748b;
            font-size: 12px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .student-table td {
            padding: 16px;
            border-top: 1px solid #edf2f7;
            font-size: 14px;
            vertical-align: middle;
        }

        .student-table tbody tr:hover {
            background: #f8fafc;
        }

        .student-photo {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .photo-placeholder {
            width: 50px;
            height: 50px;
        }

        .student-name {
            font-weight: 600;
            color: #1e293b;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .delete-form {
            margin: 0;
        }

        .empty-state {
            padding: 35px !important;
            text-align: center;
            color: #64748b;
        }

        .pagination-wrapper {
            padding: 20px;
            border-top: 1px solid #edf2f7;
        }

        @media (max-width: 600px) {
            body {
                padding: 16px 10px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-header h1 {
                font-size: 23px;
            }

            .main-navbar {
                padding: 12px;
            }

            .navbar-content {
                gap: 12px;
            }

            .user-name {
                font-size: 12px;
            }

            .pagination-wrapper {
                padding: 14px 8px;
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>
    <div class="page-container">

        {{-- Navigation Bar --}}
        <nav class="navbar navbar-dark bg-dark main-navbar">
            <div class="container-fluid px-0 navbar-content">

                <a class="navbar-brand brand-title"
                    href="{{ route('students.index') }}">
                    Student Management Pro
                </a>

                <div class="d-flex align-items-center gap-3">

                    <span class="user-name">
                        Welcome, {{ Auth::user()->name }}!
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="btn btn-outline-light btn-sm">
                            Logout
                        </button>
                    </form>

                </div>
            </div>
        </nav>

        {{-- Page Header --}}
        <header class="page-header">
            <div>
                <h1>Student Management Pro</h1>
                <p class="subtitle">
                    Manage your student records in one place.
                </p>
            </div>

            <a href="{{ route('students.create') }}"
                class="btn btn-primary btn-create">
                + Add Student
            </a>
        </header>

        {{-- Success Message --}}
        @if (session('success'))
        <div class="success-alert" role="alert">
            {{ session('success') }}
        </div>
        @endif

        {{-- Student Table --}}
        <div class="student-card">
            <div class="table-wrapper">

                <table class="student-table">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($students as $student)
                        <tr>
                            {{-- Student Photo --}}
                            <td>
                                @if ($student->image)
                                <img
                                    src="{{ asset('storage/' . $student->image) }}"
                                    alt="{{ $student->name }}"
                                    class="rounded-circle student-photo">
                                @else
                                <div
                                    class="rounded-circle bg-light border d-flex align-items-center justify-content-center photo-placeholder">
                                    <span class="text-muted">N/A</span>
                                </div>
                                @endif
                            </td>

                            <td>{{ $student->id }}</td>

                            <td class="student-name">
                                {{ $student->name }}
                            </td>

                            <td>{{ $student->email }}</td>

                            <td>{{ $student->age ?? 'N/A' }}</td>

                            {{-- Action Buttons --}}
                            <td>
                                <div class="action-buttons">

                                    <a
                                        href="{{ route('students.edit', $student->id) }}"
                                        class="btn btn-sm btn-primary">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('students.destroy', $student->id) }}"
                                        method="POST"
                                        class="delete-form"
                                        onsubmit="return confirm('Are you sure you want to delete this student?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger">
                                            Delete
                                        </button>

                                    </form>
                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="6" class="empty-state">
                                No students found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="pagination-wrapper">
                {{ $students->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>