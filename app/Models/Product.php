<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'price',
        // 'slug',
        // 'unique_id',
        'is_active',
        'description',
        'image',
        'is_active'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class,'category_id');
    }

    public function getImageAttribute($value)
    {
        if(file_exists(public_path('images/').$value)){
            return asset('images').'/'.$value;
        }else{
            return $value;
        }
    }

    public function scopeDesc($query){
        return $query->orderBy('id','desc');
    }
}