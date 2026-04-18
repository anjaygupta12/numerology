<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the home page with packages.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $packages = Package::where('active', true)->get();
        
        $purchasablePackages = [];
        $pendingPackages = [];
        $purchasedPackages = [];
        
        if (Auth::check()) {
            $user = Auth::user();
            
            // Get user's orders
            $userOrders = Order::where('user_id', $user->id)->get();
            
            // Get package IDs with completed orders
            $completedPackageIds = $userOrders->where('status', 'completed')
                ->pluck('package_id')
                ->toArray();
                
            // Get package IDs with pending orders
            $pendingPackageIds = $userOrders->where('status', 'pending')
                ->pluck('package_id')
                ->toArray();
            
            foreach ($packages as $package) {
                if (in_array($package->id, $completedPackageIds)) {
                    // User has already purchased this package
                    $purchasedPackages[] = $package;
                } elseif (in_array($package->id, $pendingPackageIds)) {
                    // User has a pending order for this package
                    $pendingPackages[] = $package;
                } else {
                    // User can purchase this package
                    $purchasablePackages[] = $package;
                }
            }
        } else {
            // If user is not logged in, all packages are purchasable
            $purchasablePackages = $packages;
        }
        
        return view('home', compact('packages', 'purchasablePackages', 'pendingPackages', 'purchasedPackages'));
    }

    /**
     * Show the about page.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Show the contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Process the contact form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Here you would typically send an email or store the contact message
        // For now, we'll just redirect with a success message

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }
}
