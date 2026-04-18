<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRK Numerology - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/numerology/numerology_backgorund.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .login-container {
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

        .btn-secondary {
            background: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .btn-secondary:disabled {
            opacity: 0.65;
        }

        .otp-section {
            display: none;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
        }

        .otp-timer {
            color: #dc3545;
            font-weight: bold;
        }

        .send-otp-btn {
            margin-top: 10px;
        }

        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
            border-width: 0.2em;
        }

        .optional-note {
            font-size: 0.85rem;
            color: #6c757d;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="card">
            <div class="card-header">
                @if (session('error'))
                    <div class="alert alert-danger mb-3">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Display all validation errors -->
                @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <strong>Please fix the following errors:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h3 class="mb-0">Login to SRK Numerology</h3>
            </div>
            <div class="card-body p-4">
                @if (session('status'))
                    <div class="alert alert-success mb-3">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger mb-3">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Custom Alert Container -->
                <div id="customAlertContainer"></div>

                <form method="POST" action="{{ route('login') }}" id="loginForm">
                    @csrf

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                         <input type="hidden" id="device_id" name="device_id">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-text" id="emailStatus"></div>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Send/Resend OTP Button (Hidden for admin email) -->
                    <div class="d-grid send-otp-btn" id="otpButtonContainer">
                        <button type="button" class="btn btn-outline-primary" id="otpBtn" onclick="sendOTP()">
                            <span id="otpBtnText">Send OTP (Optional)</span>
                            <span id="otpBtnSpinner" class="spinner-border spinner-border-sm"
                                style="display: none;"></span>
                        </button>
                    </div>

                    <!-- OTP Section (Hidden Initially) -->
                    <div class="otp-section" id="otpSection">
                        <div class="mb-3">
                            <label for="otp" class="form-label">Enter OTP <span class="optional-note">(Optional -
                                    for extra security)</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('otp') is-invalid @enderror"
                                    id="otp" name="otp" maxlength="6" placeholder="6-digit OTP">
                                <button type="button" class="btn btn-outline-secondary" id="otpTimerBtn" disabled>
                                    <span id="timerText">30s</span>
                                </button>
                            </div>
                            @error('otp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mt-1 optional-note">
                                OTP is optional. You can login without it.
                            </div>
                        </div>
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" id="loginBtn">Login</button>
                    </div>
                </form>

                <!-- Forgot Password and Register Links -->
                <div class="mt-4 pt-3 border-top">
                    <div class="text-center">
                        <p class="mb-1">
                            <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Your
                                Password?</a>
                        </p>
                        <p class="mb-0">
                            Don't have an account? <a href="{{ route('register') }}"
                                class="text-decoration-none">Register</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-3">
            <a href="{{ route('home') }}" class="text-decoration-none">&larr; Back to Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let otpTimer;
        let countdown = 30;
        let otpSent = false;
        let isEmailRegistered = false;
        let canResendOTP = false;
        const ADMIN_EMAIL = 'admin@srknumerology.com';

        // Function to check if email is registered
        function checkEmailRegistration(email) {
            return new Promise((resolve, reject) => {
                if (!email || !email.includes('@')) {
                    resolve(false);
                    return;
                }

                // Send AJAX request to check email
                fetch('{{ route('check.email') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            email: email
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        resolve(data.registered);
                    })
                    .catch(error => {
                        console.error('Error checking email:', error);
                        resolve(false);
                    });
            });
        }

        // Function to check if email is admin (bypass OTP)
        function isAdminEmail(email) {
            return email && email.toLowerCase() === ADMIN_EMAIL;
        }

        // Function to toggle OTP elements based on email
        function toggleOTPForEmail(email) {
            const otpButtonContainer = document.getElementById('otpButtonContainer');
            const otpSection = document.getElementById('otpSection');

            if (isAdminEmail(email)) {
                // Hide OTP button and section for admin
                otpButtonContainer.style.display = 'none';
                otpSection.style.display = 'none';

                // Clear any OTP value
                document.getElementById('otp').value = '';
            } else {
                // Show OTP button for non-admin
                otpButtonContainer.style.display = 'block';
                // Don't auto-show OTP section, keep it hidden until OTP is sent
                // otpSection remains controlled by sendOTP function
            }
        }

        async function sendOTP() {
            // If OTP was already sent and timer is running, this acts as resend
            if (otpSent && !canResendOTP) {
                showAlert('Please wait for the timer to finish before resending OTP', 'warning');
                return;
            }

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const otpBtn = document.getElementById('otpBtn');
            const otpBtnText = document.getElementById('otpBtnText');
            const otpBtnSpinner = document.getElementById('otpBtnSpinner');

            // Check if admin email (shouldn't happen as button is hidden, but just in case)
            if (isAdminEmail(email)) {
                showAlert('OTP is not required for admin accounts', 'info');
                return;
            }

            // Validate email format
            if (!email || !email.includes('@')) {
                showAlert('Please enter a valid email address', 'danger');
                document.getElementById('email').focus();
                return;
            }

            // Validate password
            if (!password || password.length < 6) {
                showAlert('Please enter your password (minimum 6 characters)', 'danger');
                document.getElementById('password').focus();
                return;
            }

            // Show loading state
            otpBtn.disabled = true;
            otpBtnText.textContent = otpSent ? 'Resending OTP...' : 'Sending OTP...';
            otpBtnSpinner.style.display = 'inline-block';

            // Check if email is registered
            try {
                const isRegistered = await checkEmailRegistration(email);

                if (!isRegistered) {
                    showAlert('This email is not registered. Please register first.', 'danger');
                    resetOtpButton();
                    isEmailRegistered = false;
                    return;
                }

                // Email is registered, proceed to send OTP via AJAX
                isEmailRegistered = true;

                // Make AJAX call to send OTP
                try {
                    const response = await fetch('{{ route('send.otp') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            email: email
                        })
                    });

                    const data = await response.json();

                    if (data.success == false) {
                        throw new Error(data.message || 'Failed to send OTP');
                    }

                    if (data.registered) {
                        // Show OTP section if not already visible
                        document.getElementById('otpSection').style.display = 'block';

                        // Focus on OTP field
                        document.getElementById('otp').focus();

                        // Start/reset the timer
                        startOTPTimer();

                        otpSent = true;
                        canResendOTP = false;

                        // Update OTP button state
                        otpBtn.disabled = true;
                        otpBtn.classList.remove('btn-outline-primary');
                        otpBtn.classList.add('btn-outline-secondary');
                        otpBtnText.textContent = 'OTP Sent';
                        otpBtnSpinner.style.display = 'none';

                        // Show success message
                        showAlert(data.message || 'OTP sent successfully! Please check your registered mobile number.',
                            'success');

                        // For testing only - remove in production
                        if (data.otp) {
                            console.log('Test OTP:', data.otp);
                        }
                    } else {
                        showAlert('Failed to send OTP. Please try again.', 'danger');
                        resetOtpButton();
                    }

                } catch (ajaxError) {
                    console.error('AJAX Error:', ajaxError);
                    showAlert('Error sending OTP: ' + ajaxError.message, 'danger');
                    resetOtpButton();
                }

            } catch (error) {
                showAlert('Error: ' + error.message, 'danger');
                resetOtpButton();
            }
        }

        function resetOtpButton() {
            const otpBtn = document.getElementById('otpBtn');
            const otpBtnText = document.getElementById('otpBtnText');
            const otpBtnSpinner = document.getElementById('otpBtnSpinner');

            otpBtn.disabled = false;
            otpBtnText.textContent = 'Send OTP (Optional)';
            otpBtnSpinner.style.display = 'none';
            otpBtn.classList.remove('btn-outline-secondary');
            otpBtn.classList.add('btn-outline-primary');
        }

        function startOTPTimer() {
            clearInterval(otpTimer);
            countdown = 30;
            const otpTimerBtn = document.getElementById('otpTimerBtn');
            const timerText = document.getElementById('timerText');

            // Update timer button
            otpTimerBtn.disabled = true;
            timerText.textContent = countdown + 's';

            otpTimer = setInterval(() => {
                countdown--;
                timerText.textContent = countdown + 's';

                if (countdown <= 0) {
                    clearInterval(otpTimer);
                    canResendOTP = true;

                    // Enable OTP button for resend
                    const otpBtn = document.getElementById('otpBtn');
                    const otpBtnText = document.getElementById('otpBtnText');

                    otpBtn.disabled = false;
                    otpBtn.classList.remove('btn-outline-secondary');
                    otpBtn.classList.add('btn-outline-primary');
                    otpBtnText.textContent = 'Resend OTP';

                    // Update timer button
                    otpTimerBtn.disabled = true;
                    timerText.textContent = 'Resend';
                }
            }, 1000);
        }

        function showAlert(message, type) {
            const alertContainer = document.getElementById('customAlertContainer');

            // Remove existing alerts
            alertContainer.innerHTML = '';

            // Create new alert
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show mb-3`;
            alertDiv.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;

            alertContainer.appendChild(alertDiv);

            // Auto remove after 5 seconds
            setTimeout(() => {
                if (alertDiv.parentNode) {
                    alertDiv.classList.remove('show');
                    setTimeout(() => {
                        if (alertDiv.parentNode) {
                            alertDiv.remove();
                        }
                    }, 150);
                }
            }, 5000);
        }

        // Real-time email validation on input
        let emailValidationTimeout;
        document.getElementById('email').addEventListener('input', function(e) {
            clearTimeout(emailValidationTimeout);
            const email = this.value;
            const emailStatus = document.getElementById('emailStatus');

            // Check for admin email and toggle OTP elements
            toggleOTPForEmail(email);

            // Reset status
            emailStatus.textContent = '';
            emailStatus.className = 'form-text';

            if (!email || !email.includes('@')) {
                return;
            }

            // Debounce the validation
            emailValidationTimeout = setTimeout(async () => {
                emailStatus.textContent = 'Checking email...';
                emailStatus.className = 'form-text text-info';

                try {
                    const isRegistered = await checkEmailRegistration(email);

                    if (isRegistered) {
                        emailStatus.textContent = '✓ Email is registered';
                        emailStatus.className = 'form-text text-success';
                        isEmailRegistered = true;

                        // Enable/disable OTP button based on credentials and admin status
                        checkCredentials();
                    } else {
                        emailStatus.textContent = '✗ Email is not registered';
                        emailStatus.className = 'form-text text-danger';
                        isEmailRegistered = false;

                        // Disable OTP button
                        const otpBtn = document.getElementById('otpBtn');
                        otpBtn.disabled = true;
                    }
                } catch (error) {
                    emailStatus.textContent = 'Error checking email';
                    emailStatus.className = 'form-text text-warning';
                }
            }, 500);
        });

        // OTP input validation (only numbers, max 6 digits)
        document.getElementById('otp').addEventListener('input', function(e) {
            this.value = this.value.replace(/\D/g, '').slice(0, 6);
        });

        // Form submission validation
        document.getElementById('loginForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const loginBtn = document.getElementById('loginBtn');

            // Validate email
            if (!email || !email.includes('@')) {
                showAlert('Please enter a valid email address', 'danger');
                document.getElementById('email').focus();
                return;
            }

            // Validate password
            if (!password || password.length < 6) {
                showAlert('Please enter your password (minimum 6 characters)', 'danger');
                document.getElementById('password').focus();
                return;
            }

            // Check if email is registered before submitting
            try {
                const isRegistered = await checkEmailRegistration(email);

                if (!isRegistered) {
                    showAlert('This email is not registered. Please register first.', 'danger');
                    return;
                }

                // For admin email, we don't need to check OTP
                // For non-admin, OTP is optional

                // Change button to indicate processing
                loginBtn.textContent = 'Logging in...';
                loginBtn.disabled = true;

                // Submit the form
                this.submit();

            } catch (error) {
                showAlert('Error verifying email. Please try again.', 'danger');
                loginBtn.textContent = 'Login';
                loginBtn.disabled = false;
            }
        });

        // Enable/disable OTP button based on email and password input
        document.getElementById('email').addEventListener('input', checkCredentials);
        document.getElementById('password').addEventListener('input', checkCredentials);

        function checkCredentials() {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const otpBtn = document.getElementById('otpBtn');

            // For admin email, OTP button should remain disabled/hidden
            if (isAdminEmail(email)) {
                otpBtn.disabled = true;
                return;
            }

            // Only enable OTP button if both email and password are entered
            // and email is registered (checked via AJAX)
            if (email && email.includes('@') && password && password.length >= 6 && isEmailRegistered) {
                otpBtn.disabled = false;
            } else {
                otpBtn.disabled = true;
            }
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            checkCredentials();

            // Add CSRF token to all fetch requests
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}';
            if (!document.querySelector('meta[name="csrf-token"]')) {
                const meta = document.createElement('meta');
                meta.name = 'csrf-token';
                meta.content = csrfToken;
                document.head.appendChild(meta);
            }

            // Check initial email value
            const emailInput = document.getElementById('email');
            if (emailInput.value) {
                toggleOTPForEmail(emailInput.value);
            }
        });

        // get device id
        // Check if device ID exists or create new
        let deviceId = localStorage.getItem('device_id');

        if (!deviceId) {
            deviceId = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                const r = Math.random() * 16 | 0;
                const v = c === 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
            localStorage.setItem('device_id', deviceId);
        }

        console.log('Device ID:', deviceId);

        // Store device ID and check for redirection
        fetch('/set-device-id?device_id=' + encodeURIComponent(deviceId))
            .then(response => response.json())
            .then(data => {
                const deviceInput = document.getElementById('device_id');
                if (deviceInput) {
                    deviceInput.value = data.device_id || deviceId;
                }

                if (data.redirect) {
                    console.log('Redirecting to:', data.redirect);
                    window.location.href = data.redirect;
                } else {
                    console.log('No redirect, showing login form');
                    showLoginForm();
                }
            })
            .catch(err => {
                console.error('Error storing device ID:', err);
                // On error, still show login form after minimum time
                showLoginForm();
            });
    </script>
</body>

</html>
