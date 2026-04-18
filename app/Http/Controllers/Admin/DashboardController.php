<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalUsers = User::where('role', 'user')->count();
        $totalPackages = Package::count();
        $totalOrders = Order::count();
        $recentOrders = Order::with(['user', 'package'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $pendingOrders = Order::where('status', 'pending')->count();
        $completedOrders = Order::where('status', 'completed')->count();
        
        return view('admin.dashboard', compact(
            'totalUsers',
            'totalPackages',
            'totalOrders',
            'recentOrders',
            'pendingOrders',
            'completedOrders'
        ));
    }
}
