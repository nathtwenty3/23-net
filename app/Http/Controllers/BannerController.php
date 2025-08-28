<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Banner::whereNull('deleted_at')->get();
        return view('banner.index', compact('rows'));;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required|unique:banners|max:100',
        //     'description' => 'max:200'
        // ]);

        // Banner::create([
        //     'name' => $request->name,
        //     'description' => $request->description
        // ]);

        // return redirect()->route('banner.index');
        return redirect()->route('banner.index')->with('success', 'Add successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Banner::FindOrFail($id);
        return view('banner.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $row = Banner::FindOrFail($id);
        $validated = $request->validate([
            'name' => 'required|unique:banners,name,' . $id . '|max:100',
            'description' => 'max:200'
        ]);

        $row->update([
            'name' => $request->name,
            'description' => $request->description
        ]);
        // return redirect()->back()->with('success', 'Add successfully.');
        return redirect()->route('banner.index')->with('success', 'Add successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Banner::findOrFail($id);
        $row->delete();
        return redirect()->route('banner.index');
    }
}
