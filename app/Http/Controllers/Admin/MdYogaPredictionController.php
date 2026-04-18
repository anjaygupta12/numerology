<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MdYogaPrediction;

class MdYogaPredictionController extends Controller
{

    public function index()
    {
        $yogaPredictions = MdYogaPrediction::paginate(30);
        return view('admin.md-yogas-prediction.index', compact('yogaPredictions'));
    }

    public function create()
    {
        return view('admin.md-yogas-prediction.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'combination' => 'required',
            'description' => 'nullable|string|max:65535'
        ]);

        MdYogaPrediction::create($validated);

        return redirect()->route('admin.md-yoga-prediction.index') // ✅ fixed route name
            ->with('success', 'Combination created successfully.');
    }

    public function show(MdYogaPrediction $MdYogaPrediction)
    {
        return view('admin.md-yogas-prediction.show', compact('MdYogaPrediction')); // ✅ fixed variable name
    }

    public function edit(MdYogaPrediction $MdYogaPrediction)
    {

        return view('admin.md-yogas-prediction.edit', compact('MdYogaPrediction')); // ✅ fixed variable name
    }

    public function update(Request $request, MdYogaPrediction $MdYogaPrediction)
    {
        $validated = $request->validate([
            'combination' => 'required',
            'description' => 'nullable|string|max:65535'
        ]);

        $MdYogaPrediction->update($validated);

        return redirect()->route('admin.md-yoga-prediction.index') // ✅ fixed route name
            ->with('success', 'Combination updated successfully.');
    }

    public function destroy(MdYogaPrediction $MdYogaPrediction)
    {
        $MdYogaPrediction->delete();

        return redirect()->route('admin.md-yoga-prediction.index') // ✅ fixed route name
            ->with('success', 'Combination deleted successfully.');
    }
}
