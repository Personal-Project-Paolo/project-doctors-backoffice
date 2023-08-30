<?php

namespace App\Models;

use App\Models\User;
use App\Models\Promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function promotions()
    {
        return $this->belongsToMany(Promotion::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($doctor) {
            if (!$doctor->user_id) {
                $doctor->user_id = auth()->user()->id;
            }
        });
    }

}





