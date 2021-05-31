<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
    }

    //All Brands
    public function AllBrand()
    {
        $brands = Brand::latest() -> paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function StoreBrand(Request $request)
    {
        //Add brand & image
        $validatedData = $request -> validate
        ([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg, jpeg, png'
        ],
        [
            'brand_name.required' => 'Please input a brand name.',
            'brand_image.min' => 'Brand must be longer than 4 characters.'
        ]);

        $brand_image = $request -> file('brand_image');

        /* $name_generate = hexdec(uniqid());
        $image_ext = strtolower($brand_image -> getClientOriginalExtension());
        $image_name = $name_generate . '.' . $image_ext;
        $upload_location = 'images/brand/';
        $last_image = $upload_location . $image_name;
        $brand_image -> move($upload_location, $image_name); */

        //Image Intervention
        $name_generate = hexdec(uniqid()) . '.' . $brand_image -> getClientOriginalExtension();
        Image::make($brand_image) -> resize(300, 200) -> save('images/brand/' . $name_generate);
        
        $last_image = 'images/brand/' . $name_generate;
        
        //Eloquent ORM
        Brand::insert
        ([
            'brand_name' => $request -> brand_name,
            'brand_image' => $last_image,
            'created_at' => Carbon::now()
        ]);

        $notification = array
        (
            'message' => 'Brand successfully inserted!',
            'alert-type' => 'success'
        );

        Return Redirect() -> back() -> with($notification);
    }

    public function EditBrand($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }

    public function UpdateBrand(Request $request, $id)
    {
        $validatedData = $request -> validate
        ([
            'brand_name' => 'required|min:4',
        ],
        [
            'brand_name.required' => 'Please input a brand name.',
            'brand_image.min' => 'Brand must be longer than 4 characters.'
        ]);

        $old_image = $request -> old_image;

        $brand_image = $request -> file('brand_image');

        if($brand_image)
        {
            $name_generate = hexdec(uniqid());
            $image_ext = strtolower($brand_image -> getClientOriginalExtension());
            $image_name = $name_generate . '.' . $image_ext;
            $upload_location = 'images/brand/';
            $last_image = $upload_location . $image_name;
            $brand_image -> move($upload_location, $image_name);
            
            unlink($old_image);
            Brand::find($id) -> update
            ([
                'brand_name' => $request -> brand_name,
                'brand_image' => $last_image,
                'created_at' => Carbon::now()
            ]);
            
            $notification = array
            (
                'message' => 'Brand successfully updated!',
                'alert-type' => 'info'
            );
            Return Redirect() -> back() -> with($notification);
        }
        else
        {
            Brand::find($id) -> update
            ([
                'brand_name' => $request -> brand_name,
                'created_at' => Carbon::now()
            ]);

            $notification = array
            (
                'message' => 'Brand successfully updated!',
                'alert-type' => 'warning'
            );

            Return Redirect() -> back() -> with($notification);
        }
    }

    public function DeleteBrand($id)
    {
        $image = Brand::find($id);
        $old_image = $image -> brand_image;
        echo $old_image;
        unlink($old_image);
        Brand::find($id) -> delete();

        $notification = array
        (
            'message' => 'Brand successfully deleted!',
            'alert-type' => 'error'
        );
        return Redirect() -> back() -> with($notification);
    }

    //Admin Logout
    public function Logout()
    {
        Auth::logout();
        $notification = array
        (
            'message' => 'You are logged out!',
            'alert-type' => 'success'
        );
        return Redirect() -> route('login') -> with($notification);
    }
}
