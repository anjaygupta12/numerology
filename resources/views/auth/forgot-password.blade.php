<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRK Numerology - Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/numerology/numerology_backgorund.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .forgot-password-container {
            max-width: 450px;
            margin: 100px auto;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .form-label {
            font-weight: 500;
        }
        .form-control {
            border-color: #bbbbbb;
        }
        .card-header {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
            text-align: center;
            border-radius: 10px 10px 0 0 !important;
            padding: 20px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #5d7df9, #9566d9);
        }
    </style>
</head>
<body>
    <div class="container forgot-password-container">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Reset Password</h3>
            </div>
            <div class="card-body p-4">
                <p class="mb-4">Enter your email address and we'll send you a link to reset your password.</p>
                
                @if(session('status'))
                    <div class="alert alert-success mb-3">
                        {{ session('status') }}
                    </div>
                @endif
                
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                    </div>
                    
                    <div class="mt-3 text-center">
                        <p class="mb-0">
                            Remember your password? <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="text-center mt-3">
            <a href="{{ route('home') }}" class="text-decoration-none">&larr; Back to Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
