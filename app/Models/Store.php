<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'description',
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
    
    public function likes()
    {
      return $this->belongsToMany(User::class, "likes")->withTimestamps();
    }

    public function tags()
    {
      return $this->belongsToMany(Tag::class, 'tags')->withTimestamps();
    }

    public function isLikedBy(?User $user)
    {
      return $user ? (bool)$this->likes->where("id", $user->id)->count() : false ;
    }

    public function getCountLikesAttribute()
    {
      return $this->likes->count();
    }
}