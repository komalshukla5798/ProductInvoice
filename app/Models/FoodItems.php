<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItems extends Model
{
    use HasFactory;

    public function category(){
		return $this->belongsTo(FoodCategory::class,'category_id');
	}
}
