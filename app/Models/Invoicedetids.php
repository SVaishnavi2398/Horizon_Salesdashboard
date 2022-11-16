<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoicedetids extends Model
{
    use HasFactory;

    protected $table = 'invoicedetids';

	protected $primaryKey = 'invoicedetids_id';
    
    protected $fillable = [
        //'slug',
        'invoice_multi_id',
        'sales_id',
        'client_id',
        'payout_value',
        'consideration_value',
        'taxable_amt'
      
		
      ];
}
