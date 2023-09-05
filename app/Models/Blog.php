<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'title', 'desc', 'topic', 'image'];

    protected $dates = [
        'deleted_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('title','like', "%$term%")
                  ->orwhere('topic','like', "%$term%");
        });
    }

    public function experienceTrashed()
    {
        return $this->hasMany(Blog::class)->onlyTrashed();
    }
}
