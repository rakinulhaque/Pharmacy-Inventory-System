<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {


    public function index() {

        $select_category = DB::table('category')->get();
        return view('add_product')->with('select_category', $select_category);
    }

   
    public function store(Request $request) {

        $product = new Product;
        $product['product_name'] = $request->product_name;
        $product['product_description'] = $request->product_description;
        $product['product_code'] = $request->product_name;
        $product->save();

        return redirect('/manage-product');
    }

   
    public function show() {

        $product = DB::table('product')->get();
        return view('manage_product')->with("product", $product);
    }

    
    public function edit(Request $request) {

        $product = DB::table('product')->where('product_id', $request->product_id)->get();
        $select_category = DB::table('category')->get();

        return view('edit_product')->with("product", $product)->with('select_category', $select_category);
    }

   
    public function update(Request $request, $id) {

        $product = Product::find($id);
        $product['product_name'] = $request->product_name;
        $product['product_description'] = $request->product_description;
        $product['product_code'] = $request->product_name;
        $product->update();

        return redirect('manage-product');
    }

  
    public function destroy(Request $request) {

        DB::table('product')->where('product_id', $request->product_id)->delete();

        return redirect('/manage-product');
    }

}
