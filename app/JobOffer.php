<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    protected $table="joboffers";
    public $timestamps=false;
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
