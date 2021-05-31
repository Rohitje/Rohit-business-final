<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function HomeSlider()
    {
        //Eloquent ORM
        $sliders = Slider::latest() -> get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider()
    {
        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request)
    {
        $slider_image = $request -> file('image');
        
        //Image Intervention
        $name_generate = hexdec(uniqid()) . '.' . $slider_image -> getClientOriginalExtension();
        Image::make($slider_image) -> resize(1920, 1080) -> save('images/slider/' . $name_generate);
        
        $last_image = 'images/slider/' . $name_generate;
        
        //Eloquent ORM
        Slider::insert
        ([
            'title' => $request -> title,
            'description' => $request -> description,
            'image' => $last_image,
            'created_at' => Carbon::now()
        ]);

        $notification = array
        (
            'message' => 'Slider successfully inserted!',
            'alert-type' => 'success'
        );
        return Redirect() -> route('home.slider') -> with($notification);
    }

    public function EditSlider($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }
    
    public function UpdateSlider(Request $request, $id)
    {
        $update = Slider::find($id) -> update
        ([
            'title' => $request -> title,
            'description' => $request -> description,
            'image' => $request -> image
        ]);

        $notification = array
        (
            'message' => 'Slider successfully updated!',
            'alert-type' => 'info'
        );
        return Redirect() -> route('home.slider') -> with($notification);
    }

    public function DeleteSlider($id)
    {
        $delete = Slider::find($id) -> Delete();

        $notification = array
        (
            'message' => 'Slider successfully deleted!',
            'alert-type' => 'error'
        );
        return Redirect() -> back() -> with($notification);
    }
}
