<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuarterlyIncentive extends Model
{
    use HasFactory;
    protected $table = 'quarterly_incentive';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'user_id',
        'soucring_no',
        'sourcing_amt',
        'from_date',
        'to_date',
        'eligibility_ince'
      ];
}
