<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Work extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'user_id',
        'desc',
        'category',
        'languages',
        'client',
        'link',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $term){
        $query->where(function ($query) use ($term){
            $query->where('title','like', "%$term%")
                  ->orwhere('category','like', "%$term%");
        });
    }

    public function experienceTrashed()
    {
        return $this->hasMany(Work::class)->onlyTrashed();
    }
}
