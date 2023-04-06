<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Order;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller {


    public function index() {



        $message = "";
        $last_sale = DB::table('sale')->get()->last();

        if (empty($last_sale)) {
            $customer_id = 1;

            $order_view = DB::table('order')->where("customer_id", $customer_id)->get();
            return view('sale_view')->with("order_view", $order_view)->with("message", $message);
        } else {
            $customer_id = $last_sale->customer_id + 1;

            $order_view = DB::table('order')->where("customer_id", $customer_id)->get();
            return view('sale_view')->with("order_view", $order_view)->with("message", $message);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) {

        $order = DB::table('order')->where('order_id', $request->order_id)->get();

        $purchase = Purchase::find($order[0]->product_code);

        $updated_purchase_quantity = $purchase->product_quantity + $order[0]->product_quantity;

        $purchase['product_quantity'] = $updated_purchase_quantity;
        $purchase->update();

        DB::table('order')->where('order_id', $request->order_id)->delete();
        return redirect('/sale-view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirm_order(Request $request) {

        $sale = new Sale;
        $sale['customer_id'] = $request->customer_id;
        $sale['customer_Phone'] = $request->customer_phone_number;
        $sale['iteams'] = $request->iteams;
        $sale['payment_type'] = $request->payment_type;
        $sale['total'] = $request->total;
        $sale->save();

//        $report = DB::table('sale')->get();
        return redirect('/report');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {


        $last_sale = DB::table('sale')->get()->last();

        if (empty($last_sale)) {
            $customer_id = 1;
        } else {
            $customer_id = $last_sale->customer_id + 1;
        }


        $purchase = Purchase::find($request->product_code);

        if ($purchase->product_quantity >= $request->product_quantity) {


            $updated_purchase_quantity = $purchase->product_quantity - $request->product_quantity;

            $purchase['product_quantity'] = $updated_purchase_quantity;
            $purchase->update();


            $subtotal = $request->product_quantity * $purchase->sale_price;

            $order = new Order;
            $order['customer_id'] = $customer_id;
            $order['product_name'] = $purchase->product_name;
            $order['product_code'] = $request->product_code;
            $order['product_quantity'] = $request->product_quantity;
            $order['sale_price'] = $purchase->sale_price;
            $order['subtotal'] = $subtotal;
            $order->save();
            return redirect('/sale-view');
        } else {

            $message = "Not Available";
            $last_sale = DB::table('sale')->get()->last();

            if (empty($last_sale)) {
                $customer_id = 1;

                $order_view = DB::table('order')->where("customer_id", $customer_id)->get();
                return view('sale_view')->with("order_view", $order_view)->with("message", $message);
            } else {
                $customer_id = $last_sale->customer_id + 1;

                $order_view = DB::table('order')->where("customer_id", $customer_id)->get();
                return view('sale_view')->with("order_view", $order_view)->with("message", $message);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm_page() {

        $last_sale = DB::table('sale')->get()->last();

        if (empty($last_sale)) {
            $customer_id = 1;
        } else {
            $customer_id = $last_sale->customer_id + 1;
        }

        $order_view = DB::table('order')->where("customer_id", $customer_id)->get();

        return view('confirm_page')->with("order_view", $order_view);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order_show() {
        $last_sale = DB::table('sale')->get()->last();

        if (empty($last_sale)) {
            $customer_id = 1;
        } else {
            $customer_id = $last_sale->customer_id + 1;
        }

        $message = "";

        $order_view = DB::table('order')->where("customer_id", $customer_id)->get();
        return view('sale_view')->with("order_view", $order_view)->with("message", $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function report() {

        $report = DB::table('sale')->get();
        return view('report')->with("report", $report);
    }

    public function view_iteams(Request $request) {

        $view_iteams = DB::table('order')->where('customer_id', $request->customer_id)->get();

        return view('view_iteams')->with("view_iteams", $view_iteams);
    }

}
