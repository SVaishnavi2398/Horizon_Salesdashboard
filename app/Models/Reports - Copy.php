<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;

    protected $table = 'report1';

	protected $primaryKey = 'report_id';
    
    protected $fillable = [
        //'slug',
        'team_id',
        'project_id',
        'subproject_id',
        'client_id',
        'booking_date',
        'deal_status_id'
      ];
}
