<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow-sm">

                <div class="card-header">
                    <h4 class="mb-0">Create Account</h4>
                </div>

                <div class="card-body">

                    <form action="/register" method="POST">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <label class="form-label">
                                    Full Name
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Enter your full name"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Username
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="username"
                                    placeholder="Enter your username"
                                    required>
                            </div>

                        </div>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <label class="form-label">
                                    Email Address
                                </label>
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    placeholder="Enter your email address"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Contact Number
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="contact_number"
                                    placeholder="09XXXXXXXXX"
                                    required>
                            </div>

                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Address
                            </label>
                            <textarea
                                class="form-control"
                                name="address"
                                rows="3"
                                placeholder="Enter your complete address"
                                required></textarea>
                        </div>

                        <hr>

                        <h5 class="mb-3">
                            Account Security
                        </h5>

                        <div class="row mb-3">

                            <div class="col-md-6">
                                <label class="form-label">
                                    Password
                                </label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="Enter password"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">
                                    Confirm Password
                                </label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="password_confirmation"
                                    placeholder="Confirm password"
                                    required>
                            </div>

                        </div>

                        <div class="d-flex justify-content-end gap-2">

                            <button
                                type="reset"
                                class="btn btn-secondary">
                                Reset
                            </button>

                            <button
                                type="submit"
                                class="btn btn-success">
                                Register
                            </button>

                        </div>

                    </form>

                </div>

                <div class="card-footer text-center">

                    <small>
                        Already have an account?
                        <a href="/Login">Login Here</a>
                    </small>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>