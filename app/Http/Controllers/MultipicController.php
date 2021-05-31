<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class MultipicController extends Controller
{
    //Multi Images Methods
    public function Multipic()
    {
        $images = Multipic::all();
        return view('admin.multipic.index', compact('images'));
    }

    public function StoreMultipic(Request $request)
    {
        $images = $request -> file('image');

        foreach($images as $multi_image)
        {
            //Image Intervention
            $name_generate = hexdec(uniqid()) . '.' . $multi_image -> getClientOriginalExtension();
            Image::make($multi_image) -> resize(300, 200) -> save('images/multi/' . $name_generate);
            
            $last_image = 'images/multi/' . $name_generate;
            
            //Eloquent ORM
            Multipic::insert
            ([
                'image' => $last_image,
                'created_at' => Carbon::now()
            ]);

        }

        $notification = array
        (
            'message' => 'Images successfully inserted!',
            'alert-type' => 'success'
        );
        Return Redirect() -> back() -> with($notification);
    }
}
