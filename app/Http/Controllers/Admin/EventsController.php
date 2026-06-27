<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index () {
        $events = Events::all();
        return view('admin.pages.events', compact('events'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'slug'=>'required|unique:events',
            'image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $imageName = null;

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/events'),$imageName);
        }

        Events::create([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'description'=>$request->description,
            'image'=>$imageName,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'tag'=>$request->tag,
            'capacity'=>$request->capacity,
            'location'=>$request->location,
            'price'=>$request->price,
            'featured'=>$request->featured,
            'status'=>$request->status,
        ]);

        return redirect()->back()->with('success','Event Added Successfully.');
    }
    public function edit($id)
    {
        $event = Events::findOrFail($id);
        return response()->json($event);
    }
    public function update(Request $request, Events $event)
    {
        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:events,slug,' . $event->id,
            'description' => 'nullable',
            'image' => 'nullable|image',
            'tag' => 'nullable',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'capacity' => 'nullable|integer',
            'location' => 'nullable',
            'price' => 'nullable|numeric',
            'featured' => 'required|boolean',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($event->image && file_exists(public_path('uploads/events/' . $event->image))) {
                unlink(public_path('uploads/events/' . $event->image));
            }
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/events'), $image);
            $data['image'] = $image;
        }

        $event->update($data);

        return redirect()->back()->with('success', 'Event Updated Successfully.');
    }
    public function delete($id)
    {
        $event = Events::findOrFail($id);

        if ($event->image && file_exists(public_path('uploads/events/' . $event->image))) {
            unlink(public_path('uploads/events/' . $event->image));
        }

        $event->delete();

        return response()->json([
            'success' => true,
            'message' => 'Event deleted successfully.'
        ]);
    }
}
