<?php

namespace App\Http\Controllers;
use App\Models\booking;
use App\Models\slots;

use Illuminate\Http\Request;

class SlotBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function slots()
    {
        $days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
        $slots = slots::get();
        $loop = $slots;
        $dbdays = slots::pluck('day');
        foreach($days as $day) {
          if(@!in_array($day,$dbdays->toArray())){
           $loop[] = $day;
          }
        }

        return view('slots',compact('loop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookings()
    {
        return view('booking');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function CheckSlots(Request $request)
    {
        $day = date('l',strtotime($request->date));
        $availabel_slots = slots::with(['Bookings' => function($query) use ($request){
            $query->where('date',$request->date);
        }])->where('day',$day)->first();
        if(@$availabel_slots->id){
        $slot_booked = $availabel_slots->Bookings->pluck('booked_slots');
        if(@$availabel_slots->id){
           $end = str_replace(':00','',$availabel_slots->end)-1; 
           for($a = str_replace(':00','',$availabel_slots->start); $a <= $end; $a++) {
            $value = $a.':00 - '.($a+1).':00';
              if(!in_array($value, @$slot_booked->toArray())){
                 $slots[] = '<div class="check"><input style="margin: 10px;" type="checkbox" name="slots[]" value="'.$value.'">'.$value.'<br><input type="hidden" name="day_id" value="'.$availabel_slots->id.'"></div><br>';
              }
          }
        }
     }else{
                $slots[] = "No Slots Available";
              }
        return response()->json([@$slots]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function BookSlot(Request $request)
    {
         foreach($request->slots as $slots){
          booking::create([
           'date' => $request->date,
           'booked_slots' => $slots,
           'day_id' => $request->day_id
         ]);
      }

      return response()->json(['message' => 'success','date' => $request->date]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function BookDays(Request $request)
    {
       foreach($request->day as $k => $days){
          if(@$request->day[@$k] && @$request->start[@$k] && @$request->end[@$k]){
      slots::updateOrCreate(['id' =>@$request->id[@$k]],
            ['day' => @$request->day[@$k],
             'start' => @$request->start[@$k],
             'end' => @$request->end[@$k]]
         );

      return response()->json(['message' => 'success']);
        }
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
