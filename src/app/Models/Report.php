<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function reportcate()
    {
        return $this->belongsTo('App\Models\Reportcate');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
