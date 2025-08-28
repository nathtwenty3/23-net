<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Role;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Role::whereNull('deleted_at')->get();
        return view('roles.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required|unique:roles|max:50',
        //     'description' => 'max:200'
        // ]);

        // Role::create([
        //     'name' => $request->name,
        //     'description' => $request->description
        // ]);

        // return redirect()->route('role.index');
        // return redirect()->route('role.index')->with('success', 'Add successfully.');
        return redirect()->back()->with('success', 'Add successfully.');
        
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $row = Role::FindOrFail($id);
        return view('roles.edit', compact('row'));
    }

    public function update(Request $request, string $id)
    {
        $row = Role::FindOrFail($id);
        $validated = $request->validate([
            'name' => 'required|unique:roles,name,'.$id.'|max:50',
            'description' => 'max:200'
        ]);

        $row->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('role.index');
    }

    public function destroy(string $id)
    {
        $row = Role::findOrFail($id);
        $row->delete();
        return redirect()->route('role.index');
    }
}
