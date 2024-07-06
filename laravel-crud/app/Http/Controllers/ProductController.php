<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        return view('index');
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        //   dd($request->all());

        // Upload image

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('products'), $imageName);

        // dd($imageName);

        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        return "Data stored successfully";


    }

}

// dd() stands for "Dump and Die". It's a Laravel helper function used for debugging purposes.
// $request->all() retrieves all input data from the request.

// $request->image refers to the uploaded file in the request. This assumes your form has an input field named image (e.g., <input type="file" name="image">). 


// time().'.'.$request->image->extension() generates a unique filename for the uploaded image based on the current timestamp concatenated with the original file extension.


// For example, if the uploaded file is example.jpg and time() returns 1647481398, the $imageName would become 1647481398.jpg.