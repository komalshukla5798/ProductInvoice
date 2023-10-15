<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $fillable = ['date','day_id','booked_slots'];

    public function user(){
		return $this->belongsTo(User::class,'user_id');
	}

	public function slots(){
		return $this->hasMany(slots::class,'booking_id');
	}

	// public function tax(){
	// 	return $this->hasMany(tax::class,'tax_id');
	// }

}
