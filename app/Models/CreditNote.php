<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditNote extends Model
{
    use HasFactory;
    protected $table = 'credit_note';

	protected $primaryKey = 'credit_note_id';
    
    protected $fillable = [
            'invoice_id',
            'company_id',
            'credit_note_num',
            'credit_note_date',
            'payout_percenatge',
            'taxable_amt',
            'cgst_amt',
            'sgst_amt',
            'igst_amt',
            'total_gst_amt',
            'total_credit_note_amt',
            'icredit_note_status',
            'credit_note_submitted_date'
		
      ];
}
