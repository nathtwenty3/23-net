<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Exception;
class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = SiteSetting::whereNull('deleted_at')->get();
        return view('site_setting.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('site_setting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate= $request->validate([
            'title' => 'required|unique:site_settings|max:100',
            'description' => 'nullable|max:200',
            'content' => 'max:200',
            'facebook'=> 'nullable|max:100',
            'telegram'=> 'nullable|max:100',
            'youtube'=> 'nullable|max:100',
            'logo'=> 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try{
            if ($request->hasFile('logo')) {         
                $file = $request->file('logo');
                $extention = $file->getClientOriginalExtension();
                $filename = date('YmdHis') . '.' . $extention;
                $file->move(public_path('uploads/sites'), $filename);
                $imagePath = $filename;
            }
            SiteSetting::create([
                'title'     => $request->title,
                'description'=> $request->description,
                'content'   => $request->input('content'),
                'facebook'  => $request->facebook,
                'telegram'  => $request->telegram,
                'youtube'   => $request->youtube,
                'logo'      => isset($imagePath) ? $imagePath : null,
            ]);

            return redirect()->route('site_setting.index')->with('success', 'Add successfully.');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('error','Error: '.$e->getMessage());
        }
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
        $row = SiteSetting::FindOrFail($id);
        return view('site_setting.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = SiteSetting::FindOrFail($id);
        $validate = $request->validate([
            'title' => 'required|unique:site_settings,title,'. $id .'max:100',
            'description' => 'nullable|max:200',
            'content' => 'max:200',
            'facebook' => 'nullable|max:100',
            'telegram' => 'nullable|max:100',
            'youtube' => 'nullable|max:100',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        try {

            # យករូបភាពចាស់បើគ្មានការប្ដូររូបភាពថ្មី
            $imagePath = $row->logo;

            if ($request->hasFile('logo')) {

                $file = $request->file('logo');
                $extention = $file->getClientOriginalExtension();
                $filename = date('YmdHis') . '.' . $extention;
                $file->move(public_path('uploads/sites'), $filename);
                $imagePath = $filename;

                # លុបរូបចាស់ប្រសិនបើមាន​
                if ($row->logo && file_exists(public_path('uploads/sites/' . $row->logo))) {
                    unlink(public_path('uploads/sites/' . $row->logo));
                }
            }
            
            $row->update([  
                'title' => $request->title,
                'description' => $request->description,
                'content' => $request->input('content'),
                'facebook' => $request->facebook,
                'telegram' => $request->telegram,
                'youtube' => $request->youtube,
                'logo' => $imagePath,
            ]);
            return redirect()->route('site_setting.index')->with('success', 'Add successfully.');

        } catch (Exception $e) {
           dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $site = SiteSetting::findOrFail($id);

        if ($site->logo && file_exists(public_path($site->logo))) {
            unlink(public_path('uploads/sites/' . $site->logo));
        }
        $site->delete();
        return redirect()->route('site_setting.index')->with('success','delete successfully.');
    }
}
