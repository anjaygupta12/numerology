<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\yogaPredictiona;

class yogasPredictionController extends Controller
{
    public function index()
    {
        $yogaPredictions = yogaPredictiona::paginate(30);
        return view('admin.yogas-prediction.index', compact('yogaPredictions'));
    }

    public function create()
    {
        return view('admin.yogas-prediction.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'combination' => 'required',
            'description' => 'nullable|string|max:65535'
        ]);

        yogaPredictiona::create($validated);

        return redirect()->route('admin.yoga-prediction.index') // ✅ fixed route name
            ->with('success', 'Combination created successfully.');
    }

    public function show(yogaPredictiona $yogaPrediction)
    {
        return view('admin.yogas-prediction.show', compact('yogaPrediction')); // ✅ fixed variable name
    }

    public function edit(yogaPredictiona $yogaPrediction)
    {
        return view('admin.yogas-prediction.edit', compact('yogaPrediction')); // ✅ fixed variable name
    }

    public function update(Request $request, yogaPredictiona $yogaPrediction)
    {
        $validated = $request->validate([
            'combination' => 'required',
            'description' => 'nullable|string|max:65535'
        ]);

        $yogaPrediction->update($validated);

        return redirect()->route('admin.yoga-prediction.index') // ✅ fixed route name
            ->with('success', 'Combination updated successfully.');
    }

    public function destroy(yogaPredictiona $yogaPrediction)
    {
        $yogaPrediction->delete();

        return redirect()->route('admin.yoga-prediction.index') // ✅ fixed route name
            ->with('success', 'Combination deleted successfully.');
    }
}
