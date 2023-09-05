<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['occupation' , 'user_id', 'company', 'adress', 'start_date', 'end_date'];

    protected $dates = [
        'deleted_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('occupation','like', "%$term%");
        });
    }

    public function experienceTrashed()
    {
        return $this->hasMany(Experience::class)->onlyTrashed();
    }
}
