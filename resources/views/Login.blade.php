<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container vh-100">
    <div class="row justify-content-center align-items-center h-100">

        <div class="col-md-4">

            <div class="card shadow">
                <div class="card-header text-center">
                    <h3 class="mb-0">Library Record</h3>
                </div>

                <div class="card-body">
                    
                      {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR MESSAGE --}}
    @if(session('error'))
        <div class="alert alert-danger" id="errorMessage">
            {{ session('error') }}
        </div>
    @endif

    {{-- VALIDATION ERRORS --}}
    @if ($errors->any())
        <div class="alert alert-danger" id="alertMessage">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

                    <form action="/Login" method="POST">
                        @csrf
           
                        <div class="mb-3">
                            <label class="form-label">
                                Email Address
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                placeholder="Enter your email"
                                value="{{ old('email') }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                class="form-control"
                                name="password"
                                placeholder="Enter your password"
                                required>
                        </div>

                        <div class="form-check mb-3">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="remember">

                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary w-100">
                            Login
                        </button>

                    </form>

                </div>

                <div class="card-footer text-center">
                    <small>
                        Don't have an account?
                        <a href="/registration">Register Here</a>
                    </small>
                </div>
            </div>

        </div>

    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const alertBox = document.getElementById('alertMessage');
        if (alertBox) {
            setTimeout(function () {
                const bsAlert = bootstrap.Alert.getOrCreateInstance(alertBox);
                bsAlert.close();
            }, 2500);
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>