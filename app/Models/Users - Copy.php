<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;


    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'mobile_no',
        'email',
        'name',
        'password',
        'password_confirmation',
        'date_of_birth',
        'pan_no',
        'qualification',
        'marital_status',
        'joining_date',
        'experience_in_year',
        'last_package',
        'designation'

      ];
}
