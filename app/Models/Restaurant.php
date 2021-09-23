<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'city',
        'phone',
        'category_id',
        'delivery',
        'schedule',
        'latitude',
        'longitude',
        'logo',
        'facebook',
        'twitter',
        'instagram',
        'youtube'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeOwned($query, $owner)
    {
        return $query->where('user_id', '=', $owner);
    }
}
