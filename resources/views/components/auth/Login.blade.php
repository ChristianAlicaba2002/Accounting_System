<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounting System | Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .card {
            border: none;
            border-radius: 15px;
            backdrop-filter: blur(5px);
            background: rgba(255, 255, 255, 0.9);
        }

        .login-header img {
            width: 80px;
            height: auto;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
        }

        .form-control:focus {
            border-color: #4C6FFF;
            box-shadow: 0 0 0 0.2rem rgba(76, 111, 255, 0.1);
        }

        .btn-primary {
            background-color: #4C6FFF;
            border: none;
            padding: 0.75rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #3955CC;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(76, 111, 255, 0.2);
        }

        .forgot-password {
            color: #4C6FFF;
            transition: all 0.3s ease;
        }

        .forgot-password:hover {
            color: #3955CC;
        }
    </style>
</head>


@auth
    @include('layouts.HomePage')
    @yield('HomePage')
@else

    <body class="d-flex align-items-center justify-content-center">

        @if (session('notFound'))
            <script>
                alert("{{ session('notFound') }}")
            </script>
        @endif
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-4">
                    <div class="card shadow-lg">
                        <div class="card-body p-4 p-md-5">
                            <!-- Login Header -->
                            <div class="text-center mb-4">
                                <img src="{{ asset('images/accounting-logo.png') }}" alt="Logo" class="mb-4">
                                <h2 class="fw-bold">Welcome Back</h2>
                                <p class="text-muted">Please login to your account</p>
                            </div>

                            <!-- Login Form -->
                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <!-- Branch Name Input -->
                                <div class="mb-3">
                                    <label for="branch_name" class="form-label fw-medium">Branch Name</label>
                                    <input type="text" class="form-control" id="branch_name" name="branchName"
                                        placeholder="Enter your branch name" required>
                                </div>

                                <!-- Password Input -->
                                <div class="mb-3">
                                    <label for="password" class="form-label fw-medium">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter your password" required>
                                        <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Remember Me & Forgot Password -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                        <label class="form-check-label text-muted" for="remember">
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="" class="forgot-password text-decoration-none">
                                        Forgot Password?
                                    </a>
                                </div>

                                <!-- Login Button -->
                                <button type="submit" class="btn btn-primary w-100 mb-3">
                                    <i class="bi bi-box-arrow-in-right me-2"></i> <label for="">Login</label>
                                </button>
                            </form>

                            <!-- System Info -->
                            <div class="text-center text-muted mt-4">
                                <small>Don't have an account? <a href="{{ route('Auth.Register') }}"
                                        class="text-decoration-none">
                                        Register</a>
                                </small>
                                <p class="mb-1">Accounting System</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            function togglePassword() {
                const passwordInput = document.getElementById('password');
                const eyeIcon = document.querySelector('.bi');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.classList.remove('bi-eye');
                    eyeIcon.classList.add('bi-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.classList.remove('bi-eye-slash');
                    eyeIcon.classList.add('bi-eye');
                }
            }
        </script>
    </body>
@endauth


</html>
