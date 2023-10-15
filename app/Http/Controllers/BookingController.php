<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;

class BookingController extends Controller
{
    public function index(Request $request)
    {
    	$detail = booking::find(1);
        // $detail = booking::whereHas('slots', function($query){
        //     $query->where('table_id',50);
        // })->with(['slots' => function($query){
        //     $query->where('table_id',50);
        // }])->find(1);
    	return view('bookings.index',compact('detail'));
    }

    public function create(Request $request)
    {
    	return view('bookings.create');
    }
}
