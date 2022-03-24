<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $banner = Banner::query()->get();
        $testimonial = Testimonial::query()->get();
        // dd($banner);
        return view('frontend.index', ['banner' => $banner, 'testimonial' => $testimonial]);
    }
}
