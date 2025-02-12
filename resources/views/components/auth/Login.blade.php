<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounting System | Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f5f5 0%, #e0e0e0 100%);
        }

        .container-Card {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            margin-bottom: 1.5rem;
        }

        .form-control {
            border: 1px solid #e5e7eb;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .btn-primary {
            background: #3b82f6;
            border: none;
            padding: 0.75rem 1rem;
            font-weight: 500;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background: #2563eb;
        }

        .input-group-text {
            background: transparent;
            border: none;
            padding-right: 0;
        }

        .password-toggle {
            background: transparent;
            border: none;
            color: #6b7280;
            padding: 0 0.75rem;
        }

        .password-toggle:hover {
            color: #3b82f6;
        }
    </style>
</head>

@auth
    @include('layouts.HomePage')
    @yield('HomePage')
@else

    <body>
        @if (session('notFound'))
            <script>
                alert("{{ session('notFound') }}")
            </script>
        @endif

        <div class="container-Card">


            <div class="login-card">
                <div class="text-center">
                    <img src="{{ asset('images/accounting-logo.png') }}" alt="Logo" class="brand-logo">
                    <h4 class="mb-2">Welcome back</h4>
                    <p class="text-muted small mb-4">Please sign in to continue</p>
                </div>

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-medium">Branch Name</label>
                        <div class="input-group">
                            <span class="input-group-text" style="margin-right: 0.3rem;">
                                <i class="bi bi-building text-muted"></i>
                            </span>
                            <input type="text" class="form-control" name="branchName" placeholder="Enter branch name"
                                required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-medium">Password</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-lock text-muted"></i>
                            </span>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter password" required>
                            <button class="password-toggle" type="button" onclick="togglePassword()">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mb-4">
                        <a href="" class="text-decoration-none small" style="color: #3b82f6;">
                            Forgot password?
                        </a>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        Sign in
                    </button>


                    <div class="text-center text-muted mt-3">
                        <small style="font-size: 0.8rem;">Already have an account?
                            <a href="{{ route('Auth.Register') }}" class="text-decoration-none ms-1"
                                style="color: #3b82f6;">Register</a>
                        </small>
                        <p class="mb-1">Accounting System</p>
                    </div>
                </form>
            </div>
        </div>


        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            function togglePassword() {
                const passwordInput = document.getElementById('password');
                const eyeIcon = document.querySelector('.password-toggle i');

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
