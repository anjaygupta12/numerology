<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the user's orders.
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

        return view('user.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new order.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create(Package $package)
    {
        $user = Auth::user();

        // Check if user has already purchased this package (completed order)
        $completedOrder = Order::where('user_id', $user->id)
            ->where('package_id', $package->id)
            ->where('status', 'completed')
            ->first();

        if ($completedOrder) {
            return redirect()->route('home')
                ->with('error', 'You have already purchased this package.');
        }

        // Check if user has a pending order for this package
        $pendingOrder = Order::where('user_id', $user->id)
            ->where('package_id', $package->id)
            ->where('status', 'pending')
            ->first();

        if ($pendingOrder) {
            return redirect()->route('user.orders.show', $pendingOrder)
                ->with('error', 'You already have a pending order for this package. Please wait for it to be processed or contact admin to cancel it.');
        }

        return view('user.orders.create', compact('package'));
    }

    /**
     * Store a newly created order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Package $package)
    {
        $user = Auth::user();

        // Double-check if user has already purchased this package (completed order)
        $completedOrder = Order::where('user_id', $user->id)
            ->where('package_id', $package->id)
            ->where('status', 'completed')
            ->first();

        if ($completedOrder) {
            return redirect()->route('home')
                ->with('error', 'You have already purchased this package.');
        }

        // Double-check if user has a pending order for this package
        $pendingOrder = Order::where('user_id', $user->id)
            ->where('package_id', $package->id)
            ->where('status', 'pending')
            ->first();

        if ($pendingOrder) {
            return redirect()->route('user.orders.show', $pendingOrder)
                ->with('error', 'You already have a pending order for this package. Please wait for it to be processed or contact admin to cancel it.');
        }

        $validated = $request->validate([
            'amount' => 'required|numeric|min:' . $package->price,
            'payment_method' => 'required|string',
            'payment_screenshot' => 'required|image|max:2048',
            'description' => 'nullable|string',
        ]);

        // Handle file upload
        if ($request->hasFile('payment_screenshot')) {
            $path = $request->file('payment_screenshot')->store('payment_screenshots', 'public');
            $validated['payment_screenshot'] = $path;
        }

        $order = new Order([
            'user_id' => $user->id,
            'package_id' => $package->id,
            'amount' => $validated['amount'],
            'payment_method' => $validated['payment_method'],
            'payment_screenshot' => $validated['payment_screenshot'],
            'description' => $validated['description'],
            'status' => 'pending',
        ]);

        $order->save();

        return redirect()->route('user.orders.index')
            ->with('success', 'Order placed successfully. We will process your payment shortly.');
    }

    /**
     * Display the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function show(Order $order)
    {
        // Ensure the order belongs to the authenticated user
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $order->load('package');
        return view('user.orders.show', compact('order'));
    }
}
