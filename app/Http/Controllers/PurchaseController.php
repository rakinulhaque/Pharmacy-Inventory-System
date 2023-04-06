<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller {


    public function index() {

        $brand = DB::table('brand')->get();
        $product = DB::table('product')->get();
        $supplier = DB::table('supplier')->get();

        return view('purchase')->with("brand", $brand)->with("product", $product)->with("supplier", $supplier);
    }


    public function store(Request $request) {

        $find_product = DB::table('purchase')->where("product_name", $request->product_name)->get();

        foreach ($find_product as $value) {

            if ($value->product_name == $request->product_name  && $value->supplier_name == $request->supplier_name && $value->purchase_price == $request->purchase_price && $value->sale_price == $request->sale_price) {

                $updated_quantity = $value->product_quantity + $request->product_quantity;
                $purchase_update = Purchase::find($value->purchase_id);
                $purchase_update['product_name'] = $request->product_name;
                $purchase_update['supplier_name'] = $request->supplier_name;
                $purchase_update['product_quantity'] = $updated_quantity;
                $purchase_update['purchase_price'] = $request->purchase_price;
                $purchase_update['sale_price'] = $request->sale_price;
                $purchase_update->update();

                // $brand = DB::table('brand')->get();
                // $product = DB::table('product')->get();
                // $supplier = DB::table('supplier')->get();

                return redirect('/stoke');
                // return view('purchase')->with("brand", $brand)->with("product", $product)->with("supplier", $supplier);

            }
        }

        $purchase = new Purchase;
        $purchase['product_name'] = $request->product_name;
        $purchase['supplier_name'] = $request->supplier_name;
        $purchase['product_quantity'] = $request->product_quantity;
        $purchase['purchase_price'] = $request->purchase_price;
        $purchase['sale_price'] = $request->sale_price;
        $purchase->save();

        // $brand = DB::table('brand')->get();
        // $product = DB::table('product')->get();
        // $supplier = DB::table('supplier')->get();

        return redirect('stoke');
        // return view('purchase')->with("brand", $brand)->with("product", $product)->with("supplier", $supplier);
    }

    
    public function show(Request $request) {

        $purchase = DB::table('purchase')->get();
        return view('stoke')->with("purchase", $purchase);
    }


}
