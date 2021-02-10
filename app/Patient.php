<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        "user_id", "name", "telephone", "phone", "birthday", "cpf", "rg"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function plusInformations()
    {
        return $this->hasOne(PlusInformation::class);
    }

    public function files()
    {
        return $this->belongsToMany(File::class, 'files_patients');

    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
