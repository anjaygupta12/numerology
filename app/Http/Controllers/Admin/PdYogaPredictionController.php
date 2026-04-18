<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PdYogaPrediction;

class PdYogaPredictionController extends Controller
{

    public function index()
    {
        $yogaPredictions = PdYogaPrediction::paginate(30);
        return view('admin.pd-yogas-prediction.index', compact('yogaPredictions'));
    }

    public function create()
    {
        return view('admin.pd-yogas-prediction.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'combination' => 'required',
            'description' => 'nullable|string|max:65535',
            'type'=>'required'
        ]);

        PdYogaPrediction::create($validated);

        return redirect()->route('admin.pd-yoga-prediction.index') // ✅ fixed route name
            ->with('success', 'Combination created successfully.');
    }

    public function show(PdYogaPrediction $PdYogaPrediction)
    {
        return view('admin.pd-yogas-prediction.show', compact('PdYogaPrediction')); // ✅ fixed variable name
    }

    public function edit(PdYogaPrediction $PdYogaPrediction)
    {

        return view('admin.pd-yogas-prediction.edit', compact('PdYogaPrediction')); // ✅ fixed variable name
    }

    public function update(Request $request, PdYogaPrediction $PdYogaPrediction)
    {
        $validated = $request->validate([
            'combination' => 'required',
            'description' => 'nullable|string|max:65535',
            'type'=> 'required'
        ]);

        $PdYogaPrediction->update($validated);

        return redirect()->route('admin.pd-yoga-prediction.index')
            ->with('success', 'Combination updated successfully.');
    }

    public function destroy(PdYogaPrediction $PdYogaPrediction)
    {
        $PdYogaPrediction->delete();

        return redirect()->route('admin.pd-yoga-prediction.index')
            ->with('success', 'Combination deleted successfully.');
    }
}
