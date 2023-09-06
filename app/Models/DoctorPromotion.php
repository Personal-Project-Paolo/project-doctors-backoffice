<?php

namespace App\Models;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApartmentSponsor extends Model
{
    use HasFactory;

    public $timestamps = false;


    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}