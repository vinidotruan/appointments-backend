<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = [];

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'files_patients');
    }
}
