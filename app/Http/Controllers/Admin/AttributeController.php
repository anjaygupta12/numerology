<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    /**
     * Display a listing of the attributes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $attributes = Attribute::orderBy('compound_number', 'desc')->get();
        return view('admin.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new attribute.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.attributes.create');
    }

    /**
     * Store a newly created attribute in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'compound_number' => 'required|integer|unique:attributes,compound_number',
            'description' => 'required|string',
        ]);

        Attribute::create($validated);

        return redirect()->route('admin.attributes.index')
            ->with('success', 'Attribute created successfully.');
    }
    
    /**
     * Display the specified attribute.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\View\View
     */
    public function show(Attribute $attribute)
    {
        return view('admin.attributes.show', compact('attribute'));
    }

    /**
     * Show the form for editing the specified attribute.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\View\View
     */
    public function edit(Attribute $attribute)
    {
        return view('admin.attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified attribute in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Attribute $attribute)
    {
        $validated = $request->validate([
            'compound_number' => 'required|integer|unique:attributes,compound_number,' . $attribute->id,
            'description' => 'required|string',
        ]);

        $attribute->update($validated);

        return redirect()->route('admin.attributes.index')
            ->with('success', 'Attribute updated successfully.');
    }

    /**
     * Remove the specified attribute from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return redirect()->route('admin.attributes.index')
            ->with('success', 'Attribute deleted successfully.');
    }
}
