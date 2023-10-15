<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slots extends Model
{
    use HasFactory;

    protected $fillable = ['id','day','start','end'];

    // public function Bookings(){
    // 	return $this->hasMany(booking::class,'day_id');
    // }

    public function booking(){
		return $this->belongsTo(booking::class,'booking_id');
	}

	public function items(){
		return $this->belongsToMany(FoodItems::class,'slot_items','slot_id','item_id');
	}

	public function slot_items(){
		return $this->hasMany(slot_items::class,'slot_id');
	}

	public function table(){
		return $this->belongsTo(tables::class,'table_id');
	}

	// public function billing(){
	// 	return $this->hasOne(SlotBilling::class,'slot_id');
	// }


}
