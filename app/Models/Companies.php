<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Config;

class Companies extends Model
{
    use HasFactory;

    public $table = 'companies';
    protected $primaryKey = 'id';

    protected $fillable = ['name','email','logo','webiste'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function scopeDesc($query)
    {
        return $query->orderBy('id','DESC');
    }

    public function Employees(){
        return $this->hasMany(Employees::class,'company','id');
    }

    public function getLogoAttribute($value)
    {
        if ($value && file_exists(Config::get('constants.COMPANY_LOGO') . $value))
        {
            return asset(Config::get('constants.COMPANY_LOGO') . $value);
        }else{
            return asset(Config::get('constants.ADMIN_DEFAULT_IMAGE_URL'));
        }
    }
}
