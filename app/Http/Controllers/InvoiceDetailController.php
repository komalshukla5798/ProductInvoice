<?php

namespace App\Http\Controllers;

use App\Models\InvoiceDetail;
use App\Models\InvoiceMaster;
use App\Models\ProductMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;

class InvoiceDetailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        error_reporting(0);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductMaster::get();
        $orders = Session::get('orders',[]);
        $orders = array_values($orders);
        if(request()->ajax()){
            $html = view('orders.list',compact('products','orders'))->render();
            return response()->json($html);
        }else{
            return view('orders.index',compact('products','orders'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $myArray = Session::get('orders',[]);
        if($request->get('final_submit')){
            $latest_invoice = InvoiceMaster::orderBy('Invoice_Id','desc')->first();
            foreach ($myArray as $key => $value) {
                $FinalTotalAmount[] = $value['TotalAmount'];
            }   
            foreach ($myArray as $key => $value) {
                $InvoiceMaster = [
                    'Invoice_No' => $latest_invoice->Invoice_no + 1,
                    'Invoice_Date' => Carbon::now()->format('Y-m-d'),
                    'CustomerName' => $value['CustomerName'],
                    'TotalAmount' => array_sum($FinalTotalAmount)
                ];
                $Invoice_Id = InvoiceMaster::insertGetId($InvoiceMaster);
                $InvoiceDetail = [
                    'Invoice_Id' => $Invoice_Id,
                    'Product_Id' => $value['Product_Name'],
                    'Rate' => $value['Rate'],
                    'Unit' => $value['Unit'],
                    'Qty' => $value['Qty'],
                    'Disc_Percentage' => $value['Disc_Percentage'],
                    'NetAmount' => $value['NetAmount'],
                    'TotalAmount' => $value['TotalAmount']
                ];
                InvoiceDetail::create($InvoiceDetail);
            }
            Session::forget('orders');
            return response()->json(['success' => 'Data Saved Successfully']);
        }else{
            $randomID = time(); 
            $ID = $request->get('id');
            $all = Session::get('orders')[$ID];
            foreach ($request->all() as $key => $value) {
                $all[$key] = $value;
            }
            if(empty($ID)){
                $ID = $randomID;
            }
            if(!empty($all)){
                $all['id'] = $ID;
            }
            $myArray[$ID] = $all; // Adding a new element
            Session::put('orders', $myArray);// Storing the updated array back in the session
            return $request->session()->all();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceDetail  $invoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceDetail $invoiceDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceDetail  $invoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Session::get('orders')[$id];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvoiceDetail  $invoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceDetail $invoiceDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceDetail  $invoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Session::get('orders', []);
        if (isset($data[$id])) {
            unset($data[$id]);
        }
        Session::put('orders', $data);
        return Session::get('orders');  
    }
}
