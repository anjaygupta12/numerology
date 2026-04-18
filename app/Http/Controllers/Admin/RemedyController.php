<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Remedy;
use Illuminate\Http\Request;

class RemedyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $remedies = Remedy::orderBy('number')->paginate(10);
        return view('admin.remedies.index', compact('remedies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.remedies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|integer|min:1|max:9|unique:remedies,number',
            'bn' => 'nullable|string',
            'dn' => 'nullable|string',
            'nn' => 'nullable|string',
            'status' => 'boolean'
        ]);

        Remedy::create($validated);

        return redirect()->route('admin.remedies.index')
            ->with('success', 'Remedy created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Remedy $remedy)
    {
        return view('admin.remedies.show', compact('remedy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Remedy $remedy)
    {
        return view('admin.remedies.edit', compact('remedy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Remedy $remedy)
    {
        $validated = $request->validate([
            'number' => 'required|integer|min:1|max:9|unique:remedies,number,' . $remedy->id,
            'bn' => 'nullable|string',
            'dn' => 'nullable|string',
            'nn' => 'nullable|string',
            'status' => 'boolean'
        ]);

        $remedy->update($validated);

        return redirect()->route('admin.remedies.index')
            ->with('success', 'Remedy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Remedy $remedy)
    {
        $remedy->delete();

        return redirect()->route('admin.remedies.index')
            ->with('success', 'Remedy deleted successfully.');
    }
}
