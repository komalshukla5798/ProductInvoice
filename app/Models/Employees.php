<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    public $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = ['name','email','phone_number','status','password','role'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function scopeDesc($query)
    {
        return $query->orderBy('id','DESC');
    }

    public function Company(){
        return $this->belongsTo(Companies::class,'company');
    }
}
