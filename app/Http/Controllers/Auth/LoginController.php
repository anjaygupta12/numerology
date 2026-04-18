<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'registered' => $user !== null
        ]);
    }

    public function setDeviceId(Request $request)
    {

        $deviceId = $request->query('device_id');
         $segment2 = $request->query('logiedIn');

        if (!$deviceId) {
            return response()->json(['error' => 'Device ID missing'], 400);
        }
        $user = User::where('device_id', $deviceId)->first();
        if ($user) {
             if (!$segment2) {

            Auth::login($user);

            if ($user->role === 'admin') {
                $url = '/admin/dashboard';
            } else {
                $url = '/user/dashboard';
            }

            return response()->json([
                'device_id' => $deviceId,
                'redirect' => $url
            ]);
             }else{
                return response()->json([
                'device_id' => $deviceId,
                'redirect' => null
            ]);
             }
        }else{
             if ($segment2 == 1) {
             Auth::logout();
              return response()->json([
                'device_id' => $deviceId,
                'redirect' => '/login'
            ]);
             }
        }
        return response()->json([
            'device_id' => $deviceId,
            'redirect' => null
        ]);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'otp' => ['required'],
        ]);
        $user = User::where('email', $request->email)
            ->whereNotNull('device_id')
            ->exists();

        if ($user) {
            return back()->withErrors([
                'email' => 'You cannot login. This account is already active on another device.',
            ]);
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();
            $user->update(['device_id' => $request->device_id]);

            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard'));
            } else {
                return redirect()->intended(route('user.dashboard'));
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
     public function login(Request $request)
      {
          // Special admin email
          $isSuperAdmin = $request->email === 'admin@srknumerology.com';

          // Validation
          $rules = [
              'email' => ['required', 'email'],
              'password' => ['required'],
          ];

          // OTP required only if NOT super admin
          if (!$isSuperAdmin) {
              $rules['otp'] = ['required'];
          }

          $credentials = $request->validate($rules);

          // Check device login restriction
          $userExists = User::where('email', $request->email)
              ->whereNotNull('device_id')
              ->exists();

          if ($userExists && !$isSuperAdmin) {
              return back()->withErrors([
                  'email' => 'You cannot login. This account is already active on another device.',
              ]);
          }

          // Remove OTP from credentials before Auth attempt
          unset($credentials['otp']);

          if (Auth::attempt($credentials, $request->boolean('remember'))) {
              $request->session()->regenerate();

              $user = Auth::user();

              // Update device_id except for admin bypass
              if (!$isSuperAdmin) {
                  $user->update(['device_id' => $request->device_id]);
              }

              if ($user->role === 'admin') {
                  return redirect()->intended(route('admin.dashboard'));
              } else {
                  return redirect()->intended(route('user.dashboard'));
              }
          }

          return back()->withErrors([
              'email' => 'The provided credentials do not match our records.',
          ])->onlyInput('email');
      }


public function sendOTP(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return response()->json([
            'success' => false,
            'registered' => false,
            'message' => 'Email not registered'
        ]);
    }

    // Generate OTP
    $otp = rand(100000, 999999);

    // Save OTP in DB
    $user->update([
        'otp' => 123456,
        'expires_at' => now()->addMinutes(5)
    ]);

try {

    Mail::to($user->email)->send(new SendOtpMail($otp));

} catch (\Exception $e) {

    return back()->with('error', 'Mail sending failed: ' . $e->getMessage());
}
    return response()->json([
        'registered' => true,
        'success' => true,
        'message' => 'OTP sent successfully on your registered Email'
    ]);
}
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
