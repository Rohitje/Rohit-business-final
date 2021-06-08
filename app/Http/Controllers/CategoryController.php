<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{   
    public function __construct()
    {
        $this -> middleware('auth');
    }

    //All Category
    public function Allcat()
    {   
        //User_id veranderen naar de naam van de user
        /* $categories = DB::table('categories')
            -> join('users', 'categories.user_id', 'users.id')
            -> select('categories.*', 'users.name')
            -> latest() -> paginate(5); */

        //Eloquent ORM insert data
        $categories = Category::latest() -> paginate(5);

        //Eloquent ORM delete data to thrash
        $trashCat = Category::onlyTrashed() -> latest() -> paginate(3);

        //Query Builder insert data
        //$categories = DB::table('categories') -> latest() -> paginate(5);

        return view('admin.category.index', compact('categories', 'trashCat'));
    }

    //Add Category
    public function Addcat(Request $request)
    {
        $validatedData = $request -> validate
        ([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Aub type een categorie naam in.',
            'category_name.max' => 'Categorie naam moet minder dan 255 karakters zijn.',
        ]);
        
        //Eloquent ORM
        /* Category::insert
        ([
            'category_name' => $request -> category_name,
            'user_id' => Auth::user() -> id,
            'created_at' => Carbon::now()
        ]); */
        
        //De professionele manier
        /* $category = new Category;
        $category -> category_name = $request -> category_name;
        $category -> user_id = Auth::user() -> id;
        $category -> save(); */
        
        //Query Builder
        $data = array();
        $data['category_name'] = $request -> category_name;
        $data['user_id'] = Auth::user() -> id;
        DB::table('categories') -> insert($data);
        $notification = array
        (
            'message' => 'Categorie successvol toegevoegd!',
            'alert-type' => 'success'
        );
        return Redirect() -> back() -> with($notification);
    }

    //Edit Category
    public function Editcat($id)
    {
        //Eloquent ORM
        //$categories = Category::find($id);

        //Query Builder
        $categories = DB::table('categories') -> where('id', $id) -> first();
        return view('admin.category.edit', compact('categories'));
    }

    //Update Category
    public function Updatecat(Request $request, $id)
    {
        //Eloquent ORM
        /* $update = Category::find($id) -> update
        ([
            'category_name' => $request -> category_name,
            'user_id' => Auth::user() -> id
        ]); */

        //Query Builder
        $data = array();
        $data['category_name'] = $request -> category_name;
        $data['user_id'] = Auth::user() -> id;
        DB::table('categories') -> where('id', $id) -> update($data);
        $notification = array
        (
            'message' => 'Categorie successvol geupdatet',
            'alert-type' => 'success'
        );
        return Redirect() -> route('all.category') -> with($notification);
    }

    //Soft Delete Category
    public function SoftDeletecat($id)
    {
        $delete = Category::find($id) -> delete();
        $notification = array
        (
            'message' => 'Categorie successvol verwijderd naar de vuilbak!',
            'alert-type' => 'warning'
        );
        return Redirect() -> back() -> with($notification);
    }

    //Restore Category
    public function Restorecat($id)
    {
        $delete = Category::withTrashed() -> find($id) -> restore();
        $notification = array
        (
            'message' => 'Categorie successfvol hersteld!',
            'alert-type' => 'info'
        );
        return Redirect() -> back() -> with($notification);
    }
    
    //Delete Category Forever
    public function PDeletecat($id)
    {
        $delete = Category::onlyTrashed() ->  find($id) -> forceDelete();
        $notification = array
        (
            'message' => 'Categorie successvol voorgoed verwijderd!',
            'alert-type' => 'error'
        );
        return Redirect() -> back() -> with($notification);
    }
}
