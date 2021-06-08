<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeAboutController extends Controller
{
    public function HomeAbout()
    {
        $homeAbout = HomeAbout::latest() -> get();
        return view('admin.home.index', compact('homeAbout'));
    }

    public function AddAbout()
    {
        return view('admin.home.create');
    }

    public function StoreAbout(Request $request)
    {
        //Eloquent ORM
        $homeAbout = HomeAbout::insert
        ([
            'title_about' => $request -> title_about,
            'short_desc' => $request -> short_desc,
            'long_desc' => $request -> long_desc,
            'created_at' => Carbon::now()
        ]);

        $notification = array
        (
            'message' => 'Over successvol toegevoegd!',
            'alert-type' => 'success'
        );
        return Redirect() -> route('home.about') -> with($notification);
    }

    public function EditAbout($id)
    {
        $homeAbout = HomeAbout::find($id);
        return view('admin.home.edit', compact('homeAbout'));
    }

    public function UpdateAbout(Request $request, $id)
    {
        $update = HomeAbout::find($id) -> update
        ([
            'title_about' => $request -> title_about,
            'short_desc' => $request -> short_desc,
            'long_desc' => $request -> long_desc,
        ]);

        $notification = array
        (
            'message' => 'Over successvol geupdatet!',
            'alert-type' => 'error'
        );
        return Redirect() -> route('home.about') -> with($notification);
    }

    public function DeleteAbout($id)
    {
        $delete = HomeAbout::find($id) -> Delete();
        $notification = array
        (
            'message' => 'Over successvol verwijderd!',
            'alert-type' => 'error'
        );
        return Redirect() -> back() -> with($notification);
    }
}