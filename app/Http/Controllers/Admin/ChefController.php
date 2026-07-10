<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function index()
    {
        $chefs = Chef::latest()->get();
        return view('admin.pages.chefs', compact('chefs'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'fname'        => 'required|string|max:255',
            'lname'        => 'required|string|max:255',
            'designation'  => 'required|string|max:255',
            'description'  => 'required',
            'experience'   => 'required|string|max:255',
            'awards'       => 'nullable|string|max:255',
            'facebook'     => 'nullable|url',
            'instagram'    => 'nullable|url',
            'linkedin'     => 'nullable|url',
            'status'       => 'required|boolean',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $chef = new Chef();

        $chef->fname = $request->fname;
        $chef->lname = $request->lname;
        $chef->designation = $request->designation;
        $chef->description = $request->description;
        $chef->experience = $request->experience;
        $chef->awards = $request->awards;
        $chef->facebook = $request->facebook;
        $chef->instagram = $request->instagram;
        $chef->linkedin = $request->linkedin;
        $chef->status = $request->status;

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/chef'), $imageName);

            $chef->image = $imageName;
        }

        $chef->save();

        return redirect()->back()->with('success', 'Chef added successfully.');
    }
    public function edit($id)
{
    $chef = Chef::findOrFail($id);

    return response()->json($chef);
}
    public function update(Request $request, $id)
    {
        $request->validate([
            'fname'        => 'required|string|max:255',
            'lname'        => 'required|string|max:255',
            'designation'  => 'required|string|max:255',
            'description'  => 'required',
            'experience'   => 'required|string|max:255',
            'awards'       => 'nullable|string|max:255',
            'facebook'     => 'nullable|url',
            'instagram'    => 'nullable|url',
            'linkedin'     => 'nullable|url',
            'status'       => 'required|boolean',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $chef = Chef::findOrFail($id);

        $chef->fname = $request->fname;
        $chef->lname = $request->lname;
        $chef->designation = $request->designation;
        $chef->description = $request->description;
        $chef->experience = $request->experience;
        $chef->awards = $request->awards;
        $chef->facebook = $request->facebook;
        $chef->instagram = $request->instagram;
        $chef->linkedin = $request->linkedin;
        $chef->status = $request->status;

        if ($request->hasFile('image')) {

            if ($chef->image && file_exists(public_path('uploads/chef/' . $chef->image))) {
                unlink(public_path('uploads/chef/' . $chef->image));
            }

            $image = $request->file('image');

            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/chef'), $imageName);

            $chef->image = $imageName;
        }

        $chef->save();

        return redirect()->back()->with('success', 'Chef updated successfully.');
    }
}
