<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
