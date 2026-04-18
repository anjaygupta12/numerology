<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdYogaPrediction;

class AdYogaPredictionController extends Controller
{

    public function index()
    {
        $yogaPredictions = AdYogaPrediction::paginate(30);
        return view('admin.ad-yogas-prediction.index', compact('yogaPredictions'));
    }

    public function create()
    {
        return view('admin.ad-yogas-prediction.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'combination' => 'required',
            'description' => 'nullable|string|max:65535',
            'type'=>'required'
        ]);

        AdYogaPrediction::create($validated);

        return redirect()->route('admin.ad-yoga-prediction.index') // ✅ fixed route name
            ->with('success', 'Combination created successfully.');
    }

    public function show(AdYogaPrediction $AdYogaPrediction)
    {
        return view('admin.ad-yogas-prediction.show', compact('AdYogaPrediction')); // ✅ fixed variable name
    }

    public function edit(AdYogaPrediction $AdYogaPrediction)
    {

        return view('admin.ad-yogas-prediction.edit', compact('AdYogaPrediction')); // ✅ fixed variable name
    }

    public function update(Request $request, AdYogaPrediction $AdYogaPrediction)
    {
        $validated = $request->validate([
            'combination' => 'required',
            'description' => 'nullable|string|max:65535',
            'type'=> 'required'
        ]);

        $AdYogaPrediction->update($validated);

        return redirect()->route('admin.ad-yoga-prediction.index')
            ->with('success', 'Combination updated successfully.');
    }

    public function destroy(AdYogaPrediction $AdYogaPrediction)
    {
        $AdYogaPrediction->delete();

        return redirect()->route('admin.ad-yoga-prediction.index')
            ->with('success', 'Combination deleted successfully.');
    }
}
