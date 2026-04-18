<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Order::with(['user', 'package'])
            ->orderBy('created_at', 'desc');
            
        // Filter by status if provided
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
        
        $orders = $query->get();
            
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function show(Order $order)
    {
        $order->load(['user', 'package']);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function edit(Order $order)
    {
        $order->load(['user', 'package']);
        $users = \App\Models\User::all();
        $packages = \App\Models\Package::all();
        return view('admin.orders.edit', compact('order', 'users', 'packages'));
    }

    /**
     * Update the specified order in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Order $order)
    {
        // If only updating the status (from the show page)
        if ($request->has('update_status')) {
            $validated = $request->validate([
                'status' => 'required|in:pending,processing,completed,cancelled',
            ]);
            
            $order->update($validated);
            
            return redirect()->route('admin.orders.show', $order)
                ->with('success', 'Order status updated successfully.');
        }
        
        // Full update from the edit page
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'package_id' => 'required|exists:packages,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required|string',
            'status' => 'required|in:pending,processing,completed,cancelled',
            'description' => 'nullable|string',
        ]);

        $order->update($validated);

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified order from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}
