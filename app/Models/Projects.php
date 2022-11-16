<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';

	  protected $primaryKey = 'project_id';

    protected $fillable = [
        //'project_id',
        'project_name',
        'rera',
        'location',
        'region_id',
        'subregion_id',
        'company_id',
        'profile_score'
      ];

    public function Subproject(){
        return $this->hasMany(Subprojects::class,'project_id');
    }
}
