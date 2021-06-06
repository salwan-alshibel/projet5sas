<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Products_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    
    public function __construct() {
       $this->middleware(['auth']); 
    }
    
    public function index() {
        //dd(auth()->user()->posts);
        return view('dashboard.dashboard_home');
    }

    public function updateProfile(Request $request) {
        if($request->id) {

            //Form validation:
            $this->validate($request, [
                'name' => 'unique:users|max:255',
                'username' => 'unique:users|max:255',
                'email' => 'unique:users|email|confirmed',
            ]);

            $param = [
                ['name' => $request->name],
                ['username' => $request->username],
                ['adress' => $request->adress],
                ['email' => $request->email]
            ];

            foreach ($param as $key => $value) {
                foreach ($value as $key => $value) {
                    if (isset($value)) {
                        DB::table('users')
                        ->where('id', $request->id)
                        ->update([
                            $key => $value,
                        ]);
                    }
                }
            } 
            return back();
        }
        return view('dashboard.dashboard_profile');
    }

    public function updatePassword(Request $request) {
        if($request->id) {
            
            if(Hash::check($request->old_password, auth()->user()->password)){
             
            //Form validation:
            $this->validate($request, [
                'new_password' => 'required|confirmed',
                'new_password_confirmation' => 'same:new_password',
            ]);

            DB::table('users')
                ->where('id', $request->id)
                ->update(['password'=> Hash::make($request->new_password)]);
            return back()->with('new_pwd_succes', 'Mot de passe changé avec succes !');
            }
            return back()->with('old_pwd_error', 'Le mot de passe est incorrect.');
        }
        return view('dashboard.dashboard_password');
    }

    public function myPosts() {
        return view('dashboard.dashboard_posts')->with([
            'posts'=>auth()->user()->posts
        ]);
    }

    public function myActualOrders() {
        return view('dashboard.dashboard_myactualorders');
    }

    public function myOldOrders() {
        return view('dashboard.dashboard_myoldorders');
    }

    //DASHBOARD ADMIN
    public function addProduct(Request $request){
        
        if($request->id) {
            //Form validation:
            $this->validate($request, [
                'title' => 'required|unique:products|max:255',
                'content' => 'required',
                'summary' => 'required',
                'slug' => 'required|unique:products|max:255',
                'quantity' => 'required|integer|min:0|max:999',
                'price' => 'required',
                'shop' => 'required',
                'category_id' => 'required',
                'tag_id' => 'integer',
                'first_img' => 'required|mimes:jpg, png, jpeg, webp|max:5048|unique:products_images',
                'second_img' => 'mimes:jpg, png, jpeg, webp|max:5048|unique:products_images',
                'third_img' => 'mimes:jpg, png, jpeg, webp|max:5048|unique:products_images',
                'fourth_img' => 'mimes:jpg, png, jpeg, webp|max:5048|unique:products_images',
                'fifth_img' => 'mimes:jpg, png, jpeg, webp|max:5048|unique:products_images',
                'sixth_img' => 'mimes:jpg, png, jpeg, webp|max:5048|unique:products_images',
            ]);

            
            $newImageName1 = $this->renameAndUploadImages($request->title, $request->first_img, 1);

            if(isset($request->second_img)) {
                $newImageName2 = $this->renameAndUploadImages($request->title, $request->second_img, 2);
            } else {
                $newImageName2 = NULL;
            }
            if(isset($request->third_img)) {
                $newImageName3 = $this->renameAndUploadImages($request->title, $request->third_img, 3);
            } else {
                $newImageName3 = NULL;
            }
            if(isset($request->fourth_img)) {
                $newImageName4 = $this->renameAndUploadImages($request->title, $request->fourth_img, 4);
            } else {
                $newImageName4 = NULL;
            }
            if(isset($request->fifth_img)) {
                $newImageName5 = $this->renameAndUploadImages($request->title, $request->fifth_img, 5);
            } else {
                $newImageName5 = NULL;
            }
            if(isset($request->sixth_img)) {
                $newImageName6 = $this->renameAndUploadImages($request->title, $request->sixth_img, 6);
            } else {
                $newImageName6 = NULL;
            }
            
            // $newImageName1 = str_replace(' ', '_', $request->title) . '_' . '01' . '.' . $request->first_img->extension();

            // $request->first_img->move(public_path('images\products_images'), $newImageName1);
    
            DB::table('products')->insert(
                ['title' => $request->title,
                'metaTitle' => $request->title,
                'content' => $request->content,
                'summary' => $request->summary,
                'slug' => $request->slug,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'shop' => $request->shop,
                'created_at' => date(now()),
                'updated_at' => date(now()),
                'published_at' => date(now()),
                'category_id' => $request->category_id,
                ]
            );

            $product = DB::table('products')->where('title', $request->title)->get();
 

            DB::table('products_images')->insert(
                ['first_img' => $newImageName1,
                'second_img' => $newImageName2,
                'third_img' => $newImageName3,
                'fourth_img' => $newImageName4,
                'fifth_img' => $newImageName5,
                'sixth_img' => $newImageName6,
                'product_id' => $product[0]->id,
                ]
            );

            if(isset($request->tag_id)) {
                DB::table('product_tag')->insert(
                    [
                    'tag_id' => $request->tag_id,
                    'product_id' => $product[0]->id,
                    ]
                );
            }
            


      
            return back();
        }

            return view('dashboard.admin.dashboard_products_admin');
    }


    public function oldOrders() {
        return view('dashboard.admin.dashboard_oldorders_admin');
    }


    public function newOrders() {
        return view('dashboard.admin.dashboard_neworders_admin');
    }


    public function renameAndUploadImages($title, $image, $number) {
        $newImageName = str_replace(' ', '_', $title) . '_' . 0 .$number . '.' . $image->extension();

        $image->move(public_path('images\products_images'), $newImageName);

        return $newImageName;
    }

}
