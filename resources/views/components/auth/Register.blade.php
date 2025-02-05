<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounting System | Register</title>

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
            font-size: 0.9rem;
        }

        .card {
            border: none;
            border-radius: 12px;
            backdrop-filter: blur(5px);
            background: rgba(255, 255, 255, 0.9);
        }

        .login-header img {
            width: 80px;
            height: auto;
        }

        .form-control {
            border-radius: 6px;
            padding: 0.5rem 0.75rem;
            font-size: 0.9rem;
        }

        .form-control:focus {
            border-color: #4C6FFF;
            box-shadow: 0 0 0 0.2rem rgba(76, 111, 255, 0.1);
        }

        .btn-primary {
            background-color: #4C6FFF;
            border: none;
            padding: 0.5rem;
            font-size: 0.9rem;
            border-radius: 6px;
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

        h2 {
            font-size: 1.5rem;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center">

    @if (session('registerd'))
        <script>
            alert("{{ sessiont('registerd') }}")
        </script>
    @endif

    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-12 col-md-7 col-lg-4">
                <div class="card shadow">
                    <div class="card-body p-6">
                        <!-- Login Header -->
                        <div class="text-center mb-2">
                            <img src="{{ asset('images/accounting-logo.png') }}" alt="Logo" class="mb-1"
                                style="width: 50px;">
                            <h2 class="fw-bold">Register Account</h2>
                            <p class="text-muted small">Create your new account</p>
                        </div>

                        <!-- Registration Form -->
                        <form method="POST" action="{{ route('admin.register') }}">
                            @csrf
                            <div class="row g-2">
                                <div class="col-md-6 mb-2">
                                    <label for="first_name" class="form-label small fw-medium">First Name</label>
                                    <input type="text" class="form-control form-control-sm" id="first_name"
                                        name="firstName" placeholder="Enter your first name" required>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="last_name" class="form-label small fw-medium">Last Name</label>
                                    <input type="text" class="form-control form-control-sm" id="last_name"
                                        name="lastName" placeholder="Enter your last name" required>
                                </div>
                            </div>

                            <!-- Branch Name Input -->
                            <div class="mb-2">
                                <label for="branch_name" class="form-label small fw-medium">Branch Name</label>
                                <input type="text" class="form-control form-control-sm" id="branch_name"
                                    name="branchName" placeholder="Enter your branch name" required>
                                @if (session('branchNameExist'))
                                    <p style="font-size: .80rem; color:red">{{ session('branchNameExist') }}</p>
                                    <script>
                                        document.getElementById('branchName').style.borderColor = 'red'
                                        document.getElementById('email').style.borderColor = 'lightgray'
                                        document.getElementById('password_confirmation').style.borderColor = 'lightgray'
                                    </script>
                                @endif
                            </div>

                            <!-- Address Input -->
                            <div class="mb-2">
                                <label for="address" class="form-label small fw-medium">Address</label>
                                <select id="address" class="form-control form-control-sm dropdown-toggle"
                                    name="address">
                                    <option value="Alcantara, Cebu">Select Address</option>
                                    <option value="Alcantara, Cebu">Alcantara, Cebu</option>
                                    <option value="Alcoy, Cebu">Alcoy, Cebu</option>
                                    <option value="Alegria, Cebu">Alegria, Cebu</option>
                                    <option value="Argao, Cebu">Argao, Cebu</option>
                                    <option value="Asturias, Cebu">Asturias, Cebu</option>
                                    <option value="Badian, Cebu">Badian, Cebu</option>
                                    <option value="Balamban, Cebu">Balamban, Cebu</option>
                                    <option value="Bantayan, Cebu">Bantayan, Cebu</option>
                                    <option value="Barili, Cebu">Barili, Cebu</option>
                                    <option value="Bogo, Cebu">Bogo, Cebu</option>
                                    <option value="Boljoon, Cebu">Boljoon, Cebu</option>
                                    <option value="Borbon, Cebu">Borbon, Cebu</option>
                                    <option value="Carcar, Cebu">Carcar, Cebu</option>
                                    <option value="Carmen, Cebu">Carmen, Cebu</option>
                                    <option value="Catmon, Cebu">Catmon, Cebu</option>
                                    <option value="Cebu City, Cebu">Cebu City, Cebu</option>
                                    <option value="Compostela, Cebu">Compostela, Cebu</option>
                                    <option value="Consolacion, Cebu">Consolacion, Cebu</option>
                                    <option value="Cordova, Cebu">Cordova, Cebu</option>
                                    <option value="Dalaguete, Cebu">Dalaguete, Cebu</option>
                                    <option value="Danao, Cebu">Danao, Cebu</option>
                                    <option value="Dumanjug, Cebu">Dumanjug, Cebu</option>
                                    <option value="Ginatilan, Cebu">Ginatilan, Cebu</option>
                                    <option value="Liloan, Cebu">Liloan, Cebu</option>
                                    <option value="Lapu-Lapu, Cebu">Lapu-Lapu, Cebu</option>
                                    <option value="Madridejos, Cebu">Madridejos, Cebu</option>
                                    <option value="Mandaue, Cebu City">Mandaue, Cebu City</option>
                                    <option value="Minglanilla, Cebu">Minglanilla, Cebu</option>
                                    <option value="Moalboal, Cebu">Moalboal, Cebu</option>
                                    <option value="Oslob, Cebu">Oslob, Cebu</option>
                                    <option value="Pilar, Cebu">Pilar, Cebu</option>
                                    <option value="Pinamungahan, Cebu">Pinamungahan, Cebu</option>
                                    <option value="Poro, Cebu">Poro, Cebu</option>
                                    <option value="Ronda, Cebu">Ronda, Cebu</option>
                                    <option value="San Fernando, Cebu">San Fernando, Cebu</option>
                                    <option value="San Francisco, Cebu">San Francisco, Cebu</option>
                                    <option value="San Remigio, Cebu">San Remigio, Cebu</option>
                                    <option value="Santa Fe, Cebu">Santa Fe, Cebu</option>
                                    <option value="Santander, Cebu">Santander, Cebu</option>
                                    <option value="Sibonga, Cebu">Sibonga, Cebu</option>
                                    <option value="Sogod, Cebu">Sogod, Cebu</option>
                                    <option value="Tabogon, Cebu">Tabogon, Cebu</option>
                                    <option value="Tabuelan, Cebu">Tabuelan, Cebu</option>
                                    <option value="Talisay, Cebu">Talisay, Cebu</option>
                                    <option value="Toledo, Cebu">Toledo, Cebu</option>
                                    <option value="Tuburan, Cebu">Tuburan, Cebu</option>
                                    <option value="Tudela, Cebu">Tudela, Cebu</option>
                                    <option value="Tugbong, Cebu">Tugbong, Cebu</option>
                                    <option value="Ulat, Cebu">Ulat, Cebu</option>
                                    <option value="Umas, Cebu">Umas, Cebu</option>
                                    <option value="Ubay, Cebu">Ubay, Cebu</option>
                                    <option value="Valencia, Cebu">Valencia, Cebu</option>
                                    <option value="Valladolid, Cebu">Valladolid, Cebu</option>
                                    <option value="Zambujal, Cebu">Zambujal, Cebu</option>
                                </select>

                            </div>

                            <div class="mb-2">
                                <label for="email" class="form-label small fw-medium">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email"
                                    name="email" placeholder="Enter your email" required>
                                @if (session('emailExist'))
                                    <p style="font-size: .80rem; color:red">{{ session('emailExist') }}</p>
                                    <script>
                                        document.getElementById('branchName').style.borderColor = 'lightgray'
                                        document.getElementById('email').style.borderColor = 'red'
                                        document.getElementById('password_confirmation').style.borderColor = 'lightgray'
                                    </script>
                                @endif
                            </div>

                            <!-- Password Input -->
                            <div class="mb-2">
                                <label for="password" class="form-label small fw-medium">Password</label>
                                <div class="input-group input-group-sm">
                                    <input type="password" class="form-control form-control-sm" id="password"
                                        name="password" placeholder="Enter your password" required>
                                    <button class="btn btn-outline-secondary btn-sm" type="button"
                                        onclick="togglePassword('password')">
                                        <i class="bi bi-eye small" id="password-eye"></i>
                                    </button>
                                </div>
                                <p style="color: red" id="validation"></p>
                            </div>

                            <!-- Confirm Password Input -->
                            <div class="mb-2">
                                <label for="password_confirmation" class="form-label small fw-medium">Confirm
                                    Password</label>
                                <div class="input-group input-group-sm">
                                    <input type="password" class="form-control form-control-sm"
                                        id="password_confirmation" name="confirmation_password"
                                        placeholder="Confirm your password" required>
                                    <button class="btn btn-outline-secondary btn-sm" type="button"
                                        onclick="togglePassword('password_confirmation')">
                                        <i class="bi bi-eye small" id="confirmation-eye"></i>
                                    </button>
                                </div>

                                @if (session('passwordValidation'))
                                    <p style="font-size: .80rem; color:red">{{ session('passwordValidation') }}</p>
                                    <script>
                                        document.getElementById('password_confirmation').style.borderColor = 'red'
                                        document.getElementById('email').style.borderColor = 'lightgray'
                                    </script>
                                @endif
                            </div>

                            <!-- Register Button -->
                            <button type="submit" class="btn btn-primary btn-sm w-100 mb-2">
                                <i class="bi bi-person-plus me-1"></i>Register
                            </button>
                        </form>

                        <!-- System Info -->
                        <div class="text-center text-muted mt-3">
                            <small style="font-size: 0.8rem;">Already have an account?
                                <a href="{{ route('Auth.Login') }}" class="text-decoration-none">Login</a>
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
        function ChangeValidation() {
            password.addEventListener('change', () => {
                const password = document.getElementById('password').value;
                const validation = document.getElementById('validation');
                const regex = /[A-Z]/

                if (password.length > 15) {
                    validation.textContent = 'Password should not exceed 15 characters'
                } else if (password.length < 8) {
                    validation.textContent = 'Password must contain 8 character'
                } else if (!regex.test(password)) {
                    validation.textContent = 'Password must have one capital letter'

                } else {
                    validation.textContent = ''
                }
            })
        }
        ChangeValidation()







        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = inputId === 'password' ?
                document.getElementById('password-eye') :
                document.getElementById('confirmation-eye');

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

</html>
