<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FirstLetterAttribute;
use Illuminate\Http\Request;

class FirstLetterAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $firstLetterAttributes = FirstLetterAttribute::orderBy('letter')->paginate(30);
        return view('admin.first-letter-attributes.index', compact('firstLetterAttributes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.first-letter-attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'letter' => 'required|string|size:1|unique:first_letter_attributes,letter|regex:/^[a-zA-Z]$/',
            'description' => 'nullable|string|max:65535'
        ]);

        FirstLetterAttribute::create($validated);

        return redirect()->route('admin.first-letter-attributes.index')
            ->with('success', 'First Letter Attribute created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FirstLetterAttribute $firstLetterAttribute)
    {
        return view('admin.first-letter-attributes.show', compact('firstLetterAttribute'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FirstLetterAttribute $firstLetterAttribute)
    {
        return view('admin.first-letter-attributes.edit', compact('firstLetterAttribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FirstLetterAttribute $firstLetterAttribute)
    {
        $validated = $request->validate([
            'letter' => 'required|string|size:1|unique:first_letter_attributes,letter,' . $firstLetterAttribute->id . '|regex:/^[a-zA-Z]$/',
            'description' => 'nullable|string|max:65535'
        ]);

        $firstLetterAttribute->update($validated);

        return redirect()->route('admin.first-letter-attributes.index')
            ->with('success', 'First Letter Attribute updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FirstLetterAttribute $firstLetterAttribute)
    {
        $firstLetterAttribute->delete();

        return redirect()->route('admin.first-letter-attributes.index')
            ->with('success', 'First Letter Attribute deleted successfully.');
    }
}
