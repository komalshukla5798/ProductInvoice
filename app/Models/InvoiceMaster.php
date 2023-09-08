<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceMaster extends Model
{
    use HasFactory;
    protected $table = 'Invoice_Master';
    protected $fillable = [
        'Invoice_Id',
		'Invoice_no',
		'Invoice_Date',
		'CustomerName',
		'TotalAmount'
    ];
}
