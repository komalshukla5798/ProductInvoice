<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    public $table = 'clients';
    protected $primaryKey = 'id';

    protected $fillable = ['name','email','address','city','notes'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function scopeDesc($query)
    {
        return $query->orderBy('id','DESC');
    }
}
