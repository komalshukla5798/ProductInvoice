<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $table = 'Invoice_Detail';
    protected $fillable = [
        'InvoiceDetail_Id',
		'Invoice_Id',
		'Product_Id',
		'Rate',
		'Unit',
		'Qty',
		'Disc_Percentage',
		'NetAmount',
		'TotalAmount'
    ];
}
