<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
            ->with('package')
            ->orderBy('created_at', 'desc')
            ->get();
            
        $pendingOrders = $orders->where('status', 'pending')->count();
        $completedOrders = $orders->where('status', 'completed')->count();
        
        // Get list of pending orders for the dashboard table
        $pendingOrdersList = $orders->where('status', 'pending');
        
        return view('user.dashboard', compact(
            'user',
            'orders',
            'pendingOrders',
            'completedOrders',
            'pendingOrdersList'
        ));
    }
}
