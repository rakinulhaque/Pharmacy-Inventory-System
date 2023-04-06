<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        return view('add_supplier');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {


        $supplier = new Supplier;
        $supplier['supplier_name'] = $request->supplier_name;
        $supplier['supplier_Phone_num'] = $request->supplier_Phone_num;

        $supplier->save();

        return redirect('manage-supplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show() {


        $Supplier = DB::table('supplier')->get();
        return view('manage_supplier')->with("supplier", $Supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {


        $supplier = DB::table('supplier')->where('supplier_id', $request->supplier_id)->get();

        return view('edit_supplier')->with("supplier", $supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $supplier = Supplier::find($id);      
        $supplier ['supplier_name'] = $request->supplier_name;
        $supplier ['supplier_Phone_num'] = $request->supplier_Phone_num;
        $supplier->update();
        
        return redirect('manage-supplier');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {

        DB::table('supplier')->where('supplier_id', $request->supplier_id)->delete();

        return redirect('/manage-supplier');
    }

}
