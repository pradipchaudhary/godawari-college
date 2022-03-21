<?php

namespace App\Http\Controllers;

use App\Models\Banner;
// use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class BannerController extends Controller
{
    public function index()
    {
        // return "Hello ";
        $banner = Banner::all();
        return view('admin.banner.index', compact('banner'));
    }
    public function create()
    {
        return view('admin.banner.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'banner_name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'link' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $banner = new Banner;
        $banner->banner_name = $request->banner_name;
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->link = $request->link;

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $input['file'] = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/thumbnails');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1080, 450, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['file']);
            $destinationPath = public_path('/uploads/banner');
            $image->move($destinationPath, $input['file']);
            $banner->image = $input['file'];
        }

        $banner->save();
        return redirect()->back()->with('status', 'Banner    Successfully');
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        // dd($banner);
        return view('admin.banner.edit', compact('banner'));
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
        $banner = Banner::find($id);
        $banner->banner_name = $request->banner_name;
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->link = $request->link;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $input['file'] = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('/thumbnails');
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(1080, 450, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['file']);
            $destinationPath = public_path('/uploads/banner');
            $image->move($destinationPath, $input['file']);
            $banner->image = $input['file'];
        } else {
            $banner->image = $request->old_image;
        }
        $banner->update();
        return redirect()->back()->with('status', 'Banner Update Successfully');
    }

    public function delete($id)
    {
        $banner = Banner::find($id);
        $destination = 'uploads/banner/' . $banner->image;

        if (File::exists($destination)) {
            File::delete($destination);
        }
        $banner->delete();
        return redirect()->back()->with('status', 'Banner Deleted Successfully');
    }
}
