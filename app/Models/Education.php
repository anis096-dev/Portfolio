<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['formation' , 'user_id', 'institute', 'adress', 'Date_of_obtaining'];

    protected $dates = [
        'deleted_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('formation','like', "%$term%");
        });
    }

    public function educationTrashed()
    {
        return $this->hasMany(Education::class)->onlyTrashed();
    }
}
