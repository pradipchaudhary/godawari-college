<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonial = Testimonial::all();
        // dd($testimonial);
        return  view('admin.testimonial.index', compact('testimonial'));
    }
    public function create()
    {
        return view('admin.testimonial.create');
    }
    //store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'message' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->message  = $request->message;

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $input['file'] = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/thumbnails');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(125, 125, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['file']);
            $destinationPath = public_path('/uploads/testimonial');
            $image->move($destinationPath, $input['file']);
            $testimonial->image = $input['file'];
        }

        $testimonial->save();
        return redirect()->back()->with('status', 'Testimonial add Successfully');
    }
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        // dd($banner);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        // $validatedData = $request->validate([
        //     'banner_name' => 'required',
        //     'title' => 'required',
        //     'description' => 'required',
        //     'link' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        // ]);
        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->message  = $request->message;

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $input['file'] = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/thumbnails');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(125, 125, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['file']);
            $destinationPath = public_path('/uploads/testimonial');
            $image->move($destinationPath, $input['file']);
            $testimonial->image = $input['file'];
        } else {
            $testimonial->image = $request->old_image;
        }
        $testimonial->update();
        return redirect()->back()->with('status', 'Testimonial Update Successfully');
    }

    public function delete($id)
    {
        $testimonial = Testimonial::find($id);
        $destination = 'uploads/testimonial/' . $testimonial->image;

        if (File::exists($destination)) {
            File::delete($destination);
        }
        $testimonial->delete();
        return redirect()->back()->with('status', 'Testimonial Deleted Successfully');
    }
}
